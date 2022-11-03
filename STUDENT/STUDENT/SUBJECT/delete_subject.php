<?php
	session_start();
	include('../../../connection/connection.php'); 

	if(isset($_GET['subject_id'])){

    $grade_level = $_GET['grade_level'];
    $grade_id = $_GET['grade_id'];
  

		$sql = "DELETE FROM subject WHERE subj_id = '".$_GET['subject_id']."'";
		// $sql1 = "DELETE FROM grade WHERE grade_id = '".$_GET['grade_id']."'";
		// $sql2 = "DELETE FROM grade WHERE grade_id = '".$_GET['grade_id']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'deleted successfully';
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

	  header('location: subject.php?grade_id='.$grade_id.'&grade_level='.$grade_level);
?>