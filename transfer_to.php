<?php
	include 'navbar.php';
	session_start();
	$servername = "localhost";
	$user = "root";
	$password = "mypass";
	$name = "Bank_Database";
	$conn = mysqli_connect($servername,$user,$password,$name);
	$data = $_POST["name"];
	$sql = "SELECT Name FROM Customers WHERE NOT Name = '$data'";
	$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		
	.transfer{
		display:inline-block;
		background:transparent;
		padding:60px;
		margin-top: 100px;
		border:5px solid black;
	}
	select{
		width: 180px;
		height: 29px;
		color: solid green;
	}
	input{
		width: 180px;
		height: 25px;
		color: solid green
		margin-left: 100px;
	}
	label{
		color: solid black;
	}
	</style>
	<script type="text/javascript">
		function send() {
			// body...
			var a = document.getElementById("sender").value;
			var arr = ["Satish","Prasanth","Guru","Aravindh","Nikhil","Trinadh","Haswanth","Mahesh","Vamsi","Siva"];
			var index = arr.indexOf(a);
    		if (index > -1) 
        		arr.splice(index, 1);
        	var str = "";
        	for (var i = 0; i < arr.length; i++) 
        		str = str +"<option value="+arr[i]+">"+arr[i]+"</option>";
        	
        	document.getElementById("receiver").innerHTML = str;
		}
	</script>
</head>
<body>
	<center><br><br>
		<h1>Transfer Money From <?php echo $data ?></h1>
		<div class="transfer">
			<form method="post" action="updateamount.php">
				<label for="receiver" align="left"><b>Receiver Name: </b></label>&nbsp;&nbsp;&nbsp;
				<select id="receiver" name="receiver" required>
					<option  selected>Select Receiver</option>
				<?php
					while ($row = $result->fetch_assoc()) 
					{
						$uname1 = $row['Name'];
						echo "<option value=$uname1 name='name'>";
						echo $uname1;
						echo "</option>";
					}
				?>
				</select>
				<br><br>
				<label for="amount" align="left"><b>Amount:</b></label>
				<input type="number" min="1" name="transfer" placeholder="Enter Amount" required>&nbsp;&nbsp;
				<br><br><br>
				<?php echo "<button class='input' name='sender' value=$data>Transfer</button>";?>
			</form>
		</div>
	</center>

</body>
</html>