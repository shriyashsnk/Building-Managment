<?php
session_start(); 
$servername="localhost";
$username="root";
$password="";
$dbname="building managment";

$conn=new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die("Connection Failed ".$conn->connect_error);

}

$username=$_SESSION['uname'];
$feedback=$_POST['txt'];

$sql = "INSERT INTO user_feedback(username,feedback) VALUES('$username','$feedback')";

if($conn->query($sql)==TRUE){
	
	header('Location: home.php?message=valid');
}else{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();


?>