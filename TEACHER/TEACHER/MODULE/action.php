<?php
session_start();
include_once('../../../connection/connection.php');
if(isset($_POST['bulk_update_submit'])){
    $idArr = $_POST['checked_id'];
    $status = 'UN-CLAIMED';
    $grade_level = $_POST['grade_level'];
    $section_id = $_POST['section_id'];
    foreach($idArr as $id){
        $sql = "SELECT * FROM student LEFT join section on student.sec_id = section.section_id LEFT JOIN grade ON section.grade_id = grade.grade_id WHERE student.sec_id = '$section_id'";
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
        $assigned_id = $row['user_id'];   
        mysqli_query($conn,"INSERT INTO assigned_module_student (module_id,assigned_id,status) VALUES ('$id','$assigned_id','$status')");
        }
    }
    $_SESSION['success_msg'] = 'Successful';
    header("Location:index.php?grade_level=".$grade_level."&section_id=".$section_id);
}
?>