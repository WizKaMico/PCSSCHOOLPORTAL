


<?php
  session_start();
    include_once('../../../connection/connection.php');
 
  if(isset($_POST['add'])){
    
 
    $section_name = $_POST['section_name'];
    $grade_id = $_POST['grade_id'];
  

       $sql1 = "INSERT INTO section (section_name, grade_id) VALUES ('$section_name', '$grade_id')";
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