<?php 
class Category{
    public static function getNewsCategories(){
        $db = Db::getConnection();
        $query = 'select * from news_category';
        $result = $db->prepare($query);
        $result->execute();
        $news_categories = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $news_categories; 
    }
    public static function getNewsCategoryById($id){
        $db = Db::getConnection();
        $query = 'select * from news_category where id = "'.$id.'"';
        $result = $db->prepare($query);
        $result->execute();
        $news_category = $result->fetch(\PDO::FETCH_ASSOC);
        return $news_category; 
    }    
}