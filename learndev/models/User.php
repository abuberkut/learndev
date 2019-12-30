<?php
class User{
    public static function register($name, $login, $password,$status=2){
        $db = Db::getConnection();
        $query = 'INSERT INTO `user` (`name`,`login`, `password`,`status`,`sign_up_date`,`last_sign_in_date`,`level_id`,`stars_count`) VALUES 
        (:name,:login,:password,:status,:sign_up_date,:last_sign_in_date,:level_id,:stars_count)';
        $result = $db->prepare($query);
        $result->execute([':name' => $name,
                          ':login' => $login,
                          ':password' => $password,
                          ':status' => $status,
                          ':sign_up_date' => date('Y.m.d'),
                          ':last_sign_in_date' => date('Y.m.d'),
                          ':level_id' => 1,
                          ':stars_count' => 0]);
        return true;
    }
    public static function getUserStatusById($id){
        if($id){
            $db = Db::getConnection();
            $query = 'select status from user where id = "'.$id.'"';
            $result = $db->prepare($query);
            $result->execute();
            $user_status = $result->fetch(\PDO::FETCH_ASSOC);
            return $user_status['status'];
        }
    }
    public static function auth($userId){    
        $_SESSION['user'] = $userId;
        $_SESSION['user_name'] = self::getUserNameById($userId);
        $status = self::getUserStatusById($userId);
        if($status==1)
        $_SESSION['status'] = self::getUserStatusById($userId);
        $db = Db::getConnection();
        $query = 'UPDATE `user` SET `last_sign_in_date`="'.date('Y.m.d').'" WHERE id = '.$userId;
        $result = $db->prepare($query);
        $result->execute();
        return true;
    }
    public static function edit($id, $name, $password){
        $db = Db::getConnection();
        $query = 'update `user` set `name` = "'.$name.'", `password` = "'.$password.'"where `id`= "'.$id.'"';
        $result = $db->prepare($query);
        $result = $result->execute();
        return $result;
    }
    public static function isGuest(){
        if(isset($_SESSION['user'])){
            return false;
        }
        return true;
    }
    
    public static function checkName($name){
        if(strlen($name)>=2){
            return true;
        }else
            return false;
    }
    public static function checkPassword($password){
        if(strlen($password)>=6){
            return true;
        }else
            return false;
    }
    public static function checkPhone($phone){
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }
    public static function checkUserData($login, $password){
        $db = Db::getConnection();
        $query = 'select * from user where login = "'.$login.'" and password = "'.$password.'"';
        $result = $db->prepare($query);
        $result->execute();
        $user = $result->fetch(\PDO::FETCH_ASSOC);
        if($user)
            return $user['id'];
        return false;
    }
    public static function checkLogin($login){
        if(strlen($login)>5){
            return true;
        }else
            return false;
    }
    public static function checkLoginExists($login){
        $db = Db::getConnection();
        $query = 'Select count(*) from user where login = "'.$login.'"';
        $result = $db->prepare($query);
        $result->execute();
        $count = $result->fetch(PDO::FETCH_ASSOC);
        //print_r($count);
        if($count)
            return true;
        else 
            return false;
    }
    
    public static function checkLogged(){
        if(isset($_SESSION['user']))
            return $_SESSION['user'];
    } 
    public static function getUserNameById($id){
        if($id){
            $db = Db::getConnection();
            $query = 'select name from user where id = "'.$id.'"';
            $result = $db->prepare($query);
            $result->execute();
            $user_name = $result->fetch(\PDO::FETCH_ASSOC);
            return $user_name['name'];
        }
    }   
    public static function getUserById($id){
        if($id){
            $db = Db::getConnection();
            $query = 'select * from user where id = "'.$id.'"';
            $result = $db->prepare($query);
            $result->execute();
            $user = $result->fetch();
            return $user;
        }
    }

}