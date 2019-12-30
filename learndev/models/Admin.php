<?php 

class Admin{
    public static function get($smth){
        $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=learndev_db","root","",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
           $sql = 'select * from '.$smth;
            $stmt = $pdo->query($sql);
            $things=$stmt->fetchAll();
            return $things;        
    }
    public static function getSmthById($smth,$id){
        $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=learndev_db","root","",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
           $sql = 'select * from '.$smth.' where id = '.$id;
            $stmt = $pdo->query($sql);
            $things=$stmt->fetchAll();
            return $things;        
    }
    public static function addNews($title,$category,$content,$shortContent){
        $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=learndev_db","root","",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
        $content = str_replace("<","&lt",$content);
        $content = str_replace(">","&gt",$content);
        $shortContent = str_replace("<","&lt",$shortContent);
        $shortContent = str_replace(">","&gt",$shortContent);
        
        $sql = 'insert into `news` (`title`,`category_id`,`content`,`short_content`,`date`) values ("'.$title.'",'.$category.',"'.$content.'","'.$shortContent.'",CURRENT_TIMESTAMP);';
        echo $sql;
        return $pdo->query($sql);
    }     
    public static function addQuestion($title,$text,$answer,$category,$type,$level){
        $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=learndev_db","root","",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);

        $sql = 'insert into `question` (`title`,`text`,`answer`,`question_category`,`question_type`,`user_level`) values ("'.$title.'","'.$text.'","'.$answer.'",'.$category.','.$type.','.$level.');';
        echo $sql;
        return $pdo->query($sql);
    }     
    public static function addGL($thing,$title,$text,$link,$level,$order){
        echo $thing;
        $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=learndev_db","root","",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);        
        $pass = $pdo->query('insert into '.$thing.' (`title`,`text`,`video_link`,`user_level_id`,`order`) VALUES ("'.$title.'","'.$text.'","'.$link.'",'.$level.',"'.$order.'");');
        var_dump($pass);
        return $pass;
    }     
    public static function delete($tbl,$id){
        $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=learndev_db","root","",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
        $pass = $pdo->query('delete from '.$tbl.' where id ='.$id);
        return $pass;
    } 
    public static function editNews($tbl,$title,$content,$short_content,$category,$id){
        $sql = 'update `'.$tbl.'` set `title` = "'.$title.'", `content` = "'.$content.'", `short_content` = "'.$short_content.'", `category_id` = '.$category.' where `id` = '.$id;
        $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=learndev_db","root","",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
        $stmt = $pdo->prepare($sql);
        $pass = $stmt->execute();
        return $pass;
    } 
    public static function editQuestion($tbl,$title,$text,$answer,$category,$type,$level,$id){
        $sql = 'update `'.$tbl.'` set `title` = "'.$title.'", `text` = "'.$text.'", `answer` = "'.$answer.'", `question_category` = '.$category.', question_type = '.$type.', user_level = '.$level.'  where `id` = '.$id;
        $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=learndev_db","root","",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);

        $stmt = $pdo->prepare($sql);
        $pass = $stmt->execute();
        return $pass;
    } 
    public static function editGL($tbl,$title,$text,$link,$order,$level,$id){
        $sql = 'update `'.$tbl.'` set `title` = "'.$title.'", `text` = "'.$text.'", `video_link` = "'.$link.'", `order` = '.$order.', user_level_id = '.$level.'  where `id` = '.$id;
        $pdo = new PDO("mysql:host=localhost;charset=utf8;dbname=learndev_db","root","",[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
        $stmt = $pdo->prepare($sql);
        $pass = $stmt->execute();
        return $pass;        
    } 
}

?>