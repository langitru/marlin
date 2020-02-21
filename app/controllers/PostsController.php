<?php

/**
 * 
 */
class PostsController 
{
	private $db;
	private $id;
	
	function __construct($action, $id)
	{
		include __DIR__ . '/../components/FlashMessages.php';
		include __DIR__ . '/../components/Validator.php';
		$this->db = include __DIR__ . '/../../db/start.php';
		$this->id = $id;
		$this->$action();
	}

	public function index()
	{

		$posts = $this->db->getAll('posts');
		
		include __DIR__ . '/../views/posts/index.php';

		unset($_SESSION['status']);
	}

	public function create()
	{

		include __DIR__ . '/../views/posts/create.php';
		unset($_SESSION['status']);
	}

	public function new()
	{
		if (Validator::title($_POST['title'])){

			$this->db->create(
				'posts', 
				[
					'title' => $_POST['title'],
					// 'email' => 'asd@qwe',
					// 'content' => 'qwe',
				],
			);
			header('location: /');
		} else {
			$_SESSION['status'] = '411-1';
			// dd($_SERVER);
			header("location: {$_SERVER['HTTP_REFERER']}");
		}

	}

	public function show() 
	{

		$post = $this->db->getOne('posts', $this->id);

		include __DIR__ . '/../views/posts/show.php';		
	}

	public function edit()
	{

		$post = $this->db->getOne('posts', $this->id);
		include __DIR__ . '/../views/posts/edit.php';
		unset($_SESSION['status']);
	}

	public function update()
	{
		if (Validator::title($_POST['title'])){
			$this->db->update('posts', $_POST);
			header('location: /');
		} else {
			$_SESSION['status'] = '411-1';
			header("location: {$_SERVER['HTTP_REFERER']}");
		}
	}

	public function delete()
	{

		$post = $this->db->deleteOne('posts', $this->id);

		header('location: /');
	}

	public function contacts()
	{

		include __DIR__ . '/../views/posts/contacts.php';
	}
}