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
		$this->db = include __DIR__ . '/../../db/start.php';
		$this->id = $id;
		$this->$action();
	}

	public function index()
	{

		$posts = $this->db->getAll('posts');
		
		include __DIR__ . '/../views/posts/index.php';
		
		unset($_SESSION['status']);
		unset($_SESSION['action']);
	}

	public function create()
	{

		include __DIR__ . '/../views/posts/create.php';
	}

	public function new()
	{
		$this->db->create(
			'posts', 
			[
				'title' => $_POST['title'],
				// 'email' => 'asd@qwe',
				// 'content' => 'qwe',
			],
		);
		header('location: /');
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
	}

	public function update()
	{

		$this->db->update('posts', $_POST);
		header('location: /');
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