<?php 


$email = $_GET['student_name']; 
include('../../../../connection/connection.php');
 
$result=mysqli_query($conn, "SELECT * FROM student LEFT JOIN section ON student.sec_id = section.section_id LEFT JOIN grade ON section.grade_id = grade.grade_id where student.email= '$email'");
$row=mysqli_fetch_array($result);

 
$checkTotal=mysqli_query($conn, "SELECT *,COUNT(aid) as TOTAL FROM assigned_module_student WHERE assigned_id = '".$row['user_id']."'");
$prow=mysqli_fetch_array($checkTotal);


$check=mysqli_query($conn, "SELECT *,COUNT(aid) as TOTAL FROM assigned_module_student WHERE status = 'CLAIMED' AND assigned_id = '".$row['user_id']."'");
$claimedrow=mysqli_fetch_array($check);

$checku=mysqli_query($conn, "SELECT *,COUNT(aid) as TOTAL FROM assigned_module_student WHERE status = 'UNCLAIMED' or status = ' ' AND assigned_id = '".$row['user_id']."'");
$unclaimedrow=mysqli_fetch_array($checku);


$checkr=mysqli_query($conn, "SELECT *,COUNT(aid) as TOTAL FROM assigned_module_student WHERE status = 'RETURN' AND assigned_id = '".$row['user_id']."'");
$returnedrow=mysqli_fetch_array($checkr);


$unclaim = $unclaimedrow['TOTAL'];
$claim = $claimedrow['TOTAL'];
$total = $prow['TOTAL']; 
$return = $returnedrow['TOTAL'];


$value = ($return / 36);
$rvalue = ($value * 100); 


?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="./style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
function delete_confirm(){
	var result = confirm("Are you sure to update selected module?");
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

</head>
<body>
<!-- partial:index.partial.html -->
<div class="card" style="margin-left:-22px; margin-top:-20px;">
		<header class="card__gallery">
			<div class="card__gallery-item card__gallery-item__main" style="background-color:white;">
				<img src="../../../../DIST/CAROUSEL/1.png" alt="" style="background-color:white;">
			</div>
			<div class="card__gallery-item">
				<img src="../../../../DIST/CAROUSEL/2.png"
					alt="" style="background-color:white;">
			</div>
			<div class="card__gallery-item">
				<img src="../../../../DIST/CAROUSEL/3.png" alt="" style="background-color:white;">
			</div>
			<div class="card__gallery-item">
				<img src="../../../../DIST/CAROUSEL/4.png" alt="" style="background-color:white;">
			</div>
			<div class="card__gallery-item">
				<img src="../../../../DIST/CAROUSEL/5.png" alt="" style="background-color:white;">
			</div>
		</header>
		<main class="card__user">
			<img src="../../../../DIST/LOGO/logo.png" alt="" class="card__user-image" style="background-color:green;">
			<div class="card__user-info">
				<h2 class="card__user-info__name"><?php echo strtoupper($row['fname']); echo ' '; echo strtoupper($row['lname']); ?></h2>
				<p class="card__user-info__stats"><?php echo strtoupper($row['email']); ?></p>
			</div>
			<div class="card__user-actions">
				<button class="card__user-actions-follow"><?php echo strtoupper($row['section_name']); ?></button>
				<button class="card__user-actions-message">#<?php echo strtoupper($row['grade_level']); ?></button>
			</div>
		</main>
 
 <?php if($return == $total){ ?>
   <div class="w3-light-grey" style="margin-bottom:100px;">
    <div class="w3-container w3-green" style="width:100%">COMPLETED : <?php echo  $return; ?>/<?php echo $total; ?></div>
  </div>
<?php } else { ?>

  <div class="w3-light-grey" style="margin-bottom:<?php echo $total; ?>px;">
    <div class="w3-container w3-green" style="width:<?php echo  $rvalue; ?>%"><?php echo $rvalue; ?></div>
  </div>
<?php } ?>	

<?php session_start();
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-success"><?php echo $_SESSION['success_msg'];
    ?>
</div>
<?php unset($_SESSION['success_msg']); } ?>
<?php
$query = mysqli_query($conn,"SELECT * FROM assigned_module_student LEFT JOIN module_list ON assigned_module_student.module_id = module_list.id LEFT JOIN subject ON module_list.subj_id = subject.subj_id WHERE assigned_module_student.assigned_id = '".$row['user_id']."'");
?>
<form name="bulk_action_form" action="action.php" method="post" onSubmit="return delete_confirm();"/>
<select class="form-control" name="choose">
	 <option value="UN-CLAIMED">UN-CLAIMED</option>
	 <option value="CLAIMED">CLAIMED</option>
	 <option value="RETURN">RETURN</option>
</select>
<br>
<input type="hidden" name="student_name" value="<?php echo $email; ?>">
<input type="submit" class="btn btn-success" name="bulk_delete_submit" value="UPDATE" style="width:100%;" />
<br>

		<table id="myTable" class="table table-bordered table-striped">
					<thead>
					  <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>
						<th>CODE</th>
						<th>MODULE</th>
						<th>WEEK NO</th>
						<th>QUARTER NO</th>
						<th>STATUS</th>
				
					</thead>
					<tbody>
			


				<?php
         if(mysqli_num_rows($query) > 0){
         while($row = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['aid']; ?>"/></td>        
            <td><?php echo $row['subj_code']; ?></td>
            <td><?php echo $row['mod_name']; ?></td>
            <td><?php echo $row['week_no']; ?></td>
            <td><?php echo $row['quarter_no']; ?></td>
            <td><?php echo $row['status']; ?></td>
        </tr> 
        <?php } }else{ ?>
            <tr><td colspan="5">No records found.</td></tr> 
        <?php } ?>
					</tbody>
				</table>
	</form>			
    


	</div>
<!-- partial -->
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



