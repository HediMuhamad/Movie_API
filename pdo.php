<?php

$host='localhost';
$db='movie_api';
$table="movies";
$user='root';
$pass='';

$dns="mysql:host=$host;dbname=$db";


try{
	$conn = new PDO($dns, $user, $pass);

	if($conn){
		if (version_compare(phpversion(), '7.1', '>=')) {
			ini_set( 'precision', -1 );
			ini_set( 'serialize_precision', -1 );
		}
	}else{
		echo "DATABASE NOT FOUND!";
	}

} catch (PDOException $th) {
	echo $th->getMessage();
}


?>