<?php
/**
 QueryBuilder - компонент для работы с базой данных;

 getAll($table)        - получает все записи из таблицы $table;
 getOne($table, $id)   - получает одну запись $id из таблицы $table;
 create($table, $data) - создает запись в таблице $table где $data записываемые данные;
 update($table, $data) - обновляет запись в таблице $table где $data обновляемые данные;
 deleteOne($table, $id) - удаляет одну запись $id из таблицы $table;
 
 */
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
			return true;	
		} else {
			return false;	
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
		if ($statement->execute($data)){
			return true;	
		} else {
			return false;	
		}
	}
		
	public function deleteOne($table, $id)
	{
		$sql = "DELETE FROM {$table} WHERE id=:id";
		$statement = $this->pdo->prepare($sql);
		$statement->bindValue(':id', $id);
		if ($statement->execute()){
			return true;	
		} else {
			return false;	
		}
	}	
}