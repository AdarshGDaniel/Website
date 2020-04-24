<?php
$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
if(empty($_POST['username']) || empty($_POST['password'])){
$error = "Username or Password is Invalid";
}
else
{
//Define $user and $pass
$user=$_POST['username'];
$pass=$_POST['password'];
//Establishing Connection with server by passing server_name, user_id and pass as a patameter
$conn = mysqli_connect("localhost", "root", "");
//Selecting Database
$db = mysqli_select_db($conn, "covid");
//sql query to fetch information of registerd user and finds user match.
$query = mysqli_query($conn, "SELECT * FROM `account` WHERE pass='$pass' AND user='$user'");
$rows = mysqli_num_rows($query);
if($rows == 1){
header("Location: php/index.php"); // Redirecting to other page
}
else
{
$error = "Username of Password is Invalid";
}
mysqli_close($conn); // Closing connection
}
}
?>

<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>