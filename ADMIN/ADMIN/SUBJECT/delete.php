<?php
	session_start();
	include('../../../connection/connection.php'); 

	if(isset($_GET['grade_id'])){
		$sql = "DELETE FROM grade WHERE grade_id = '".$_GET['grade_id']."'";
		// $sql1 = "DELETE FROM grade WHERE grade_id = '".$_GET['grade_id']."'";
		// $sql2 = "DELETE FROM grade WHERE grade_id = '".$_GET['grade_id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member deleted successfully';
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