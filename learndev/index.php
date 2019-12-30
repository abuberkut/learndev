<?php 
// For showing errors
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();

// For shorting writing of path links
define('ROOT',__DIR__);
require_once(ROOT.'/components/Autoload.php');

// Creating Router and calling the run function of Router 
$router = new Router();
$router->run();