<?php

namespace Core;
use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
	protected $routes = [];
	
	public function add($method, $uri, $controller)
	{
		$this->routes[] = [
			'uri' => $uri,
			'controller' => $controller,
			'method' => $method,
			'middleware'=>null
		];
		return $this;
	}
	
	public function get($uri, $controller)
	{
		return $this->add('GET', $uri, $controller);
	}
	
	public function post($uri, $controller)
	{
		return $this->add('POST', $uri, $controller);
	}
	
	public function delete($uri, $controller)
	{
		return $this->add('DELETE', $uri, $controller);
	}
	
	public function patch($uri, $controller)
	{
		return $this->add('PATCH', $uri, $controller);
	}
	
	public function put($uri, $controller)
	{
		return $this->add('PUT', $uri, $controller);
	}

	public function only($key)
	{
		$this->routes[array_key_last($this->routes)]['middleware']=$key;
		return $this;
		// dd($this->routes);
	}
	
	public function route($uri, $method)
	{
		foreach ($this->routes as $route) {
			if ($route['uri'] === $uri && $route['method']===strtoupper($method)) {
				//apply middlewae :
				Middleware::resolve($route['middleware']);
				//2nd refactor :
				// if($route['middleware']){
				// 	$middleware=Middleware::MAP[$route['middleware']];
				// 	(new $middleware)->handle();
				// }
				//first refactor :
				// if($route['middleware']==='guest'){
				// 	(new Guest())->handle();
				// }
				// if($route['middleware']==='auth'){
				// 	(new Auth())->handle();
				// }

				return require base_path('Http/controllers/'.$route['controller']);
			}
			
		}
		$this->abort();
	}
	
	protected function abort($code = 404)
	{
		http_response_code($code);
		require base_path("views/{$code}.php");
		die();
	}
}
// $routes = require base_path('routes.php');
// $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//
// function routeToController($uri, $routes)
// {
// 	if (array_key_exists($uri, $routes)) {
// 		require base_path($routes[$uri]);
// 	} else {
// 		abort(404);
// 	}
// }
//
// function abort($code = 404)
// {
// 	http_response_code($code);
// 	require base_path("views/{$code}.php");
// 	die();
// }
//
// routeToController($uri, $routes);