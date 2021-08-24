<!DOCtype html>
<html>
    <head>
        <title>Database Table</title>
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>
    <table>
        <tr>
         <th>First name</th>
         <th>Last name</th>
         <th>Gender</th>
         <th>Nationality</th>
         <th>Email</th>
         <th>Phone no</th>

</tr>
<?php
$conn = mysqli_connect('localhost','root','','registrations');
if($conn->connect_error)
{
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} 
else 
{
    $sql = "select firstname,lastname,gender,country,email,number from forms";
    $result = $conn->query($sql);
    if($result-> num_rows > 0)
    {
        while ($row = $result->fetch_assoc())    
        {
            echo"<tr><td>" . $row["firstname"] ."</td><td>" . $row["lastname"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["country"] . "</td><td>" . $row["email"] . "</td><td>" . $row["number"] ."</td></tr>";
        }
        
        echo "</table>";
    }
    else
    {
        echo"no result";

    }


    }
     
    $conn-> close();
    ?>


</table>
</body>
</html>

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
		$stmt = $conn->prepare("insert into forms(firstname, lastname, gender, email, country, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstname, $lastname, $gender, $email, $country, $number);
		$execval = $stmt->execute();
		echo $execval;
		$stmt->close();
		$conn->close();
	}
?>