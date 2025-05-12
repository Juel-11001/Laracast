<?php
// return [
// 	'/' =>'controllers/index.php',
// 	'/about' =>'controllers/about.php',
// 	'/contact' =>'controllers/contact.php',
// 	'/notes'=>'controllers/notes/index.php',
// 	'/note/create'=>'controllers/notes/create.php',
// 	'/note'=>'controllers/notes/show.php',
// ];
/** home routes */
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

/** notes routes */
$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php')->only('auth');
$router->delete('/note', 'notes/destroy.php')->only('auth');
$router->get('/note/create', 'notes/create.php')->only('auth');
$router->post('/notes', 'notes/store.php')->only('auth');
/** notes update  */
$router->get('/notes/edit', 'notes/edit.php')->only('auth');
$router->patch('/notes', 'notes/update.php')->only('auth');
/** register */
$router->get('/register', 'registation/create.php')->only('guest');
$router->post('/register', 'registation/store.php');

/** login and logout : */
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/logout', 'session/destroy.php')->only('auth');