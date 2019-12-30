<?php 
class NewsController{  
    public function actionIndex(){ 
        $newsList = News::getNews();    
        $categories = Category::getNewsCategories();
        $title = 'Главная. Новости';
        require_once(ROOT.'/views/news/index.php');
        return true;
    }
    public function actionView($id){
        $news = News::getNewsById($id);
        $categories = Category::getNewsCategories();
        $title = $news['title'];
        $comment_link = '/news/'.$id;
        require_once(ROOT.'/views/news/view.php');
        return true;  
    }
}