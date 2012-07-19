<?php

function retrieve_variable($dbh, $table, $query, $queriedColumn, $retrievedColumn){
	$stringStmt = "SELECT $retrievedColumn FROM $table WHERE $queriedColumn=:query";
	echo $stringStmt."<br/>";
	$stmt = $dbh->prepare($stringStmt);
	$stmt->bindParam(':query', $query);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$returnVar = $result[ $retrievedColumn ];
	
	return $returnVar;
}

function retrieve_row($dbh, $table, $query, $queriedColumn){
	$stringStmt = "SELECT * FROM $table WHERE $queriedColumn=:query";
	echo $stringStmt."<br/>";
	$stmt = $dbh->prepare($stringStmt);
	$stmt->bindParam(':query', $query);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	
	return $result;
}

function get_db_handle(){
	try {
		#Open connection
		$dbh = new PDO('mysql:host=localhost;dbname=samsDb', "sam", "chromosome");
		return $dbh;
	} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
	}
}

?>
