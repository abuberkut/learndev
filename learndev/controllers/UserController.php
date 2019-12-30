<?php
class UserController{

    public function actionRegister(){
            $name='';
            $login='';  
            $password='';
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $errors = false;
            if(User::checkName($name)){
                echo 'NAME is ok! <br>';
            }else
                $errors[] = 'Name length>2 ! <br>';
            if(User::checkLogin($login)){
                echo 'Login is ok! <br>';
            }else
                $errors[] = 'Login is wrong ! <br>';
            if(User::checkPassword($password)){
                echo 'Password is ok! <br>';
            }else
                $errors[] = 'Password is less than 6 chars!<br>';
            if(User::checkLoginExists($login))
                $errors[] = 'Login exists yet!<br>';
            if($errors==false){
                User::register($name,$login, $password);
            }
        }
        $title = 'Регистрация на сайте';
        require_once(ROOT.'/views/user/register.php');
        return true;
    }   
    public function actionLogin(){
        $login='';
        $password='';
        if(isset($_POST['submit'])){
            $login = $_POST['login'];
            $password = $_POST['password'];            
            $errors = false;
            if(!User::checkLogin($login))
                $errors[] = 'Login is wrong ! <br>';
            if(!User::checkPassword($password))
                $errors[] = 'Password short ! <br>';
            $userId = User::checkUserData($login,$password);
            
            if($userId==false){
                $errors[] = 'Wrong input data for user! <br>';
            }else{
                User::auth($userId);
                header("Location: /cabinet/");
            }
        }
        $title = 'Вход на сайт';
        require_once(ROOT.'/views/user/login.php');
        return true;
    }
    public function actionLogout(){
        unset($_SESSION["user"]);
        unset($_SESSION["status"]);
        unset($_SESSION["user_name"]);
        header("Location: /");
    }

}