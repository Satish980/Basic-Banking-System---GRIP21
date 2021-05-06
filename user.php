<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
		include 'navbar.php';
	?>
	<?php
		$servername = "localhost";
		$user = "root";
		$password = "mypass";
		$name = "Bank_Database";
		$conn = mysqli_connect($servername,$user,$password,$name);

		$data = $_POST["name"];
		$sql = "SELECT * FROM Customers WHERE Name = '$data'";
		
		if(!mysqli_query($conn,$sql))
			die("Failed ".mysqli_error($conn));
		$row = mysqli_query($conn,$sql);
		$result = mysqli_fetch_array($row);
		$uname = $result["Name"];
		$id = $result["ID"];
		$email = $result["Email"];
		$balance = $result["Current_Balance"]
	?>	
</head>
<body>
	<center>
		<br>
		<h1>Details of <?php echo $uname ?></h1>
		<br><br><br>
		<table class="usertable" border="2">
			<tr>
				<th>ID</th>
				<td><?php echo $id?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?php echo $uname?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?php echo $email?></td>
			</tr>
			<tr>
				<th>Amount</th>
				<td><?php echo "$".$balance?></td>
			</tr>
		</table>
		<br><br><br>
		
		<div class="buttons">
			<form method="post" action="transfer_to.php">
			<?php 
			echo "<Button type='submit' name='name' value=$uname class='btn2' align='left'>Transfer</Button>";
			?>
		</form>
		&nbsp;&nbsp;
		<form method="post" action="ministatement.php">
			<?php 
			echo "<Button type='submit' name='name' value=$uname class='btn2' align='right'>Mini Statemet</Button>";
			?>
		</form>
		</div>
	</center>

	
</body>
</html>