<?php 
class CabinetController{
    public function actionIndex(){
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $title = 'Кабинет';
        require_once(ROOT.'/views/cabinet/index.php');
        return true;        
    }
    public function actionEdit(){
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $name = $user['name'];
        $password = $user['password'];
        $result = false;
        
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            
            $errors = false;
            if(!User::checkName($name))
                $errors[] = 'Name length>2 ! <br>';
            
            if(!User::checkPassword($password))
                $errors[] = 'Password is <6 ch-s ! <br>';

            if($errors==false){
                $result = User::edit($userId,$name, $password);
                $_SESSION['user_name'] = User::getUserNameById($userId);
            }
        }
        $title = 'Кабинет. Редактирование';
        require_once(ROOT.'/views/cabinet/edit.php');
        return true;
    }
}