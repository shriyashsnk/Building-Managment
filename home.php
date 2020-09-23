<?php
session_start(); 
if(!isset($_SESSION['name'])){
	header('location:login.php');		
}
$servername="localhost";
$username="root";
$password="";
$dbname="building managment";

$conn=new mysqli($servername,$username,$password,$dbname);
$uname=$_SESSION['name'];
if ($conn->connect_error){
    die("Connection Failed ".$conn->connect_error);

}
$uname=$_SESSION['uname'];
$sql="Select * from user_vehicle where username='$uname'";
$result = $conn->query($sql);
$sql1="Select * from user_visiter where username='$uname'";
$result1 = $conn->query($sql1);
$sql2="Select * from user_feedback where username='$uname'";
$result2 = $conn->query($sql2);

?>
<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='home.css'>


     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>



<nav class="navbar ">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" style="text-transform: capitalize;" href="#">Welcome <?php echo $_SESSION['name'];?>!!!</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
      <li><a  href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a  data-toggle="popover" title="tel:+910123654789" href="tel:+910123654789" ><span class="glyphicon glyphicon-earphone"></span>   Call Security </a></li>
    </ul>
  </div>
</nav>
<br>
<div class="container">
<div class="message">
   <?php 
   
       if(isset($_GET["message"])){
        if (($_GET["message"])=="valid") {
          echo" Updated Sucessfully..";
      } } 
   ?>
</div>
</div>
<br>

<div class="container">

  <div class="panel-group" id="accordion">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#ex0"><b>  Dashboard </b></a>
      </div> 
      <div id="ex0" class="panel-collapse collapse in">
        <div class="panel-body"><h3>  <u>Vehicle Details</u></h3><hr>  

       <table class="table">

  <thead>
    <tr>
      <th scope="col">Model Name</th>
      <th scope="col">Type</th>
      <th scope="col">Number</th>
      <th scope="col">Date</th>
      
    </tr>
 </thead>
  
  
<?php
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
   ?>
   <tbody>
     <tr>
        <td><?php echo $row['model'];?></td>
        <td><?php echo $row['type'];?></td>
        <td><?php echo $row['number'];?></td>
        <td><?php echo $row['Date'];?></td>
      </tr>
 </tbody>
  <?php } ?>
  <?php
}else{?>
  <td style="text-align: left;"><?php echo "0 Results... ";}?></td>
</table><hr>  <hr>  

<div class="panel-body"><h3> <u> Visiter Details </u></h3><hr>  

       <table class="table">

  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Relation</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Date</th>
      
    </tr>
 </thead>
  
  
<?php
  if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc()){
   ?>
   <tbody>
     <tr>
        <td><?php echo $row1['name'];?></td>
        <td><?php echo $row1['relation'];?></td>
        <td><?php echo $row1['mobile'];?></td>
        <td><?php echo $row1['Date'];?></td>
      </tr>
 </tbody>
  <?php } ?>
  <?php
}else{?>

  <td style="text-align: left;"><?php echo "0 Results... ";}?></td>
</table>



<div class="panel-body"><h3> <u> Feedback Details <u></h3><hr>  

       <table class="table">

  <thead>
    <tr>
      <th scope="col">Feedback</th>
      <th scope="col">Date</th>
      
    </tr>
 </thead>
  
  
<?php
  if ($result2->num_rows > 0) {
    while($row2 = $result2->fetch_assoc()){
   ?>
   <tbody>
     <tr>
        <td><?php echo $row2['feedback'];?></td>
        <td><?php echo $row2['Date'];?></td>
      </tr>
 </tbody>
  <?php } ?>
  <?php
}else{?>

  <td style="text-align: left;"><?php echo "0 Results... ";}?></td>
</table>

</div>
</div>


        
      </div>
    </div>
  </div>
 </div>
</h4>
</div>


<div class="container">

  <div class="panel-group" id="accordion">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#ex1">Complain / Feedback</a>
      </div> 
      <div id="ex1" class="panel-collapse collapse in">
        <div class="panel-body">
        
        <form action="feedback.php" method="post">
          <div class="form-group">
            <label>Feedback/Complain</label><br> 
          <textarea class="form-control" name="txt" required id="txt" placeholder="Feedback.." cols=100% rows="10"></textarea>
          </div>
          <button type="submit" class="btn btn-primary"> Submit  </button>
        </form>
      </div>
    </div>
  </div>
 </div>
</h4>
</div>

 <div class="container">
 <div class="panel-group" id="accordion">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#ex2">Details</a>
      </div>
      <div id="ex2" class="panel-collapse collapse in">
        <div class="panel-body">
          <div class="col-md-6">
              <hr>  <h1>Visiters Details</h1><hr> 
              <form action="visitorconn.php" method="post">
                <div class="form-group">
                  <label>Relation</label>
                  <input type="text" name="vi_relation" id="vi_relation"  class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" name="vi_name" id="vi_name" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Mobile Number</label>
                  <input type="tel" name="vi_mobile" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="vi_mobile" class="form-control" required>
                </div>
                 <button type="submit" class="btn btn-primary"> Submit  </button>
              </form>
          </div>
          <div class="col-md-6">
            <hr><h1>Vehicle Details</h1><hr> 
            <form action="vehicleconn.php" method="post">
             <div class="form-group">
                  <label for="vi_type">Vehicle Type</label>
                    <select class="form-control" name="v_type" id="v_type" required>
                        
                        <option value="Two">2 wheeler</option>
                        <option value="Three">3 wheeler</option>
                        <option value="Four">4 wheeler</option>

                    </select>
              </div>
              <div class="form-group">
                <label>Model Name</label>
                <input type="text" name="v_model" id="v_model" class="form-control" required>
              </div>
                <div class="form-group">
                <label>Vehicle Number</label>
                <input type="text" name="v_number" id="v_number" class="form-control" style="text-transform: uppercase;" required>
              </div>

              <button type="submit" class="btn btn-primary"> Submit  </button>
            </form>
        </div>
      </div>
    </div>
  </div>
</h4>
</div>




 







</body>
</html>
