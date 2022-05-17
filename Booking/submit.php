<?php

	$servername = ;
	$username = ;
	$password = ;
	$dbname = ;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	$name=$_POST['name'];
	$rollnumber=$_POST['rollnumber'];

	$sql = "INSERT INTO t1 (name, rollnumber) VALUES ('$name','$rollnumber')";


	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


	

?>