<?php

use Core\Session;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

session_start();
spl_autoload_register(function ($class) {
	// Core\Database :
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	require base_path("{$class}.php");
});
//require bootstrap :
require base_path('bootstrap.php');
// require base_path('Core/router.php');
$router = new Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method= $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
// $method=$_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
// unset($_SESSION['_flash']);
Session::unflash();