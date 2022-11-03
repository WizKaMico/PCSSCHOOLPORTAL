


<?php
  session_start();
    include_once('../../../connection/connection.php');
 
  if(isset($_POST['add'])){
    
 
    $subj_name = $_POST['subj_name'];
    $grade_id = $_POST['grade_id'];
    $subj_code = rand(666666,999999);
    $grade_level = $_POST['grade_level'];
  

       $sql1 = "INSERT INTO subject (subj_name, subj_code, grade_level) VALUES ('$subj_name', '$subj_code', '$grade_id')";
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