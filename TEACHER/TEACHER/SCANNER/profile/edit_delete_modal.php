<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['aid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">EDIT : <?PHP echo strtoupper($row['subject_name']); ?></h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="submit.php">
				<input type="hidden" class="form-control" name="user_id" value="<?php echo $row['STUD']; ?>">
				
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Status:</label>
					</div>
					<div class="col-sm-10">
						<select class="form-control" name="status">
							
							
							 <option value="<?php echo $row['SUBJSTAT']; ?>"><?php echo $row['SUBJSTAT']; ?></option> 										  
							 <option value="CLAIMED">CLAIMED</option>
							 <option value="UN-CLAIMED">UN-CLAIMED</option>
							 <option value="RETURN">RETURN</option>

						
							
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



<!-- Edit -->
<div class="modal fade" id="real_<?php echo $row['SUBJID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">EDIT : <?PHP echo strtoupper($row['subject_name']); ?></h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_submit.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['SUBJID']; ?>">
				<input type="hidden" class="form-control" name="user_id" value="<?php echo $row['STUD']; ?>">
				<input type="hidden" class="form-control" name="subject_id" value="<?php echo $row['SUBJ']; ?>">
				<input type="hidden" class="form-control" name="email" value="<?php echo $row['email']; ?>">
				
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Status:</label>
					</div>
					<div class="col-sm-10">
						<select class="form-control" name="status">
							
							 
							 <option value="<?php echo $row['SUBJSTAT']; ?>"><?php echo $row['SUBJSTAT']; ?> (CURRENT)</option> 										  
							 <option value="CLAIMED">CLAIMED</option>
							 <option value="UN-CLAIMED">UN-CLAIMED</option>
							 <option value="RETURN">RETURN</option>

							
							
							
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