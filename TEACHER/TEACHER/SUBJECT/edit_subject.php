


<?php
  session_start();
    include_once('../../../connection/connection.php');
 
  if(isset($_POST['edit'])){
    
    $subj_id = $_POST['subj_id'];
    $grade_level = $_POST['grade_level'];
    $grade_id = $_POST['grade_id'];
    $subj_name = $_POST['subj_name'];
  

       $sql1 = "UPDATE subject SET subj_name = '$subj_name', grade_level = '$grade_id' WHERE subj_id = '$subj_id'";
    //use for MySQLi OOP
    if($conn->query($sql1)){
      $_SESSION['success'] = 'added successfully';
    }
    ///////////////
 
    //use for MySQLi Procedural
    // if(mysqli_query($conn, $sql)){
    //  $_SESSION['success'] = 'Member added successfully';
    // }
    //////////////
 
    else{
      $_SESSION['error'] = 'Something went wrong while adding';
    }
  }
  else{
    $_SESSION['error'] = 'Fill up add form first';
  }
 
  header('location: subject.php?grade_id='.$grade_id.'&grade_level='.$grade_level);
?>