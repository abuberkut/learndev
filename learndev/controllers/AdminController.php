<?php 
class AdminController extends AdminBase
{
    public function actionIndex(){
        if(self::checkAdmin()){
            
            require_once(ROOT.'/views/admin/index.php');
        }
        else
            header("Location: /");
        return true;        
    }
}