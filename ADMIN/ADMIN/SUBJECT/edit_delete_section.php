<!-- Edit specific section -->
<div class="modal fade" id="specific_<?php echo $row['section_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">EDIT : <?PHP echo strtoupper($row['section_name']); ?></h4></center>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="edit_section.php">
                    <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label modal-label">SECTION:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" name="section_id" value="<?php echo $row['section_id']; ?>" required>
                        <input type="text" class="form-control" name="section_name" value="<?php echo $row['section_name']; ?>" required>
                        <input type="hidden" class="form-control" name="grade_level" value="<?php echo $_GET['grade_level']; ?>" required>
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
                            $sqs = "SELECT * FROM grade";

                            //use for MySQLi-OOP
                            $queries = $conn->query($sqs);
                            while($row = $queries->fetch_assoc()){
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
                <button type="submit" name="edit" class="btn btn-success" style="background-color:#421714; border-color:#421714;"><span class="glyphicon glyphicon-check"></span> Update</a>
            </form>
            </div>

        </div>
    </div>
</div>



<!-- Delete -->
<div class="modal fade" id="deletesec_<?php echo $row['section_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">DELETE</h4></center>
            </div>
            <div class="modal-body">    
                <p class="text-center">Are you sure you want to Delete</p>
                <h2 class="text-center"><?php echo $row['section_name']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_subject.php?section_id=<?php echo $row['section_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
