<?php
	session_start();
	$section_id = $_GET['section_id'];
	$user_id = $_GET['user_id'];
	include_once('../../../connection/connection.php');
	$result=mysqli_query($conn, "select * from teacher LEFT JOIN section ON teacher.sec_id = section.section_id LEFT JOIN grade ON section.grade_id = grade.grade_id where user_id='$user_id'")or die('Error In Session');
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
		<b>ADVISER : <?php echo strtoupper($row['fname']); echo ' '; echo strtoupper($row['lname']); ?></b><br>
		<b>SECTION & GRADE : <?php echo strtoupper($row['section_name']); echo ' '; echo strtoupper($row['grade_level']); ?></b>	
			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>LASTNAME</th>
						<th>FIRSTNAME</th>
						<th>MI</th>
						<th>EMAIL</th>
						<th>STATUS</th>
						<th>SECTION</th>
						<th>GRADE</th>
					</thead>
					<tbody>
						<?php
							include_once('../../../connection/connection.php');
							$sql = "SELECT * FROM student left join section ON student.sec_id = section.section_id LEFT JOIN grade ON section.grade_id = grade.grade_id WHERE section.section_id = '$section_id'";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['lname']."</td>
									<td>".$row['fname']."</td>
									<td>".$row['initial']."</td>
								    <td>".$row['email']."</td>
								    <td>".$row['status']."</td>";


								echo     
									"
					                <td>".$row['section_name']."</td>
					                <td>".$row['grade_level']."</td>
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