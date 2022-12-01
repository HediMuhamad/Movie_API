<?php 
	require_once '../pdo.php';

	if($_SERVER["REQUEST_METHOD"]=="GET"){

		$id_list=$_REQUEST["id_list"];

		$query="SELECT * FROM $table";

		if($id_list){
			$query = $query." WHERE id in ($id_list)";
			echo $query;
		}
		
		$stmt=$conn->prepare($query);
		$stmt->execute();
	
		$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
		http_response_code(200);
		echo json_encode($result);
	}else{
		http_response_code(405);
	}

	

?>