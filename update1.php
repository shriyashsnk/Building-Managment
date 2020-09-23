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


$uname=$_SESSION['uname'];
$name=$_SESSION['name'];

$u_password=$_POST['password'];

if ($u_password!='admin')
 {
	$sql="UPDATE user_c SET password='$u_password' WHERE username='$uname'" ;
if($conn->query($sql)==TRUE)
	{
		
		header('location:login.php?message=sucess');
	}
else{
	echo "Error".$sql."<br>".$conn->error;
}
}else{
	header('location:update.php?message=same');
}







?>
