<?php
/**
 QueryBuilder - компонент для работы с базой данных;

 getAll($table)        - получает все записи из таблицы $table;
 getOne($table, $id)   - получает одну запись $id из таблицы $table;
 create($table, $data) - создает запись в таблице $table где $data записываемые данные;
 update($table, $data) - обновляет запись в таблице $table где $data обновляемые данные;
 deleteOne($table, $id) - удаляет одну запись $id из таблицы $table;
 
 */
namespace MyComponents;
use PDO;
use Aura\SqlQuery\QueryFactory;
// use MyComponents\Connection;

class QueryBuilder 
{
	private $pdo;
	private $queryFactory;

	public function __construct()
	{
		
		$this->queryFactory = new QueryFactory('mysql'); 
		$this->pdo = new PDO(
			"mysql:host=localhost;dbname=marlin_module_1;charset=utf8;", 
			"root", 
			"");
	}
	
	public function getAll($table)
	{
		$select = $this->queryFactory->newSelect();
		$select->cols(['*'])->from($table);
		// prepare the statment
		$sth = $this->pdo->prepare($select->getStatement());
		// bind the values and execute
		$sth->execute($select->getBindValues());
		// get the results back as an associative array
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $result;

		// $sql = "SELECT * from {$table}";
		// $statement = $this->pdo->prepare($sql); // подготовить запрос
		// $statement->execute(); // выполниь запрос
		// return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getOne($table, $id)
	{

		$select = $this->queryFactory->newSelect();
		$select->cols(['*'])
			   ->from($table)
			   ->where('id = :id')
		       ->BindValue('id' , $id);
		$sth = $this->pdo->prepare($select->getStatement());
		$sth->execute($select->getBindValues());
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		return $result;



   

		// $sql = "SELECT * FROM {$table} WHERE id=:id";
		// $statement = $this->pdo->prepare($sql);
		// var_dump($statement);die;
		// $statement->bindValue(':id', $id);
		// $statement->execute();
		// return $statement->fetch(PDO::FETCH_ASSOC);
	}

	public function insert($table, $data)
	{
		$insert = $this->queryFactory->newInsert();
		$insert 
		    ->into($table)                   // INTO this table
		    ->cols($data);

		$sth = $this->pdo->prepare($insert->getStatement());
		if ($sth->execute($insert->getBindValues())){
			return true;	
		} else {
			return false;	
		}


		// $keys = implode(', ', array_keys($data));
		// $tags = ":".implode(', :', array_keys($data));

		// $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$tags})";

		// $statement = $this->pdo->prepare($sql);
		// if ($statement->execute($data)){
		// 	return true;	
		// } else {
		// 	return false;	
		// }
		
	}

	public function update($table, $data, $id)
	{
		unset($data['id']);

		$update = $this->queryFactory->newUpdate();
		$update->table($table)           // update this table
		       ->cols($data)
			   ->where('id = :id')
			   ->BindValue('id' , $id);

		$sth = $this->pdo->prepare($update->getStatement());
		if ($sth->execute($update->getBindValues()))
		{
			return true;	
		} else {
			return false;	
		}




		// $keys = array_keys($data);
		// $string ='';
		// $id = $data['id'];
		// foreach($keys as $key){
		// 	if ($key == 'id'){
		// 		continue;
		// 	}
		// 	$string .= $key.'=:'.$key.',';
		// }
		// $keys = rtrim($string, ',');
		// $sql = "UPDATE {$table} SET {$keys} WHERE id=:id";
		// $statement = $this->pdo->prepare($sql);
		// var_dump($sql);die; //"UPDATE posts SET title=:title WHERE id=:id" 
		// $statement->bindValue(':id', $id);
		// if ($statement->execute($data)){
		// 	return true;	
		// } else {
		// 	return false;	
		// }
	}
		
	public function deleteOne($table, $id)
	{

		$delete = $this->queryFactory->newDelete();

		$delete->from($table)                   // FROM this table
		       ->where('id = :id')
		       ->BindValue('id' , $id);

		$sth = $this->pdo->prepare($delete->getStatement());

		if ($sth->execute($delete->getBindValues()))
		{
			return true;	
		} else {
			return false;	
		}

		// $sql = "DELETE FROM {$table} WHERE id=:id";
		// $statement = $this->pdo->prepare($sql);
		// $statement->bindValue(':id', $id);
		// if ($statement->execute()){
		// 	return true;	
		// } else {
		// 	return false;	
		// }
	}	
	public function getPDO()
	{
		return $this->pdo;	
	}
}