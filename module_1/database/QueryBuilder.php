
<?php

/**
 * 
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

}