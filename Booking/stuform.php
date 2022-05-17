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

	$name = $_POST['name'];
	$rollnumber=$_POST['rollnumber'];
	$degreesem = $_POST['degreesem'];
	$start = $_POST['start'];
	$stime = $_POST['stime'];
	$ret = $_POST['ret'];
	$rtime =  $_POST['rtime'];
	$vehicle = $_POST['vehicle'];
	$purpose = $_POST['purpose'];
	$mobile = $_POST['mobile'];


	$query = "SELECT rollnumber from students";
	$result = mysqli_query($conn,$query);

	if(empty($result)){
		$query = "CREATE TABLE students(
		name varchar(30),
		rollnumber varchar(10),
		degreesem varchar(12),
		start varchar(30),
		stime varchar(10),
		ret varchar(30),
		rtime varchar(10),
		vehicle varchar(25),
		purpose varchar(200),
		mobile varchar(10)
		)";
	}
	if(!isset($name)){
		echo "Missing Fields!.";
	}
	else{
		$sql = "INSERT INTO students (name,rollnumber,degreesem,start,stime,ret,rtime,vehicle,purpose,mobile) VALUES ('$name','$rollnumber','$degreesem','$start','$stime','$ret','$rtime','$vehicle','$purpose','$mobile')";
	
	
		if ($conn->query($sql) === TRUE) {
		    include('success.html');
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	$conn->close();
?>