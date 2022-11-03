<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">CREATE GRADE</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add.php" enctype="multipart/form-data">
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">GRADE:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="grade_level" required>
					</div>
				</div>
			
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Create</a>
			</form>
            </div>

        </div>
    </div>
</div>


<!-- Add Section -->
<div class="modal fade" id="addsection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">CREATE SECTION</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add_section.php" enctype="multipart/form-data">

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">SECTION:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="section_name" required>
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">GRADE:</label>
					</div>
					<div class="col-sm-10">
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
				</div>
			
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Create</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Add Section -->
<div class="modal fade" id="addsubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">CREATE SUBJECT</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add_subject.php" enctype="multipart/form-data">

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">SUBJECT:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="subj_name" required>
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">GRADE:</label>
					</div>
					<div class="col-sm-10">
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
				</div>
			
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Create</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Add Specific Section -->
<div class="modal fade" id="addspecificsection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">CREATE SECTION</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add_specific_section.php" enctype="multipart/form-data">

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">SECTION:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="section_name" required>
						<input type="hidden" class="form-control" name="grade_level" value="<?php echo $_GET['grade_level']; ?>" required>
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">GRADE:</label>
					</div>
					<div class="col-sm-10">
						<select class="form-control" name="grade_id">
					       <option value="<?php echo $_GET['grade_id']; ?>"><?php echo $_GET['grade_level']; ?></option>		
						</select>
					
					</div>
				</div>
			
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Create</a>
			</form>
            </div>

        </div>
    </div>
</div>


<!-- Add Specific subject -->
<div class="modal fade" id="addspecificsubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">CREATE SUBJECT</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add_specific_subject.php" enctype="multipart/form-data">

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">SUBJECT:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="subj_name" required>
						<input type="hidden" class="form-control" name="grade_level" value="<?php echo $_GET['grade_level']; ?>" required>
					</div>
				</div>
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">GRADE:</label>
					</div>
					<div class="col-sm-10">
						<select class="form-control" name="grade_id">
					       <option value="<?php echo $_GET['grade_id']; ?>"><?php echo $_GET['grade_level']; ?></option>		
						</select>
					
					</div>
				</div>
			
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Create</a>
			</form>
            </div>

        </div>
    </div>
</div>