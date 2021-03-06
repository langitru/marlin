<?php

/**
 * 
 */
namespace Controllers;
use MyComponents\QueryBuilder;
// use MyComponents\Connection;
use Tamtamchik\SimpleFlash\Flash;
use MyComponents\Validator;
use League\Plates\Engine;
use Delight\Auth\Auth;
// use Kint\Kint;
// use PDO;

class PostController 
{
	private $db;
	private $params;
	private $views;
	private $auth;
	
	function __construct(QueryBuilder $qb, Auth $auth, Engine $engine)
	{

		$this->db = $qb;
		$this->auth = $auth;
		$this->views = $engine;
	}

	public function index()
	{

		$username = $this->auth->getUsername();
		$posts = $this->db->getAll('posts');
		echo $this->views->render('index.post', ['posts' => $posts, 'username' => $username] );
	}

	public function create()
	{

		echo $this->views->render('create.post');
	}

	public function new()
	{
		if (Validator::length($_POST['title'])){

			$post = $this->db->insert(
				'posts', 
				[
					'title' => $_POST['title'],
					// 'email' => 'asd@qwe',
					// 'content' => 'qwe',
				],
			);
			if ($post){
				Flash::message('Пост успешно создан!', 'success');
			} else {
				Flash::message('Ошибка: Пост не создан!', 'error');
			}
			header('location: /');
		} else {
			Flash::message('Заголовок должен быть длинной не менне 5 символов!', 'warning');
			header("location: /postcreate");
		}

	}

	public function show($params) 
	{
		d($params);
		$post = $this->db->getOne('posts', $params['id']);
		echo $this->views->render('show.post', ['post' => $post] );		
	}

	public function edit($params)
	{

		$post = $this->db->getOne('posts', $params['id']);
		echo $this->views->render('edit.post', ['post' => $post] );
	}

	public function update()
	{
		if (Validator::length($_POST['title'])){
			$post = $this->db->update('posts', $_POST, $_POST['id']);
			if ($post) {
				Flash::message('Пост успешно обновлен!', 'success');
			} else {
				Flash::message('Ошибка: Пост не обновлен!', 'error');
			}

			header('location: /');
		} else {
			Flash::message('Заголовок должен быть длинной не менне 5 символов!', 'warning');
			header("location: {$_SERVER['HTTP_REFERER']}");
		}
	}

	public function delete($params)
	{

		$post = $this->db->deleteOne('posts', $params['id']);
		if ($post) {
			Flash::message('Пост успешно удален!', 'success');
		} else {
			Flash::message('Ошибка: Пост не удален!', 'error');
		}	
		header('location: /');
	}

	public function contacts()
	{

		echo $this->views->render('contacts.post');
	}

	public static function Error($numberError)
	{
		
		$views = new Engine('../app/views');
		echo $views->render($numberError.'.post');
	}

}