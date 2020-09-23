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

$uname=$_POST['uname'];
$password=$_POST['password'];


$emailoccured="Select *  from user_c where username='$uname' && password = '$password'";
$result = $conn->query($emailoccured);
$num = mysqli_num_rows($result);

if($num==1)
{
 $sql = "SELECT * FROM user_c WHERE username='$uname'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$_SESSION['name']=$row['name'];
$_SESSION['uname']=$row['username'];




if ($row['password']=='admin') {
    header('Location: update.php?');

}else{
    header('Location:home.php');
}

    
} 
else{

$email="Select *  from user_c where username='$uname' && password!= '$password'";
$result = $conn->query($email);
$num = mysqli_num_rows($result);
if ($num==1) {
	#$name="select fname from usertable where email='$email'";
	#$row=$num->fetch_assoc();
	#echo $row["fname"];
	header('Location: login.php?message=invalid');
	# code...
}else{
	header('Location: login.php?message=signup');
}


}


 ?>