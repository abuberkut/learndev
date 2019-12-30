<?php 
class Game{
    public static function getGames(){
        $db = Db::getConnection();
        $query = 'select * from game';
        $result = $db->prepare($query);
        $result->execute();
        $gamesList = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $gamesList;         
    }    
    public static function getGameById($id){
        $db = Db::getConnection();
        $query = 'select * from game where id = "'.$id.'"';
        $result = $db->prepare($query);
        $result->execute();
        $game = $result->fetch(\PDO::FETCH_ASSOC);
        return $game; 
        
    }
}