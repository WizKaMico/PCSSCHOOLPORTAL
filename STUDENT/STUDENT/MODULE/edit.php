<?php
	session_start();
	include_once('../../../connection/connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$mod_name = $_POST['mod_name'];
		$week_no = $_POST['week_no']; 
		$quarter_no = $_POST['quarter_no']; 
		$subj_id = $_POST['subj_id']; 
		$sql = "UPDATE module_list SET mod_name = '$mod_name', week_no = '$week_no', quarter_no = '$quarter_no', subj_id = '$subj_id'  WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'updated successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Member updated successfully';
		// }
		///////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to edit first';
	}

	header('location: index.php');

?>