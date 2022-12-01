<?php 
	require_once '../pdo.php';

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$title=$_POST["title"];
		$description=$_POST["description"];
		$genre=$_POST["genre"];
		$rating=$_POST["rating"];
		$writer=$_POST["writer"];
		$stars=$_POST["stars"];
		$director=$_POST["director"];
	
		$query="INSERT INTO $table(title, description, genre, rating, writer, stars, director) VALUES('$title','$description','$genre','$rating','$writer','$stars','$director')";
		
		$result=$conn->prepare($query);
		$result->execute();

		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}else{
		http_response_code(405);
	}


?>