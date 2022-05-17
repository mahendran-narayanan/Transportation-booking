<?php

	$servername = "";
	$username = "";
	$password = "";
	$dbname = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	$facultyname=$_POST['facultyname'];
	$start = $_POST['start'];
	$stime = $_POST['stime'];
	$ret = $_POST['ret'];
	$rtime =  $_POST['rtime'];
	$vehicle = $_POST['vehicle'];
	$peroff  = $_POST['peroff'];
	$purpose = $_POST['purpose'];
	$drivelink = $_POST['link'];
	$mobile = $_POST['mobile'];


	$query = "SELECT facultyname from faculty";
	$result = mysqli_query($conn, $query);

	if(empty($result)) {
		$query = "CREATE TABLE faculty (
		facultyname varchar(20),
		start varchar(30),
		stime varchar(10),
		ret varchar(30),
		rtime varchar(10),
		vehicle varchar(20),
		peroff varchar(20),
		purpose varchar(200),
		attach varchar(255),
		mobile varchar(10)
		)";
		$result = mysqli_query($conn, $query);
		echo "Faculty table created!...\n";
	}
	if(!isset($facultyname)){
		include("index.html");
	}
	else{
		$submitcount=1;
		if($submitcount==1){
				$sql = "INSERT INTO faculty (facultyname,start,stime,ret,rtime,vehicle,peroff,purpose,attach,mobile) VALUES ('$facultyname','$start','$stime','$ret','$rtime','$vehicle','$peroff','$purpose','$drivelink','$mobile')";
			
				if ($conn->query($sql) === TRUE) {
						$msg = "Thanks for booking at transport with IIT Tirupati.
						Please wait to hear from us shortly";
		
						$mobile = (int)$mobile;
		
		
						$senderId = "";
						$route = ;
						$sms = array(
							'message' => $msg,
							'to' => array($mobile)
						);
						//Prepare you post parameters
						$postData = array(
							'sender' => $senderId,
							'route' => $route,
							'sms' => array($sms)
						);
						$postDataJson = json_encode($postData);
		
						$url="";
		
						$curl = curl_init();
						curl_setopt_array($curl, array(
							CURLOPT_URL => "$url",
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS => $postDataJson,
							CURLOPT_HTTPHEADER => array(
								"authkey: "
							),
						));
						$response = curl_exec($curl);
						$err = curl_error($curl);
						curl_close($curl);
						if ($err) {
							echo "cURL Error #:" . $err;
						} else {
							include('success.html');
						}
				    
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$submitcount+=1;
			}
	}
	
	$conn->close();


	

?>