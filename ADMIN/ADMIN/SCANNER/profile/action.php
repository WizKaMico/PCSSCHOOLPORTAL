<?php
session_start();
include_once('../../../../connection/connection.php');
if(isset($_POST['bulk_delete_submit'])){
    $student_name = $_POST['student_name'];
    $choose = $_POST['choose'];
    $idArr = $_POST['checked_id'];
    foreach($idArr as $id){
        mysqli_query($conn,"UPDATE assigned_module_student SET status = '$choose' WHERE aid=".$id);
    }
    $_SESSION['success_msg'] = 'Module updated';
    header("Location:index.php?student_name=".$student_name);
}
?>