<?php

	require 'vendor/autoload.php';
	$db_connection = new MongoDB\Client("mongodb://localhost:27017");


	
	//echo "Inserted with Object ID '{$db_collection}'";
	//$result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );

	//echo "Inserted with Object ID '{$result->getInsertedId()}'";


?>