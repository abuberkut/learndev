<?php 
class LessonController{  
    public function actionIndex(){ 
        $lessonsList = Lesson::getLessons();
        $title = 'Уроки';
        require_once(ROOT.'/views/lesson/index.php');
        return true;
    }
    public function actionView($id){
        $lesson = Lesson::getLessonById($id);
        $title = $lesson['title'];
        $category_name = 'lesson'; 
        $comment_link = "/lesson/".$id;
        require_once(ROOT.'/views/lesson/view.php');
        return true;        
    }
}