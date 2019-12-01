<?php

	//https://www.php.net/manual/en/mongodb.tutorial.library.php

	class Db{
		private $connection;
		private $name;
		private $schema;

		function __construct($db_connection)
		{
		   $this->connection = $db_connection;
		}

		function setDb($dbName){
			$this->name = $dbName;
			$this->schema = $this->connection->$dbName;
			return ;
		}

		function getDbName(){
			return $this->name;
		}

		function getDbSchema(){
			return $this->schema;
		}

		function getConnection(){
			return $this->connection;
		}

		function getCollection($collectionName){	
			$collection = $this->schema->$collectionName;
			return $collection;
		}


    }



	//  	TODO QUITAR DE MODEL Y PASAR A CONTROLLER

	require_once('DataBaseClient.php');
	$db = new Db($db_connection);
	$db->setDb('holden');


	/*
	$companias = $db->getCollection('companies')->find()->toArray();
		foreach ($companias as $entry) {
    	echo $entry['_id'], ': ', $entry['name'], "\n";
	}
	*/

	/*
	$result = $db->getCollection('companies')->find( [ 'name' => 'Corte Ingles'] );
	foreach ($result as $entry) {
    	echo $entry['_id'], ': ', $entry['name'], "\n";
	}
	*/

/*
			$c_employees = $db->getCollection('companies')->find( [ 'name' => 'Corte Ingles']);
			echo '<pre>';
			foreach ($c_employees as $entry) {
				echo $entry['_id'].'<br>';
				print_r($entry['employees']);
			}
			echo '</pre>';
		die();
*/

		
	/*
		$filter = ['name' => 'Corte Ingles'];
		$options = [
		   'projection' => ['_id' => 0],
		];

	*/



 ?>