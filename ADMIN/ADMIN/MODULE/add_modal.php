<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add Module</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add.php" enctype="multipart/form-data">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Module:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="mod_name" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Week:</label>
					</div>
					<div class="col-sm-10">
                         <select class="form-control" name="week_no">
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
							<?php
					
							$sql = "SELECT * FROM subject LEFT JOIN grade ON subject.grade_level = grade.grade_id";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
							?>	
							<option value="<?php echo $row['subj_id']; ?>"><?php echo $row['grade_level']; ?> | <?php echo $row['subj_name']; ?></option>
						    <?php } ?>
						</select>
					</div>
				</div>
			
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>


<!-- Add New -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Assign Week</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			
			
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Assign</a>
			</form>
            </div>

        </div>
    </div>
</div>