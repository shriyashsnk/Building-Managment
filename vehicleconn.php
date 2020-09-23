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
$type=$_POST['v_type'];
$model=$_POST['v_model'];
$number=$_POST['v_number'];

$sql = "INSERT INTO user_vehicle(username,type,model,number) VALUES('$username','$type','$model','$number')";

if($conn->query($sql)==TRUE){
	
	header('Location: home.php?message=valid');
}else{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();


?>