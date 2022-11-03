<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">CREATE NEW ADMIN</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add.php" enctype="multipart/form-data">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">EID:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="employee_id" value="<?php echo rand(666666,999999); ?>" required="" readonly="">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">FIRSTNAME:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fname" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">LASTNAME:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="lname" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">INITIAL:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="initial" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">EMAIL:</label>
					</div>
					<div class="col-sm-10">
						<input type="email" name="email" class="form-control" name="initial" required>
					</div>
				</div>
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="register" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Create</a>
			</form>
            </div>

        </div>
    </div>
</div>