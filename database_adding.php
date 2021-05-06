<!DOCTYPE html>
<html>
<head>
	<title>Spark Bank</title>
	<link rel="shortcut icon" href="logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<style type="text/css">
		.view{}
		#customers{
			text-align: center;
			
			width: 70%;
			font-weight: bold;
			background-color: transparent;
			font-family: sans-serif;
		}
		tr{
			height: 50px;
		}
		
		tr:hover{
			background-color: #f5f5f5;

		}
		th {
  			background-color: gray;
  			color: white;
		}
		input{
			color: black;
			border-radius: 2px;
			border-spacing: 3px;
			padding: 7px;
			background-color: transparent;
			font-weight: bold;
			border-radius: 5px;
			transition-duration: 0.3s;

		}
		input:hover{
			background-color: #000 ;
			color: white;
			border-radius: 10px;
		}
	</style>

</head>
<body>
	<center>
		<h1>User Information</h1>
	</center>
	
</body>
</html>
<?php
	//Make a MySQL Connection
	$servername = "localhost";
	$user = "root";
	$password = "mypass";
	$name = "Bank_Database";
	$conn = mysqli_connect($servername,$user,$password,$name);
	if(!$conn)
		die("Connection_Error".mysqli_connect_erro());
	$sql_create = "create database Bank_Database";

	
	/*if(mysqli_query($conn,$sql_create))
		echo "database";
	else
		echo "error: ".mysqli_error($conn);*/


	/*$sql_table1 = "create table Customers(
	ID INT(6) unsigned auto_increment primary key,
	Name varchar(50) not null,
	Email varchar(50) not null,
	Current_Balance DOUBLE(10,3))";

	$sql_table2 = "create table Transfers(
	Sender varchar(50) not null,
	Receier varchar(50) not null,
	Amount double(10,3))";*
	$sql_table1_insert = "insert into Customers(ID,Name,Email,Current_Balance)
	values
		(1,'Satish','s160980@rguktsklm.ac.in',456.98),
		(2,'Prasanth','s160106@rguktsklm.ac.in',356.98),
		(3,'Guru','s160552@rguktsklm.ac.in',256.98),
		(4,'Aravindh','s160755@rguktsklm.ac.in',156.98),
		(5,'Nikhil','s160666@rguktsklm.ac.in',556.98),
		(6,'Trinadh','s160777@rguktsklm.ac.in',656.98),
		(7,'Hasawanth','s160888@rguktsklm.ac.in',756.98),
		(8,'Mahesh','s160981@rguktsklm.ac.in',856.98),
		(9,'Vamsi','s161124@rguktsklm.ac.in',956.98),
		(10,'Siva','s160944@rguktsklm.ac.in',356.98);";

	$sql_table2_insert = "insert into Transfers(Sender,Receier,Amount)
	values
		('Prasanth','Satish',98),
		('Guru','Trinadh',87);";*/
	$sqlq = "Update Customers
			 SET Name='Haswanth'
			 Where Name='Hasawanth'";
	if(mysqli_query($conn,$sqlq))
	{
		//if(mysqli_query($conn,$sql_table2))
		echo "database";
		//else
		//echo "error: ".mysqli_error($conn);
	}
	else
		echo "error: ".mysqli_error($conn);
	/*if(mysqli_num_rows($result)>0)
	{
			echo "<center><div>";

			echo "<table id='customers' class=table table-stripped>";
			echo "<thead class = 'thead-dark'>";
			echo "<th>ID</th>";
			echo "<th>Name</th>";
			echo "<th>Email</th>";
			echo "<th>Amount</th>";
			echo "<th>View Data</th>";
			echo "</thead>";
			while($row = mysqli_fetch_assoc($result))
				echo "<tr>
						<td>".$row['ID']."</td>
						<td>".$row["Name"]."</td>
						<td>".$row["Email"]."</td>
						<td>".'$'.$row["Current_Balance"]."</td>
						<td><input type='submit' value='View and Transact' ></td>	
					  </tr>";
			echo "</table></div></center>";
	}
	else
			echo "0 results";*/
	
	mysqli_close($conn);
?>