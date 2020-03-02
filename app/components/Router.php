<?php

/**
 Router   - компонент для маршрутизации запросов пользователя;

 
 */

namespace MyComponents;

// use Controllers\PostsController;
use FastRoute;

class Router 
{
	// private 

	public function __construct()
	{

		$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
	    $r->addRoute('GET', '/',                    ['Controllers\PostsController', 'index']);
	    $r->addRoute('GET', '/home',                ['Controllers\PostsController', 'index']);
	    $r->addRoute('GET', '/contacts',            ['Controllers\PostsController', 'contacts']);
	    $r->addRoute('GET', '/postcreate',          ['Controllers\PostsController', 'create']);
	    $r->addRoute('GET', '/postshow/{id:\d+}',   ['Controllers\PostsController', 'show']);
	    $r->addRoute('GET', '/postedit/{id:\d+}',   ['Controllers\PostsController', 'edit']);
	    $r->addRoute('POST','/postnew',             ['Controllers\PostsController', 'new']);
	    $r->addRoute('POST','/postupdate',          ['Controllers\PostsController', 'update']);
	    $r->addRoute('GET', '/postdelete/{id:\d+}', ['Controllers\PostsController', 'delete']);



	    // {id} must be a number (\d+)
	    // $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
	    // The /{title} suffix is optional
	    // $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
	});
		// Fetch method and URI from somewhere
		$httpMethod = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];

		// Strip query string (?foo=bar) and decode URI
		if (false !== $pos = strpos($uri, '?')) {
		    $uri = substr($uri, 0, $pos);
		}
		$uri = rawurldecode($uri);

		$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
		switch ($routeInfo[0]) {
		    case FastRoute\Dispatcher::NOT_FOUND:
		        // ... 404 Not Found
		    	PostsController::Error('404');
		        break;
		    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
		        $allowedMethods = $routeInfo[1];
		        // ... 405 Method Not Allowed
		        PostsController::Error('405');
		        break;
		    case FastRoute\Dispatcher::FOUND:
		        $handler = $routeInfo[1];
		        $vars = $routeInfo[2];
		        
		        // ... call $handler with $vars

		        call_user_func([new $handler[0], $handler[1]], $vars);		        
		        break;
		}
	}
}

