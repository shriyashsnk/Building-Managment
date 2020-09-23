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
$relation=$_POST['vi_relation'];
$name=$_POST['vi_name'];
$mobile=$_POST['vi_mobile'];

$sql = "INSERT INTO user_visiter(username,relation,name,mobile) VALUES('$username','$relation','$name','$mobile')";

if($conn->query($sql)==TRUE){
	
	header('Location: home.php?message=valid');
}else{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();


?>