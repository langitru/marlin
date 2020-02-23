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

		FlashMessages::cleanStatus();
	}

	public function create()
	{

		include __DIR__ . '/../views/posts/create.php';
		FlashMessages::cleanStatus();
	}

	public function new()
	{
		if (Validator::length($_POST['title'])){

			$post = $this->db->create(
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

		include __DIR__ . '/../views/posts/show.php';		
	}

	public function edit()
	{

		$post = $this->db->getOne('posts', $this->id);
		include __DIR__ . '/../views/posts/edit.php';
		FlashMessages::cleanStatus();
	}

	public function update()
	{
		if (Validator::length($_POST['title'])){
			$post = $this->db->update('posts', $_POST);
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

		include __DIR__ . '/../views/posts/contacts.php';
	}
}