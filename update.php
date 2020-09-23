<?php
session_start(); 
if(!isset($_SESSION['uname'])){
	header('location:login.php');		
}

$uname=$_SESSION['uname'];
$name=$_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Welcome !!!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='index.css'>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	
	<div class="container">
			<div class="row  justify-content-center">
				<div class="col-md-6 login-center ">
					<h2>Welcome <?php echo "$uname"; ?></h2>
					<form action="update1.php" method="post">
						<div class="form-group">
							<label>Change Password</label>
							<input type="password" name="password" id="password" class="form-control" required>

						</div>
							<button type="submit" class="btn btn-primary"> Update	</button>
							<p>Note:- Password Should Not be set to admin</p>
							<div class="message">
							<?php 
							    if(isset($_GET["message"])){
								    if(($_GET["message"])=="same")
								    {
										echo"Password should not be 'admin'";
								 	}
								 }
								 ?>
								 	
							</div>
					</form>
					
				</div>
		
			</div>
		</div>
</body>
</html>
