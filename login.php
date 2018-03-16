<?php
session_start(); 

// recieve form data from login page 
$username= $_POST['username'];
$password = $_POST['password'];

// connect to Yaseen's database 
$conn = new mysqli("mysql-server-1.macs.hw.ac.uk", "myj2", "789yaseen786iam", "myj2");
if ($conn->connect_error) {
    die("We are sorry to announce the connection to the Heriot-Watt MACS server has failed, please try again later." . $conn->connect_error);
}

// search on database for entered username and password 
$sql = "SELECT * from users where username='$username' and password='$password'";
$result = $conn->query($sql);

// if successful then redirect back to homepage and welcome user by their username 
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "successful ".$username; 
    $_SESSION["username"]=$username; 
    $_SESSION["logged"]=true;
    header('Location: http://www2.macs.hw.ac.uk/~myj2/form2.php'); 

// if faliure then redirect back to login page and ask user to enter their credentials once again 
} else { 
	$_SESSION["logged"]=false; 
	header('Location: http://www2.macs.hw.ac.uk/~myj2/form2.php');
}
$conn->close(); 
?>

