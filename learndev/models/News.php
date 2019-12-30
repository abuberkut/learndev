<?php
class News{
    public static function getNews(){
        $db = Db::getConnection();
        $result = $db->prepare('select * from news');
        $result->execute();
        $newsList = $result->fetchAll();
        return $newsList; 
    }    
    public static function getNewsById($id){
        $db = Db::getConnection();
        $query = 'select * from news where id = ?';
        $result = $db->prepare($query);
        $result->execute([$id]);
        $news = $result->fetch();
        return $news; 
    }    

}