<?php

class flashMessages 
{
	public static function show()
	{	
		$status = [
				// success
				'200-1' => 'Post successfully created!',
				'200-2' => 'Post successfully updated!',
				'200-3' => 'Post successfully deleted!',
				// failed
				'403-1' => 'Post not created!',
				'403-2' => 'Post not updated!',
				'403-3' => 'Post not deleted!',
				'411-1' => 'Длина заголовка должна быть больше 5 символов',
		];
		$message = '';

		if (isset($_SESSION['status'])) {
			foreach ($status as $key => $value) {
				if ($_SESSION['status'] == $key){
					$message = $value;
					break;
				}
			}
			return $message;		
		}
	}
}


