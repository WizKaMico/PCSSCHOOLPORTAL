<?php
	session_start();
	include_once('../../../connection/connection.php');
 
	if(isset($_POST['add'])){
		$mod_name = $_POST['mod_name'];
		$week_no = $_POST['week_no']; 
		$quarter_no = $_POST['quarter_no']; 
		$subj_id = $_POST['subj_id']; 
		date_default_timezone_set('Asia/Manila');
		$date_created = date('Y-m-d');
		$sql = "INSERT INTO module_list (mod_name, week_no, quarter_no, subj_id, date_created) VALUES ('$mod_name', '$week_no', '$quarter_no', '$subj_id', '$date_created')";
 
		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'added successfully';
		}
		///////////////
 
		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member added successfully';
		// }
		//////////////
 
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
 
	header('location: index.php');
?>