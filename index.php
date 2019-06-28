<?php 
session_start();

define('DOMAIN', $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST']);
require('./db.php');	

spl_autoload_register(function($class){
	require('./controllers/'.$class.'.php');
});

foreach (glob('./models/*') as $model_name) {
	require($model_name);
}
require('./classes/Request.php');
require('./classes/Router.php');
require('./classes/View.php');


$request = new Request();
$router = new Router($request);

