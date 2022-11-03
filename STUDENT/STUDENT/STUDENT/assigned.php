<?php
	session_start();
	$user_id = $_GET['user_id'];
	include_once('../../../connection/connection.php');
	$result=mysqli_query($conn, "select * from student LEFT JOIN section ON student.sec_id = section.section_id LEFT JOIN grade ON section.grade_id = grade.grade_id where student.user_id='$user_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
	<style>
		.height10{
			height:10px;
		}
		.mtop10{
			margin-top:10px;
		}
		.modal-label{
			position:relative;
			top:7px
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
			<div class="row">
		<b>STUDENT NAME : <?php echo strtoupper($row['fname']); echo ' '; echo strtoupper($row['lname']); ?></b><br>
		<b>LRN : <?php echo strtoupper($row['stud_lrn']); ?></b><br>
		<b>SECTION & GRADE : <?php echo strtoupper($row['section_name']); echo ' '; echo strtoupper($row['grade_level']); ?></b>	
			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>SUBJECT NAME</th>
						<th>SUBJECT CODE</th>
						<th>GRADE</th>
						<th>ACTION</th>
					</thead>
					<tbody>
						<?php
							include_once('../../../connection/connection.php');
							$sql = "SELECT * FROM subject LEFT JOIN grade ON subject.grade_level = grade.grade_id WHERE grade.grade_id = '".$row['grade_id']."'";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									
									<td>".$row['subj_name']."</td>
									<td>".$row['subj_code']."</td>
									<td>".$row['grade_level']."</td>";


								echo     
									"
									<td>
										<a href='module.php?subj_id=".$row['subj_id']."&user_id=".$user_id."' class='btn btn-success btn-sm' style='background-color:#2c3e50; border-color:#2c3e50;'><span class='glyphicon glyphicon-book'></span></a>
										
									</td>
								</tr>";
								include('edit_delete_modal.php');
							}
					

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include('add_modal.php') ?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>
</body>
</html>