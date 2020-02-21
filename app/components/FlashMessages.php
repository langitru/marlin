<?php

class flashMessages 
{

	public static function show()
	{	

		$status = [
			'success' => [
				'created' => 'Post successfully created!',
				'updated' => 'Post successfully updated!',
				'deleted' => 'Post successfully deleted!',
			],
			'danger'  => [
				'created' => 'Post not created!',
				'updated' => 'Post not updated!',
				'deleted' => 'Post not deleted!',
			],
		];
		$message = '';
		if (isset($_SESSION['status'])) {

			if ($_SESSION['status'] == 'success') {
				switch ($_SESSION['action']) {
					case 'created':
						$message = $status['success']['created'];
						// dd($message);
						break;
					case 'updated':
						$message = $status['success']['updated'];
						break;
					case 'deleted':
						$message = $status['success']['deleted'];
						break;									
					default:
						# code...
						break;
				}
			} else {
				switch ($_SESSION['action']) {
					case 'created':
						$message = $status['danger']['created'];
						break;
					case 'updated':
						$message = $status['danger']['updated'];
						break;
					case 'deleted':
						$message = $status['danger']['deleted'];
						break;									
					default:
						# code...
						break;
				}
			}
			return $message;		
		}
	}
}


