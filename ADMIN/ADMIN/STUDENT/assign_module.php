<?php
	session_start();
	include('../../../connection/connection.php'); 

	if(isset($_POST['add'])){
		$user_id = $_POST['user_id']; 
		$module_id = $_POST['module_id'];
		$status = 'UNCLAIMED';   
		$sql = "INSERT INTO assigned_module_student (module_id, assigned_id, status) VALUES ('$module_id', '$user_id', '$status')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'added successfully';
		}
		////////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member deleted successfully';
		// }
		/////////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to delete first';
	}

	header('location: index.php');
?>