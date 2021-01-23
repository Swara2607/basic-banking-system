<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>View Customer Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel='icon' type='image/jpg' href='logo1.jpg' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style>

  input[type=text], select {
    width:40%;
  height: 5%;
	border: 1px;
	border-radius: 05px;
	padding: 8px 15px 8px 15px;
	margin:10px 0px 10px 0px;
	box-shadow:1px 1px 2px 1px grey;
  background-color:white;
  color:black;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
	</style>	
    </head>
    <?php
$conn = mysqli_connect("sql304.epizy.com", "epiz_27761035", "pno90vLio9", "epiz_27761035_my_db");
if($conn-> connect_error){
	die("connection failed:". $conn-> connect_error);
}
$sql = "SELECT name, email, balance FROM students";
error_reporting(0);
$var1 = mysqli_query($conn,"SELECT *  FROM customers");
$var2 = mysqli_query($conn,"SELECT *  FROM customers");
?>
    <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Banking Site</a>
        </div>
        <ul class="nav navbar-nav">
          <li ><a href="index.php">Home</a></li>
          <li><a href="viewcustomer.php ">View All Customer</a></li>
          <li><a href="transfer.php">Transfer</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="checkdetails.php"><span class="glyphicon glyphicon-user"></span> View Customers Details</a></li>
          <li><a href="transferhistory.php"><span class="glyphicon glyphicon-log-in"></span> Transfer History</a></li>
        </ul>
      </div>
    </nav>

		

		
		<br>
        <center>
		<h1 > Search Customers  </h1>
            <form action="" method="POST" class = "form">
		<select  class= fromuser type="text"  name="name" required value="">
		<option class="special" value ="">Select Customer</option> 
		<?php
                        while($tname = mysqli_fetch_array($var1)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>
                <br> 


    </select>
    <br>
    <input style="width:20%; height: 5%;border: 1px;border-radius: 05px;padding: 8px 15px 8px 15px;margin:10px 0px 10px 0px;box-shadow:1px 1px 2px 1px grey;" type="submit" name="search" value="View details "> 

            </form>




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
$var1 = mysqli_query($conn,"SELECT *  FROM customers");


if(isset($_POST['search']))
 {
	 $name=$_POST['name'];

	 $query= " SELECT * FROM `customers` where name='$name'"; 
	 $result = mysqli_query($conn,$query);

	 if($row = mysqli_fetch_array($result))
      {
            ?>
		    <form style="color:white;" action="" method="POST">
        
			  
			  Customer name&nbsp <input type="text" name="name" value="<?php echo $row['name']?>" disabled /><br>
			  Email ID &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="email"value="<?php echo $row['email']?>"  disabled/><br>
			  Balance &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <input type="text" name="balance"value="<?php echo $row['balance']?>" disabled /><br>
			  
			</form>  

 		  <?php
	  }
	  else
  {
    echo '<script> alert("No Such Patient") </script>';

  }
	
 } 
 ?>

        </center>    




	</body>
</html>
