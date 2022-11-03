     <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">

               <form action="#" method="POST">
                   
                   <div class="row">
                    <div class="col-md-12 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Firstname</label>
                        <input type="text" class="form-control" name="fname" value="<?php echo $row['fname']; ?>" required>
                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Initial</label>
                        <input type="text" class="form-control" name="initial" value="<?php echo $row['initial']; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Lastname</label>
                        <input type="text" class="form-control" name="lname" value="<?php echo $row['lname']; ?>" required>
                      </div>
                    </div>
                  </div>

                   
                 
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="update" style="width:100%;" class="btn btn-primary btn-round">Update Profile</button>
                      <br>
                      <a href="index.php?view=CHANGE" style="width:100%;" class="btn btn-primary btn-round">Change Password</a>
                    </div>
                  </div>
                </form>
              


                <?php 


                    if(isset($_POST['update'])){
                     
                       
                       $fname = $_POST['fname'];
                       $initial = $_POST['initial'];
                       $lname = $_POST['lname'];
                       $user_id = $_POST['user_id'];
                       

                         mysqli_query($conn,"UPDATE admin SET fname='$fname',  initial='$initial', lname='$lname' WHERE user_id = '$user_id'");  
                            echo 'Profile Change';



          
 


                    }


                ?>


              </div>
            </div>
          </div>