<?php
	session_start();
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
	var result = confirm("Are you sure to delete users?");
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
				<a href="#addnew" data-toggle="modal" class="btn btn-primary" style="background-color:#2c3e50; border-color:#2c3e50;"><span class="glyphicon glyphicon-plus"></span> ADD MODULE</a>
			</div>
			<div class="height10">
			</div>
				     <form class="form-group" method="POST" action="#">
		     	<div class="col-sm-4" style="margin-left:-30px;">
		     	<select class="form-control" name="grade_id">
		     			<?php
							include_once('../../../connection/connection.php');
							$sql = "SELECT * FROM grade";

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

		     if(!empty($_POST['grade_id'])){	
		     $grade_id = $_POST['grade_id'];	

		     $result=mysqli_query($conn, "SELECT * FROM grade  WHERE grade_id = '$grade_id'")or die('Error In Session');
            $row=mysqli_fetch_array($result);
            echo '<br>';
            echo '<p style="margin-left:-15px;">SEARCHING FOR '; echo $row['grade_level']; echo '</p>';
             }else{

             }
        	
             ?>

             <br>
             <br>
			<div class="row">
	
	        <?	if(!empty($_SESSION['success_msg'])) { ?>

			<div class="alert alert-success">
			</div>
			<?php unset($_SESSION['success_msg']); } ?>
			<?php
			if(!empty($_POST['grade_id'])){	
			include_once('../../../connection/connection.php');
			$query = mysqli_query($conn,"SELECT * FROM module_list LEFT JOIN subject ON module_list.subj_id = subject.subj_id LEFT JOIN grade ON subject.grade_level = grade.grade_id WHERE grade.grade_id = '$grade_id'");
			}else{
			include_once('../../../connection/connection.php');
			$query = mysqli_query($conn,"SELECT * FROM module_list LEFT JOIN subject ON module_list.subj_id = subject.subj_id LEFT JOIN grade ON subject.grade_level = grade.grade_id");	
			}
			?>
			<form name="bulk_action_form" action="action.php" method="post" onSubmit="return delete_confirm();"/>
				<input type="hidden" name="grade_level" value="<?php echo $grade_id; ?>">
				<br>
				<br>
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
						<th>ACTION</th>
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
			            <?php 
			            echo "<td>
										<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal' style='background-color:#2c3e50; border-color:#2c3e50;'><span class='glyphicon glyphicon-edit'></span></a>
										<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal' style='background-color:#2c3e50; border-color:#2c3e50;'><span class='glyphicon glyphicon-trash'></span></a>
							  </td>";
			            ?>
			        </tr> 
			        <?php include('edit_delete_modal.php'); ?>
			        <?php } }else{ ?>
			            <tr><td colspan="5">No records found.</td></tr> 
			        <?php } ?>
					</tbody>
				</table>
			</form>
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