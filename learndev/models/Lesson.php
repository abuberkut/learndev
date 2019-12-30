<?php 
class Lesson{
    public static function getLessons(){
        $db = Db::getConnection();
        $query = 'select * from lesson';
        $result = $db->prepare($query);
        $result->execute();
        $lessonsList = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $lessonsList;         
    }    
    public static function getLessonById($id){
        $db = Db::getConnection();
        $query = 'select * from lesson where id = "'.$id.'"';
        $result = $db->prepare($query);
        $result->execute();
        $lesson = $result->fetch(\PDO::FETCH_ASSOC);
        return $lesson; 
        
    }
}