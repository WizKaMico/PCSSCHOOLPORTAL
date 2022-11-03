<?php
	session_start();
	$section_id = $_GET['section_id']; 
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
				<a href="print_pdf.php?section_id=<?php echo $section_id; ?>" class="btn btn-primary" style="background-color:#2c3e50; border-color:#2c3e50;"><span class="glyphicon glyphicon-print"></span> PRINT</a>
			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>LRN NO.</th>
						<th>FULLNAME</th>
						<th>EMAIL</th>
						<th>STATUS</th>
						<th>SECTION</th>
						<th>GRADE</th>
						<th>ACTION</th>
					</thead>
					<tbody>
						<?php
							include_once('../../../connection/connection.php');
							$sql = "SELECT * FROM student LEFT join section on student.sec_id = section.section_id LEFT JOIN grade ON section.grade_id = grade.grade_id WHERE student.sec_id = '$section_id'";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['stud_lrn']."</td>
									<td>".$row['fname']." ".$row['initial']." ".$row['lname']."</td>
								    <td>".$row['email']."</td>
								    <td>".$row['status']."</td>
								    <td>".$row['section_name']."</td>
									<td>".$row['grade_level']."</td>
									<td>
										
										<a href='#assign_".$row['user_id']."' class='btn btn-success btn-sm' data-toggle='modal' style='background-color:#2c3e50; border-color:#2c3e50;'><span class='glyphicon glyphicon-book'></span></a>
									    <a href='#qr_".$row['user_id']."' class='btn btn-success btn-sm' data-toggle='modal' style='background-color:#2c3e50; border-color:#2c3e50;'><span class='glyphicon glyphicon-qrcode'></span></a>
										<a href='assigned.php?user_id=".$row['user_id']."' class='btn btn-success btn-sm' data-toggle='modal' style='background-color:#2c3e50; border-color:#2c3e50;'><span class='glyphicon glyphicon-list-alt'></span></a>
									
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