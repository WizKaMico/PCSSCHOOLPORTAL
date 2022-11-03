<?php
	include_once('../../connection/connection.php');
	if(ISSET($_POST['edit'])){
		$id = $_POST['id'];
		$image_name = $_FILES['photo']['name'];
		$image_temp = $_FILES['photo']['tmp_name'];
		$previous = $_POST['previous'];
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		if(!is_dir("./upload"))
			mkdir("upload");
		$path = "upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png");
		if(in_array($end, $allowed_ext)){
			if(unlink($previous)){
				if(move_uploaded_file($image_temp, $path)){
					mysqli_query($con, "UPDATE `event` set `photo` = '$path' WHERE `id` = '$id'") or die(mysqli_error());
				$_SESSION['success'] = 'updated successfully';
					
				}
			}		
		}else{
			$_SESSION['error'] = 'Something went wrong in updating';
		}
		header("location: index.php");
	}
?>