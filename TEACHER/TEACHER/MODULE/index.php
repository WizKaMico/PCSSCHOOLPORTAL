<?php
	session_start();
	$grade_level = $_GET['grade_level'];
	$section_id = $_GET['section_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
	<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
function delete_confirm(){
	var result = confirm("Are you sure to add this to all students?");
	if(result){
		return true;
	}else{
		return false;
	}
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
	$('.checkbox').on('click',function(){
		if($('.checkbox:checked').length == $('.checkbox').length){
			$('#select_all').prop('checked',true);
		}else{
			$('#select_all').prop('checked',false);
		}
	});
});
</script>
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
			
			</div>
			<div class="height10">
			</div>
				     <form class="form-group" method="POST" action="#">
		     	<div class="col-sm-4" style="margin-left:-30px;">
		     	<select class="form-control" name="grade_id">
		     			<?php
							include_once('../../../connection/connection.php');
							$sql = "SELECT * FROM grade WHERE grade_level = '$grade_level'";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
						?>
		     		<option value="<?php echo $row['grade_id']; ?>"><?php echo $row['grade_level']; ?></option>
		     		<?php } ?>
		     	</select>
		     	</div>

		     	<div class="col-sm-4">
		<button type="submit" name="search" class="btn btn-success" style="background-color:#2c3e50; border-color:#2c3e50;"><span class="	glyphicon glyphicon-search"></span> SEARCH</button>
		<a href="index.php"  class="btn btn-success" style="background-color:#2c3e50; border-color:#2c3e50;"><span class="glyphicon glyphicon-refresh"></span> REFRESH</a>
		     	</div>
		     	
		     </form>


		     <?php 

		     if(isset($_POST['search'])){

		     $grade_id = $_POST['grade_id'];	
		     $result=mysqli_query($conn, "SELECT * FROM grade  WHERE grade_id = '$grade_id'")or die('Error In Session');
            $row=mysqli_fetch_array($result);
            echo '<br>';
            echo '<p style="margin-left:-15px;">SEARCHING FOR '; echo $row['grade_level']; echo '</p>';
        	echo '<a href="#add" style="margin-left:-15px;" data-toggle="modal" class="btn btn-primary" style="background-color:#2c3e50; border-color:#2c3e50;"><span class="glyphicon glyphicon-plus"></span> ASSIGN WEEK</a>';
             ?>

             <br>
             <br>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th>MODULE</th>
						<th>WEEK</th>
						<th>QUARTER</th>
						<th>GRADE</th>
						<th>SUBJECT</th>
						<th>DATE CREATED</th>
			
					</thead>
					<tbody>
						<?php
							include_once('../../../connection/connection.php');
							$sql = "SELECT * FROM module_list LEFT JOIN subject ON module_list.subj_id = subject.subj_id LEFT JOIN grade ON subject.grade_level = grade.grade_id WHERE grade.grade_id = '$grade_id'";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
								
									<td>".$row['mod_name']."</td>
							        <td>".$row['week_no']."</td>
							        <td>".$row['quarter_no']."</td>
							        <td>".$row['grade_level']."</td>
							        <td>".$row['subj_name']."</td>
							        <td>".$row['date_created']."</td>
								
								</tr>";
								include('edit_delete_modal.php');
							}
					

						?>
					</tbody>
				</table>
			</div>
		<?php }else{ ?>

             <br>
             <br>
			<div class="row">
				<?php 
				if(!empty($_SESSION['success_msg'])) {
				    ?>

				<div class="alert alert-success"><?php echo $_SESSION['success_msg'];
				    ?>
				</div>
				<?php unset($_SESSION['success_msg']); } ?>
				<?php
				$query = mysqli_query($conn,"SELECT * FROM module_list LEFT JOIN subject ON module_list.subj_id = subject.subj_id LEFT JOIN grade ON subject.grade_level = grade.grade_id WHERE grade.grade_level = '$grade_level'");
				?>
				<form name="bulk_action_form" action="action.php" method="post" onSubmit="return delete_confirm();"/>
				<br>
				<input type="hidden" name="grade_level" value="<?php echo $grade_level; ?>">
				<input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
				<input type="submit" class="btn btn-success" name="bulk_update_submit" value="ASSIGN TO ALL STUDENT" style="width:30%;" />
				<br>
				<br>
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						 <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>  
						<th>MODULE</th>
						<th>WEEK</th>
						<th>QUARTER</th>
						<th>GRADE</th>
						<th>SUBJECT</th>
						<th>DATE CREATED</th>
						
					</thead>
					<tbody>
					


						    <?php
				            if(mysqli_num_rows($query) > 0){
				                while($row = mysqli_fetch_assoc($query)){
				        ?>
				        <tr>
				            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>        
				            <td><?php echo $row['mod_name']; ?></td>
				            <td><?php echo $row['week_no']; ?></td>
				            <td><?php echo $row['quarter_no']; ?></td>
				            <td><?php echo $row['grade_level']; ?></td>
				            <td><?php echo $row['subj_name']; ?></td>
				            <td><?php echo $row['date_created']; ?></td>
				        </tr> 
				        <?php } }else{ ?>
				            <tr><td colspan="5">No records found.</td></tr> 
				        <?php } ?>
					</tbody>
				</table>
				</form>
			</div>

		<?php } ?>	
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