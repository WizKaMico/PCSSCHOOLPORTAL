


<?php
  session_start();
    include_once('../../../connection/connection.php');
 
  if(isset($_POST['edit'])){
    
    $grade_id = $_POST['grade_id'];
    $grade_level = $_POST['grade_level'];
  

       $sql1 = "UPDATE grade SET grade_level = '$grade_level' WHERE grade_id = '$grade_id'";
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
 
  header('location: index.php');
?>