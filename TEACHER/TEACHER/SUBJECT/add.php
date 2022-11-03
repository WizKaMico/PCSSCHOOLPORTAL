


<?php
  session_start();
    include_once('../../../connection/connection.php');
 
  if(isset($_POST['add'])){
    
    $grade_level = $_POST['grade_level'];
  

       $sql1 = "INSERT INTO grade (grade_level) VALUES ('$grade_level')";
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