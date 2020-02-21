<?php

class QueryBuilder 
{
	protected $pdo;

	public function __construct($pdo)
	{

		$this->pdo = $pdo;
	}
	
	public function getAll($table)
	{
	  
	  // 2. Выполнить запрос к БД
	  $sql = "SELECT * from {$table}";
	  $statement = $this->pdo->prepare($sql); // подготовить запрос
	  $statement->execute(); // выполниь запрос

	  // 3. Получить массив данных
	  return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getOne($table, $id)
	{

		$sql = "SELECT * FROM {$table} WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(':id', $id);
		$statement->execute();
		return $statement->fetch(PDO::FETCH_ASSOC);
	}

	public function create($table, $data)
	{
		$keys = implode(', ', array_keys($data));
		$tags = ":".implode(', :', array_keys($data));

		$sql = "INSERT INTO {$table} ({$keys}) VALUES ({$tags})";

		$statement = $this->pdo->prepare($sql);
		if ($statement->execute($data)){
			$_SESSION['status'] = '200-1';
		} else {
			$_SESSION['status'] = '403-1';
		}
	}

	public function update($table, $data)
	{

		$keys = array_keys($data);
		$string ='';
		$id = $data['id'];
		foreach($keys as $key){
			if ($key == 'id'){
				continue;
			}
			$string .= $key.'=:'.$key.',';
		}
		$keys = rtrim($string, ',');
		$sql = "UPDATE {$table} SET {$keys} WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(':id', $id);
		if ($statement->execute($data)) {
			$_SESSION['status'] = '200-2';
		} else {
			$_SESSION['status'] = '403-2';
		}		
	}
		
	public function deleteOne($table, $id)
	{
		$sql = "DELETE FROM {$table} WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(':id', $id);
		if ($statement->execute()) {
			$_SESSION['status'] = '200-3';
		} else {
			$_SESSION['status'] = '403-3';
		}				
	}	
}