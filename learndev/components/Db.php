<?php
class Db{
    public static function getConnection(){
        $paramsPath = ROOT.'/config/db_params.php';
        $params = include($paramsPath);
        try {
            $db = new PDO('mysql:host='.$params['host'].';dbname='.$params['dbname'],$params['user'],$params['password'],[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
                ]);

            return $db;
        }
        catch(Exception $ex){
            print_r($ex);
            die();
        }
    }
}