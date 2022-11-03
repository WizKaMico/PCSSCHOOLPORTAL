<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Module</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
			 <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Module:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="mod_name" value="<?php echo $row['mod_name']; ?>" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Week:</label>
					</div>
					<div class="col-sm-10">
                         <select class="form-control" name="week_no">
                         	<option value="<?php echo $row['week_no']; ?>"><?php echo $row['week_no']; ?> (CURRENTLY)</option>
                         		<?php
							for ($x = 1; $x <= 36; $x++) { ?>
							  <option value="Week <?php echo $x; ?>">Week <?php echo $x; ?></option>
							<?php } ?>
                         </select> 
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Quarter:</label>
					</div>
					<div class="col-sm-10">
                         <select class="form-control" name="quarter_no">
                         	<option value="<?php echo $row['quarter_no']; ?>"><?php echo $row['quarter_no']; ?> (CURRENTLY)</option>
                         	<option value="1st Quarter">1st Quarter</option>
                         	<option value="2nd Quarter">2nd Quarter</option>
                         	<option value="3rd Quarter">3rd Quarter</option>
                         	<option value="4th Quarter">4th Quarter</option>
                         </select> 
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Subject:</label>
					</div>
					<div class="col-sm-10">
						<select class="form-control" name="subj_id">
							<option value="<?php echo $row['subj_id']; ?>"><?php echo $row['grade_level']; ?> | <?php echo $row['subj_name']; ?> (CURRENTLY)</option>

							<?php
						
							$sqer = "SELECT * FROM subject LEFT JOIN grade ON subject.grade_level = grade.grade_id";

							//use for MySQLi-OOP
							$querier = $conn->query($sqer);
							while($rxow = $querier->fetch_assoc()){
							?>	
							<option value="<?php echo $rxow['subj_id']; ?>"><?php echo $rxow['grade_level']; ?> | <?php echo $rxow['subj_name']; ?></option>
						    <?php } ?>
							
						</select>
					</div>
				</div>
		
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Module</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete Content</p>
				<h2 class="text-center"><?php echo $row['mod_name']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>