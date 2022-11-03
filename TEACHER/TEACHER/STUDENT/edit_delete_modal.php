<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">EDIT : <?PHP echo strtoupper($row['fname']); ?></h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php">
				<input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>">
				<input type="hidden" class="form-control" name="code" value="<?php echo $row['code']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">LRN No.:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="stud_lrn" value="<?php echo $row['stud_lrn']; ?>" required="" readonly="">
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Email:</label>
					</div>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Firstname:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fname" value="<?php echo $row['fname']; ?>" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Lastname:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="lname" value="<?php echo $row['lname']; ?>" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">MI:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="initial" value="<?php echo $row['initial']; ?>" required>
					</div>
				</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">YR/SEC:</label>
					</div>
					<div class="col-sm-10">
						<select class="form-control" name="sec_id">
							<option value="<?php echo $row['sec_id']; ?>"><?php echo $row['grade_level']; ?> | <?php echo $row['section_name']; ?> (CURRENTLY)</option>
							<?php
							include_once('../../../connection/connection.php');
							$sqlier = "SELECT * FROM section left join grade ON section.grade_id = grade.grade_id";

							//use for MySQLi-OOP
							$querieto = $conn->query($sqlier);
							while($xrow = $querieto->fetch_assoc()){
							?>	
							<option value="<?php echo $xrow['section_id']; ?>"><?php echo $xrow['grade_level']; ?> | <?php echo $xrow['section_name']; ?></option>
						    <?php } ?>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">STATUS:</label>
					</div>
					<div class="col-sm-10">
						<select class="form-control" name="status">
							<option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?> (CURRENT)</option>
							<option value="VALID">VALID</option>
							<option value="ARCHIVE">ARCHIVE</option>
							<option value="LOCKED">LOCKED</option>
						</select>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success" style="background-color:#421714; border-color:#421714;"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="assign_<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">ASSIGN MODULE</h4></center>
            </div>
            <div class="modal-body">
            <form method="POST" action="assign_module.php">	
            	<input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>">
            	<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">MODULE:</label>
					</div>
            		<div class="col-sm-10">
            			<input type="hidden" name="sec_id" value="<?php echo $section_id; ?>">
						<select class="form-control" name="module_id" required>
							<?php
							include_once('../../../connection/connection.php');
							$sqlier = "SELECT *,module_list.id as mlid FROM module_list LEFT JOIN subject ON module_list.subj_id = subject.subj_id LEFT JOIN section ON subject.grade_level = section.grade_id WHERE section.section_id = '".$row['sec_id']."'";

							//use for MySQLi-OOP
							$querieto = $conn->query($sqlier);
							while($xrow = $querieto->fetch_assoc()){


							// $result=mysqli_query($conn, "select * from assigned_module_student where user_id='".$row['user_id']."'");
							// $row=mysqli_fetch_array($result);
							
							?>	
							<option value="<?php echo $xrow['mlid']; ?>"><?php echo $xrow['section_name']; ?> | <?php echo $xrow['mod_name']; ?></option>
						    <?php } ?>
						</select>
					</div>	
				</div>	
     
            	
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                  <button type="submit" name="add" class="btn btn-success" style="background-color:#421714; border-color:#421714;"><span class="glyphicon glyphicon-check"></span> Assign</a>
             </form>   
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="qr_<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">QR CODE</h4></center>
            </div>
            <div class="modal-body">


            	<center>
            		<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Flocalhost/GNHS/PAGES/STUDENT/index.php?email=<?php echo $row['email']; ?>&stud_lrn=<?php echo $row['stud_lrn']; ?>%2F&choe=UTF-8" title="STUDENT:<?php echo $row['fname']; ?>|LRN:<?php echo $row['stud_lrn']; ?>"/>
            		</center>
     
            	
			</div>
            <div class="modal-footer">
            	<a href="generator/?email=<?php echo $row['email']; ?>&subject=<?php echo $row['fname']; ?>" class="btn btn-default"><span class="glyphicon glyphicon-floppy-disk"></span>proceed</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">DELETE</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['fname'].' '.$row['lname']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
