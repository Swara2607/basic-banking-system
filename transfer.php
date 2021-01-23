
<!DOCTYPE html>
<html>
<head>
	<title>Transfer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style1.css">
	<link rel="stylesheet" href="style.css">
	<link rel='icon' type='image/jpg' href='logo1.jpg' />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
          <li class="active"><a href="transfer.php">Transfer</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="checkdetails.php"><span class="glyphicon glyphicon-user"></span> View Customers Details</a></li>
          <li><a href="transferhistory.php"><span class="glyphicon glyphicon-log-in"></span> Transfer History</a></li>
        </ul>
      </div>
    </nav> 
</div>
</div>  
<div class ='form'> 
	<h1 align ='center'> Transfer Money </h1>
</div> 
<div class='main'>
<form action="" method="GET" class = "form">
		<select  class= fromuser type="text"  name="u1" required value="">
		<option value ="">From User</option> 
		<?php
                        while($tname = mysqli_fetch_array($var1)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>

		</select>
		&nbsp
		<select  class =touser  type="text" name="u2" value="">
	     <option value ="">To User</option>
		<?php
                        while($tname = mysqli_fetch_array($var2)) {
                            echo "<option value='" . $tname['name'] . "'>" . $tname['name'] . "</option>";
                        }
                ?>

		</select>
		&nbsp
		
		<input type="text" id="amount" name="amt" placeholder="Enter amount">
		
		<input style="background-color:black;" type="submit" id= submit name="submit" value=" Transfer">
		
	</form>
</div>


	<?php
	
			if($_GET['submit'])
			{
			$u1=$_GET['u1'];
			$u2=$_GET['u2'];
			$amt=$_GET['amt'];


			if($u1!="" && $u2!="" && $amt!="")
			{
				//update transaction changes in database
				$query1= "UPDATE customers  SET balance = balance + '$amt' WHERE Name = '$u2' ";
				$data1= mysqli_query($conn, $query1);
				$query2= "UPDATE customers SET balance = balance  - '$amt' WHERE Name = '$u1' ";
				$data2= mysqli_query($conn, $query2);
				
				//insert into transaction_history
				    $query1 = "INSERT INTO transfers (from_user,to_user,balance) VALUES('$u1','$u2','$amt')";
                                    $res2 = mysqli_query($conn,$query1);
				
                                          if($res2){
		                           	 $user1 = "SELECT * FROM customers WHERE  Name='$u1' ";
                                                 $res=mysqli_query($conn,$user1);
                                                 $row_count=mysqli_num_rows($res);
			                      }
				
            

				     if ($data1 && $data2)
				     {
					$message="Successful transfer";
                                        echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}
				else
				{
					$message="Error While Commiting Transaction ";
					echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}

			}

			else
			{
				$message="All Fields are Mandatory";
				echo "<script type='text/javascript'>alert('$message');
                    </script>";
			}
		}
		

	?>
</div>	


</body>
</html>