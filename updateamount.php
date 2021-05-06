<?php
	session_start();
	$servername = "localhost";
	$user = "root";
	$password = "mypass";
	$name = "Bank_Database";
	$conn = mysqli_connect($servername,$user,$password,$name);
	$sender = $_POST["sender"];
	$receiver = $_POST["receiver"];
	//sender money
	$sql = "SELECT Current_Balance FROM Customers WHERE Name = '$sender'";
	if(!mysqli_query($conn,$sql))
	{
		echo "<script type='text/javascript'>alert('Data Invalid')</script>";
		die("");
	}
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$amount_of_sender = $row["Current_Balance"];
	//receiver money
	$sql2 = "SELECT Current_Balance FROM Customers WHERE Name = '$receiver'";
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$amount_of_receiver = $row["Current_Balance"];
	session_destroy();
	$amount = $_POST["transfer"];
	if($amount_of_sender >= $amount)
	{
		$sender_amount = $amount_of_sender - $amount;
		$sql = "update Customers set Current_Balance = $sender_amount where name='$sender'";
		$result = mysqli_query($conn,$sql);

		$receiver_amount = $amount_of_receiver + $amount;
		$sql = "update Customers set Current_Balance = $receiver_amount where name='$receiver'";
		$result = mysqli_query($conn,$sql);

		$sql = "insert into transfers(Sender,Receiver,Amount) values('$sender','$receiver',$amount)";
		$result = mysqli_query($conn,$sql);

		$msg = "Transaction Successful";
		echo "<script type='text/javascript'>alert('$msg')</script>";

		include 'usersinfo.php';
	}
	else
	{
		$msg = "Insufficient Balance";
		echo "<script type='text/javascript'>alert('$msg')</script>";
		include 'usersinfo.php';
	}
?>