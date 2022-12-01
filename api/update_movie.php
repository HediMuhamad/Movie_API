<?php 
	require_once '../pdo.php';

	if($_SERVER["REQUEST_METHOD"] == "PATCH"){
		$id=$_REQUEST["id"];
		if(!$id){
			http_response_code(400);
			echo "id parameter required";
			exit();
		}
		
		$title=$_REQUEST["title"];
		$description=$_REQUEST["description"];
		$genre=$_REQUEST["genre"];
		$rating=$_REQUEST["rating"];
		$writer=$_REQUEST["writer"];
		$stars=$_REQUEST["stars"];
		$director=$_REQUEST["director"];
		

		$queries = array();
		
		if($title){
			array_push($queries, "title = '$title'");
		}
		if($description){
			array_push($queries, "description = '$description'");
		}
		if($genre){
			array_push($queries, "genre = '$genre'");
		}
		if($rating){
			array_push($queries, "rating = $rating");
		}
		if($writer){
			array_push($queries, "writer = '$writer'");
		}
		if($stars){
			array_push($queries, "stars = '$stars'");
		}
		if($director){
			array_push($queries, "director = '$director'");
		}

		if(count($queries, 0)==0){
			http_response_code(400);
			echo "zero field update.";
			exit();
		}

		$query = "UPDATE $table SET ".implode(", ", $queries)." WHERE id = $id";
		
		$result=$conn->prepare($query);
		$result->execute();

		

	}else{
		http_response_code(405);
	}


?>