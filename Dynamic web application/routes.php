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
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

/** notes routes */
$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php')->only('auth');
$router->delete('/note', 'controllers/notes/destroy.php')->only('auth');
$router->get('/note/create', 'controllers/notes/create.php')->only('auth');
$router->post('/notes', 'controllers/notes/store.php')->only('auth');
/** notes update  */
$router->get('/notes/edit', 'controllers/notes/edit.php')->only('auth');
$router->patch('/notes', 'controllers/notes/update.php')->only('auth');
/** register */
$router->get('/register', 'controllers/registation/create.php')->only('guest');
$router->post('/register', 'controllers/registation/store.php');

/** login and logout : */
$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/session', 'controllers/session/store.php')->only('guest');
$router->delete('/logout', 'controllers/session/destroy.php')->only('auth');