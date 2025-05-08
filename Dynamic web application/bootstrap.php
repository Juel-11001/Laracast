<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();
$container->bind(Database::class, function () {
	$config = require base_path('config.php');
	return new Database($config['mysql_database'], 'valet', '11001');
});

// $container->bind('\Core\Database', $container );
$db = $container->resolve(Database::class);
// dd($db);
// $container->resolver('aslldifdl');

App::setContainer($container);