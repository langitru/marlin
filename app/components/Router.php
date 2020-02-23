<?php

/**
 Router   - компонент для маршрутизации запросов пользователя;

 $routes  - ассоциативный массив с маршрутами;
 
 */

// include __DIR__ . '/../helpers/dd.php'; 
class Router 
{
	private $routes = 
			[
			  '/' => 'index', // где '/'- это запрос пользователя, а 'index' - это экшн который будет бызван в контроллере
			  '/home' => 'index',
			  '/create' => 'create',
			  '/postnew' => 'new',
			  '/postshow' => 'show',
			  '/postedit' => 'edit',
			  '/postupdate' => 'update',
			  '/postdelete' => 'delete',
			  '/contacts' => 'contacts',
			];

	public function __construct()
	{

		$this->checkURI();
	}

	public function checkURI()
	{
		$id = NULL;
		$route = $_SERVER['REQUEST_URI'];

		// проверяем наличие GET параметров в запросе пользователя
		// если есть, значит обрабатываем GET параметр
		if ($_SERVER['QUERY_STRING']) 
		{	
			parse_str($_SERVER['QUERY_STRING'], $get_var);
			$id = $get_var['id'];
			$route =  substr($route, 0, strpos($route, "?"));


			/* этот кусок кода еще не закончен, он нужен если нам нужно получить много параметров ид GET запроса
			 * В качестве разделителей используем & */
			// $tok = strtok($_SERVER['QUERY_STRING'], "&");
			// $params = [];
			// while ($tok !== false) {
			//     echo "$tok<br />";
			//     $tok = strtok("&");
			// }


			// die;
		}
		if (array_key_exists($route, $this->routes)){

			include __DIR__ . '/../controllers/PostsController.php'; 
		  	$PostsController = new PostsController($this->routes[$route], $id);
		  	// dd(500);
		  	exit;
		} else {
		  	include __DIR__ . '/../views/404.php';
		}		
	}
}

