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
	<div class="login-box">
		<div class="row  justify-content-center">
			<div class="col-md-6  ">
				<h2>Login Here</h2>
				<form action="validation.php" method="post">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="uname" id="uname"  class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="Password" name="password" id="password" class="form-control" required>
					</div>

					<button type="submit" class="btn btn-primary"> Login	</button>

					<div class="message">
						<?php 
						    if(isset($_GET["message"])){
							    if(($_GET["message"])=="invalid")
							    {
									echo"Invalid password..";
							 	}
							    if (($_GET["message"])=="signup") {
							        echo"Account Does not exixts.";
							    }}?>
							    
							    <div class="message-sucess"><?php
							    if(isset($_GET["message"])){
							    if (($_GET["message"])=="sucess") {
							        echo"Password Changed Sucessfully..";
							    }
						  } 
						?>
					</div>
					</div>
				</form>
				
			</div>
			
		</div>
		

	</div>
	

</div>


</body>
</html>