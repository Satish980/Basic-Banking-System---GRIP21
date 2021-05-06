<!DOCTYPE html>
<html>
<head>
	<title>Spark Bank</title>
	<link rel="shortcut icon" href="logo.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
		include 'navbar.php';
	?>

</head>
<body>
	<center>
		<br>
		<h1>User Information</h1>
		<br>
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


	$sql = "SELECT * FROM Customers";
	
	$result = mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result)>0)
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

			while($row = mysqli_fetch_assoc($result)){
				$id = $row['Name'];
				echo "<tr>
						<td>".$row['ID']."</td>
						<td>".$row["Name"]."</td>
						<td>".$row["Email"]."</td>
						<td>".'$'.$row["Current_Balance"]."</td>
						<form action='user.php' method='post'>
						<td><Button type='submit' name='name' value=$id class='input'>View and Transact</Button></td>
						</form> 	
					  </tr>";
			}
			echo "</table></div></center>";
	}
	else
			echo "0 results";
	
	mysqli_close($conn);
?>