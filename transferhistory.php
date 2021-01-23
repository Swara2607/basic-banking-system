<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Transfer History</title>
    <link rel='icon' type='image/jpg' href='logo1.jpg' />
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  table, th, td {  
  color:white;
  border: 3px solid white;
  padding: 14px;
  background-color:black;
}
table {
border-spacing: 10px;
}
</style> 
</head>
 
  <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Banking Site</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php ">Home</a></li>
            <li><a href="viewcustomer.php ">View All Customer</a></li>
            <li><a href="transfer.php">Transfer</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="checkdetails.php"><span class="glyphicon glyphicon-user"></span> View Customers Details</a></li>
            <li class="active"><a href="transferhistory.php"><span class="glyphicon glyphicon-log-in"></span> Transfer History</a></li>
          </ul>
        </div>
      </nav> 

     
  
      <center>

		<h1 > Transfer History </h1>
          <table>
	<tr>
  <td>Sr No.</td>
  <td>From</td>
  <td>To</td>  
  <td>Amount</td> 
	
	</tr>
    <?php
    session_start();
  
    $servername="sql304.epizy.com";
    $username="epiz_27761035";
    $password="pno90vLio9";
    $db_name="epiz_27761035_my_db";
    $tbl_name="";
    //create connection
    $conn=mysqli_connect($servername,$username,$password);
    //Check connection
    if(!$conn)
    {
        die("Connection failed:".mysqli_connect_error());
        }
    
    $conn -> select_db($db_name);
    $result = mysqli_query($conn,"SELECT * FROM `transfers`");
    $count = 0;
	
	while($row = mysqli_fetch_array($result)) {
    $count+=1;
	?>
  <tr style="color:white;" class="<?php if(isset($classname)) echo $classname;?>">
  <td> <?php echo $count; ?>)</td>
  <td><?php echo $row["from_user"]; ?></td>
  <td><?php echo $row["to_user"]; ?></td>
  <td><?php echo $row["balance"]; ?></td>
	
	</tr>
	<?php
	
	}
  ?>
  </center>
</table>
</body>
</html>