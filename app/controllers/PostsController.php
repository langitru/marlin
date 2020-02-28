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

class PostsController 
{
	private $db;
	private $id;
	private $views;
	
	function __construct($action, $id)
	{
		$this->db = new QueryBuilder();
		$this->views = new Engine('../app/views');

		$this->id = $id;
		$this->$action();
		
	}

	public function index()
	{

		$posts = $this->db->getAll('posts');
		
		echo $this->views->render('index', ['posts' => $posts] );
		// FlashMessages::cleanStatus();
	}

	public function create()
	{

		echo $this->views->render('create');
		// FlashMessages::cleanStatus();
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

	public function show() 
	{

		$post = $this->db->getOne('posts', $this->id);
		echo $this->views->render('show', ['post' => $post] );		
	}

	public function edit()
	{

		$post = $this->db->getOne('posts', $this->id);
		echo $this->views->render('edit', ['post' => $post] );
		// FlashMessages::cleanStatus();
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

	public function delete()
	{

		$post = $this->db->deleteOne('posts', $this->id);
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