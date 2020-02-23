<?php

class flashMessages 
{
	private static $statusList = [
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
	public static function pushStatus($status)
	{
		$_SESSION['flashMessagesStatus'] = $status;
	}
	public static function cleanStatus()
	{
		unset($_SESSION['flashMessagesStatus']);
	}	
	public static function show()
	{	

		$messageShow = '';

		if (isset($_SESSION['flashMessagesStatus'])) {
			foreach (self::$statusList as $status => $message) {
				if ($_SESSION['flashMessagesStatus'] == $status){
					$messageShow = $message;
					break;
				}
			}
			// self::statusClean();
			return $messageShow;		
			
		}
	}
}


