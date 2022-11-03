<?php

include('../../../../connection/connection.php');

if(isset($_POST['edit'])){
    
      $id = mysqli_real_escape_string($conn, $_POST['id']);
      $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
      $subject_id = mysqli_real_escape_string($conn, $_POST['subject_id']);
      $status = mysqli_real_escape_string($conn, $_POST['status']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);

    
  

		
          mysqli_query($conn,"UPDATE subject_status SET status = '$status' WHERE id = '$id'");  

         
        header('location: index.php?student_name='.$email);
 
				

   }

  
