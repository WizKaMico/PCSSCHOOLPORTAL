
<!-- Edit specific subject -->
<div class="modal fade" id="subj_<?php echo $row['subj_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">EDIT : <?PHP echo strtoupper($row['subj_name']); ?></h4></center>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="edit_subject.php">
                    <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label modal-label">SUBJECT:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="subj_id" value="<?php echo $row['subj_id']; ?>" required>
                        <input type="text" class="form-control" name="subj_name" value="<?php echo $row['subj_name']; ?>" required>
                        <input type="hidden" class="form-control" name="grade_level" value="<?php echo $row['grade_level']; ?>" required>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label modal-label">GRADE:</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="form-control" name="grade_id">
                             <option value="<?php echo $row['grade_id']; ?>"><?php echo $row['grade_level']; ?> (CURRENT)</option>
                            <?php
                            include_once('../../../connection/connection.php');
                            $sqsub = "SELECT * FROM grade";

                            //use for MySQLi-OOP
                            $querub = $conn->query($sqsub);
                            while($xrow = $querub->fetch_assoc()){
                            ?>  
                            <option value="<?php echo $xrow['grade_id']; ?>"><?php echo $xrow['grade_level']; ?></option>
                            <?php } ?>
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



<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['subj_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">DELETE</h4></center>
            </div>
            <div class="modal-body">    
                <p class="text-center">Are you sure you want to Delete</p>
                <h2 class="text-center"><?php echo $row['subj_name']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_subject.php?grade_id=<?php echo $row['grade_id']; ?>&grade_level=<?php echo $row['grade_level']; ?>&subject_id=<?php echo $row['subj_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>


