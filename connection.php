<?php
	$firstName = $_POST['firstname'];
	$lastName = $_POST['lastname'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$country = $_POST['country'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','registrations');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into form(firstName, lastName, gender, email, country, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $country, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "<b>Form updated";
		$stmt->close();
		$conn->close();
	}
?>