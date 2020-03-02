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
// use Kint\Kint;

class PostsController 
{
	private $db;
	private $params;
	private $views;
	
	function __construct()
	{

		$this->db = new QueryBuilder();
		$this->views = new Engine('../app/views');
	}

	public function index()
	{

		$posts = $this->db->getAll('posts');
		echo $this->views->render('index', ['posts' => $posts] );
	}

	public function create()
	{

		echo $this->views->render('create');
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
			header("location: /create");
		}

	}

	public function show($params) 
	{

		$post = $this->db->getOne('posts', $params['id']);
		echo $this->views->render('show', ['post' => $post] );		
	}

	public function edit($params)
	{

		$post = $this->db->getOne('posts', $params['id']);
		echo $this->views->render('edit', ['post' => $post] );
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

		echo $this->views->render('contacts');
	}

	public static function Error($numberError)
	{
		
		$views = new Engine('../app/views');
		echo $views->render($numberError);
	}
}