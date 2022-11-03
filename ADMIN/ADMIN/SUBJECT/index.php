<?php
	session_start();
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
				<a href="#addnew" data-toggle="modal" class="btn btn-primary" style="background-color:#2c3e50; border-color:#2c3e50;"><span class="glyphicon glyphicon-plus"></span> STEP 1: ADD GRADE</a>
				<a href="#addsection" data-toggle="modal" class="btn btn-primary" style="background-color:#2c3e50; border-color:#2c3e50;"><span class="glyphicon glyphicon-plus"></span> STEP 2: ADD SECTION</a>
				<a href="#addsubject" data-toggle="modal" class="btn btn-primary" style="background-color:#2c3e50; border-color:#2c3e50;"><span class="glyphicon glyphicon-plus"></span> STEP 3: ADD SUBJECT</a>
			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>ID.</th>
						<th>GRADE LEVEL</th>
						<th>ACTION</th>
					</thead>
					<tbody>
						<?php
							include_once('../../../connection/connection.php');
							$sql = "SELECT * FROM grade";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['grade_id']."</td>
									<td>".$row['grade_level']."</td>
									<td>
										<a href='#edit_".$row['grade_id']."' class='btn btn-success btn-sm' data-toggle='modal' style='background-color:#2c3e50; border-color:#2c3e50;'><span class='glyphicon glyphicon-edit'></span></a>
										<a href='section.php?grade_id=".$row['grade_id']."&grade_level=".$row['grade_level']."' class='btn btn-success btn-sm' style='background-color:#2c3e50; border-color:#2c3e50;'><span class='glyphicon glyphicon-list-alt'></span></a>
										<a href='#delete_".$row['grade_id']."' class='btn btn-success btn-sm' data-toggle='modal' style='background-color:#2c3e50; border-color:#2c3e50;'><span class='glyphicon glyphicon-trash'></span></a>
									
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