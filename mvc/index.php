<?php
// 1. Создать форму для отправки картинки.
// 2. Создать скрипт который будет обрабатывать форму. upload_image.php
//   2.1. Сгенерировать новое название картинки.
//   2.2. Сохранить картнку в папку uploads

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="controller.php" method="post" enctype="multipart/form-data">
		<input type="file" name="image" >
		<input type="submit" name="submit">
	</form>
</body>
</html>