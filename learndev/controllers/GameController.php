<?php 
class GameController{  
    public function actionIndex(){ 
        $gamesList = Game::getGames();
        $title = 'Игры';
        require_once(ROOT.'/views/game/index.php');
        return true;
    }
    public function actionView($id){
        $game = Game::getGameById($id);
        $title = $game['title'];
        $comment_link = '/game/'.$id;
//        $comments = Comment::getCommentsByCommentLink('/game/'.$id);
        require_once(ROOT.'/views/game/view.php');
        return true;        
    }
}