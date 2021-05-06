<?php
	include 'navbar.php';
	session_start();
	$servername = "localhost";
	$user = "root";
	$password = "mypass";
	$name = "Bank_Database";
	$conn = mysqli_connect($servername,$user,$password,$name);
	$user = $_POST["name"];
	$sql = "SELECT Sender,Amount FROM Transfers WHERE Receiver = '$user'";
	$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<center>
		<br>
		<h1>Ministatement of <?php echo $user ?></h1>
		<br><br><br>
		<table class="usertable" border="2">
			<tr>
				<th>Sender</th>
				<th>Amount</td>
			</tr>
			<?php while($row = $result->fetch_assoc()) { ?>
			
			<tr>
				<td><?php echo $row["Sender"]; ?></td>
				<td><?php echo "$ ".$row["Amount"]; ?></td>
			</tr>
			<?php } ?>
		</table>
		<br><br><br>
</body>
</html>