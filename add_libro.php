<?php

	require 'vendor/autoload.php';
	
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->demo->beers;

$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );

echo "Inserted with Object ID '{$result->getInsertedId()}'";

/*
	$mongo = new MongoClient();


	$db = $mongo->selectDB("employeesdb");
	$c_employees = $mongo->selectCollection("employeesdb","employees");

	//////////////////////////////////////
	$nameemployee = $_POST["nameemployee"];
	$company = $_POST["company"];
	$descripcion = $_POST["descripcion"];
	//////////////////////////////////////

	$nuevoemployee = array("nombre"=>$nameemployee,"company"=>$company,"descripcion"=>$descripcion);
	$c_employees->insert($nuevoemployee);

	header("Refresh: 0;url=index.php?mensaje=2")

	*/
?>