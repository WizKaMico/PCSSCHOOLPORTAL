


<?php
  session_start();
    include_once('../../../connection/connection.php');
 
  if(isset($_POST['edit'])){
    
    $section_id = $_POST['section_id'];
    $grade_level = $_POST['grade_level'];
    $grade_id = $_POST['grade_id'];
    $section_name = $_POST['section_name'];
  

       $sql1 = "UPDATE section SET section_name = '$section_name', grade_id = '$grade_id' WHERE section_id = '$section_id'";
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
 
  header('location: section.php?grade_id='.$grade_id.'&grade_level='.$grade_level);
?>