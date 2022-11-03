<?php
	session_start();
	$grade_id = $_GET['grade_id'];
	$grade_level = $_GET['grade_level'];
	$section_name = $_GET['section'];

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
			<b><h5><a href="index.php"><?php echo strtoupper($grade_level); ?></a> >> <a href="section.php?grade_id=<?php echo $grade_id; ?>&grade_level=<?php echo $grade_level; ?>"><?php echo 'SECTION' ?></a> >> <u><a href="subject.php?grade_id=<?php echo $grade_id; ?>&grade_level=<?php echo $grade_level; ?>&section=<?php echo $section; ?>">SUBJECTS</a></u> </h5></b>
			<div class="row">
			
			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>ID.</th>
						<th>SUBJECT NAME</th>
						<th>SUBJECT CODE</th>
						<th>GRADE LEVEL</th>
						<th>ACTION</th>
					</thead>
					<tbody>
						<?php
							include_once('../../../connection/connection.php');
							$sql = "SELECT * FROM subject LEFT JOIN grade ON subject.grade_level = grade.grade_id WHERE grade.grade_id = '$grade_id'";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['subj_id']."</td>
									<td>".$row['subj_name']."</td>
									<td>".$row['subj_code']."</td>
									<td>".$row['grade_level']."</td>
									<td>
									
										<a href='module.php?grade_id=".$row['grade_id']."&grade_level=".$row['grade_level']."&section=".$section_name."' class='btn btn-success btn-sm' style='background-color:#2c3e50; border-color:#2c3e50;'><span class='glyphicon glyphicon-folder-open'></span></a>

										
									
									</td>
								</tr>";
								include('edit_delete_subject.php');
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