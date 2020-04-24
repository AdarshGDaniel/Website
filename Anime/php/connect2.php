<?php
	$username = $_POST['username'];
	$phone = $_POST['number'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$discription = $_POST['discription'];

	// Database connection
	$conn = new mysqli('localhost','root','','covid');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO registration (username, number, gender, email, address, discription) values($username, $number, $gender, $email, $address, $discription)");
		$stmt->bind_param("sssssi", $username, $number, $gender, $email, $address, $discription);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
