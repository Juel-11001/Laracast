<?php
// return [
// 	'/' =>'controllers/index.php',
// 	'/about' =>'controllers/about.php',
// 	'/contact' =>'controllers/contact.php',
// 	'/notes'=>'controllers/notes/index.php',
// 	'/note/create'=>'controllers/notes/create.php',
// 	'/note'=>'controllers/notes/show.php',
// ];

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');


$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');
$router->get('/note/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/notes/edit', 'controllers/notes/edit.php');
$router->patch('/notes', 'controllers/notes/update.php');

