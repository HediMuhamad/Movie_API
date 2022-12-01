<?php 
	require_once '../pdo.php';

	if($_SERVER["REQUEST_METHOD"] == "DELETE"){
		$id_list=$_REQUEST["id"];
	
		$query="DELETE FROM $table WHERE id IN ($id_list)";
		
		$result=$conn->prepare($query);
		$result->execute();

	}else{
		http_response_code(405);
	}


?>