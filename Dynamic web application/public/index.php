<?php
const BASE_PATH = __DIR__ . '/../';
// var_dump(BASE_PATH);
require BASE_PATH . 'Core/functions.php';
// require base_path('Database.php');
// require base_path('Response.php');

spl_autoload_register(function ($class) {
	// Core\Database :
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	require base_path("{$class}.php");
});
require base_path('Core/router.php');
