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
	
	$guestname=$_POST['guestname'];
	$start = $_POST['start'];
	$stime = $_POST['stime'];
	$ret = $_POST['ret'];
	$rtime =  $_POST['rtime'];
	$vehicle = $_POST['vehicle'];
	$purpose = $_POST['purpose'];
	$drivelink = $_POST['link'];
	$mobile = $_POST['mobile'];
	
	$query = "SELECT guestname from guest";
	$result = mysqli_query($conn,$query);

	if(empty($result)){
		$query = "CREATE TABLE guest(
		guestname varchar(20),
		start varchar(200),
		stime varchar(10),
		ret varchar(200),
		rtime varchar(10),
		vehicle varchar(20),
		purpose varchar(200),
		attach varchar(255),
		mobile varchar(10)
		)";
		$result = mysqli_query($conn,$query);
		echo "Guest Table Created!...\n";

	}
	if(!isset($guestname)){
		echo "Missing fields.";
	}
	else{
	$sql = "INSERT INTO guest (guestname,start,stime,ret,rtime,vehicle,purpose,attach,mobile) VALUES ('$guestname','$start','$stime','$ret','$rtime','$vehicle','$purpose','$drivelink','$mobile')";
	
	if ($conn->query($sql) === TRUE) {
		include('success.html');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
	$conn->close();


	

?>