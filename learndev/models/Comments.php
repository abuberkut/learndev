<?php 
//    class Comment{
//        public static function getComments(){
//            $db = Db::getConnection();
//            $query = 'select * from comment';
//            $result = $db->prepare($query);
//            $result->execute();
//            $comments = $result->fetchAll(\PDO::FETCH_ASSOC);
//            return $comments;
//        }
//        public static function getCommentsByCategoryName($name){
//            $db = Db::getConnection();
//            $category_id = self::getCommentCategoryIdByName($name); 
//            $query = 'select * from comment where category_id = ?';
//            $result = $db->prepare($query);
//            $result->execute([$category_id]);
//            $comments = $result->fetchAll(\PDO::FETCH_ASSOC);
//            return $comments;
//        }
//        public static function getCommentsByCommentLink($link){
//            $db = Db::getConnection();
//            $query = 'select * from comment where comment_link = ?';
//            $result = $db->prepare($query);
//            $result->execute([$link]);
//            $comments =  $result->fetchAll(\PDO::FETCH_ASSOC);
//            return $comments;
//            
//        }
//        public static function getCommentCategoryIdByName($name){
//            $db = Db::getConnection();
//            $query = 'select id from comment_category where name = ?';
//            $result = $db->prepare($query);
//            $result->execute([$name]);
//            return $result->fetch(\PDO::FETCH_ASSOC)['id'];
//        }
//        public static function addCommentToDb($categoryId,$userId,$date,$text,$commentLink){
//            $db = Db::getConnection();
//            $query = 'INSERT INTO `comment`(`category_id`,`user_id`,`date`,`text`,`comment_link`) VALUES (?,?,?,?,?)';
//            $stmt = $db->prepare($query);
//            $stmt->execute([$categoryId,$userId,$date,$text,$commentLink]);
//            $comments = self::getCommentsByCommetLink($commentLink);
//            return $comments;
//        }        
//    }
    class Comments{
        protected $pdo = null;
        protected $stmt = null;
        public $error = "";
        public $lastId = null;
        
        function __construct(){
            try{
                $this->pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=learndev_db","root","",[
                    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
                ]);
                return true;
            }
            catch(Exception $ex){
                print_r($ex);
                die();
            }
        }
        function __destruct(){
            if($this->pdo!==null)$this->pdo=null;
            if($this->stmt!==null)$this->stmt=null;
        }
        function get($clink=0){
            $sql = 'select * from comment where comment_link=? order by date DESC';
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute([$clink]);
            $comments=$this->stmt->fetchALL();
            return count($comments)>0?$comments:false;
        }
        function exec($sql,$data=null){
            try{
                $this->stmt=$this->pdo->prepare($sql);
                $this->stmt->execute($data); // cuz data is just an array
                $this->lastId = $this->pdo->lastInsertId(); // is it needed?
            }
            catch(Exception $ex){
                $this->error = $ex;
                return false;
            }
            
            $this->stmt=null;
            return true;
        }
        function add($clink,$userId,$text){
            $fields = "comment_link,user_id,text";
            $values = "?,?,?";
            
            $text = str_replace("<","&lt",$text);
            $text = str_replace(">","&gt",$text);
            
            $cond = [$clink,$userId,$text];
            
            $sql = "insert into comment ($fields) values ($values);";
            return $this->exec($sql,$cond);
        }
        function delete($cid){
            $this->pdo->beginTransaction();
            $this->stmt = $this->pdo->prepare("delete from comment where id=?",[$cid]);
            $pass = $this->stmt->execute([$cid]);
            if($pass)$this->pdo->commit();
            else $this->pdo->rollBack();
            return $pass;
        }
        function userNameById($id){
            $sql = "select name from user where id = ?";
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute([$id]);
            return $this->stmt->fetch(PDO::FETCH_ASSOC)['name'];
        } 
        function edit($text,$cid){
            if($text != ''){
                $sql = 'update `comment` set `text` = ?, `date` = CURRENT_TIMESTAMP where `id` = ?';
                $cond = [$text,$cid];
            }else{
                $sql = '';
                $cond = [];
            }
            $text = str_replace("<","&lt",$text);
            $text = str_replace(">","&gt",$text);

            return $this->exec($sql,$cond);

        }
    }