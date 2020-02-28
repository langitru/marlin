<?php

/**
 * 
 */
namespace Controllers;
use MyComponents\QueryBuilder;
use MyComponents\Connection;
use MyComponents\FlashMessages;
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
				FlashMessages::pushStatus('200-1');
			} else {
				FlashMessages::pushStatus('403-1');
			}

			header('location: /');
		} else {
			FlashMessages::pushStatus('411-1');
			header("location: {$_SERVER['HTTP_REFERER']}");
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
				FlashMessages::pushStatus('200-2');
			} else {
				FlashMessages::pushStatus('403-2');
			}

			header('location: /');
		} else {
			FlashMessages::pushStatus('411-1');
			header("location: {$_SERVER['HTTP_REFERER']}");
		}
	}

	public function delete()
	{

		$post = $this->db->deleteOne('posts', $this->id);
		if ($post) {
			FlashMessages::pushStatus('200-3');
		} else {
			FlashMessages::pushStatus('403-3');
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