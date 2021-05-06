<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="shortcut icon" href="logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		include 'navbar.php';
	?>
	<center>
		<br>
		<h1>Transanctions Information</h1>
		<br><br>
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
	

	$sql = "SELECT * FROM transfers";
	$result = mysqli_query($conn,$sql);
	
	if($result)
	{
		if(mysqli_num_rows($result)>0)
		{
					echo "<center><div>";
					echo "<table id='customers' class=table table-stripped>";
					echo "<thead class = 'thead-dark'>";
					echo "<th>ID</th>";
					echo "<th>Sender</th>";
					echo "<th>Receiver</th>";
					echo "<th>Amount</th>";
					//echo "<th>View Data</th>";
					echo "</thead>";
					$i = 0;
					while($row = mysqli_fetch_assoc($result))
						echo "<tr>
								<td>".++$i."</td>
								<td>".$row["Sender"]."</td>
								<td>".$row["Receiver"]."</td>
								<td>".'$'.$row["Amount"]."</td>	
							  </tr>";
					echo "</table></div></center>";
			}
		else
				echo "0 results";
	}
	else
		echo "Error: ".$sql."<br>".mysqli_error($conn);
	
	mysqli_close($conn);
?>