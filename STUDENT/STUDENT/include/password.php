     <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form action="#" method="POST">
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Old Password:</label>
                        <input type="text" class="form-control" name="old_password" required>
                         <input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>" required>
                         <input type="hidden" class="form-control" name="passx" value="<?php echo $row['password']; ?>" required>
                      </div>
                    </div>
                     <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>New Password:</label>
                        <input type="text" class="form-control" name="new_password" required>
                      </div>
                    </div>
                     <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Confirm Password:</label>
                        <input type="text" class="form-control" name="confirm_password" required>
                      </div>
                    </div>
                    

                  </div>
                  
                   
                 
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="update" class="btn btn-primary btn-round">Change Password</button>
                    </div>
                  </div>
                </form>


                <?php 


                    if(isset($_POST['update'])){
               
                     
                       $old_password = $_POST['old_password']; 
                       $pass = md5($old_password);  
                       $pasx = $_POST['passx'];
                       $new_password = $_POST['new_password'];
                       $confirm_password = $_POST['confirm_password'];
                       $acupass = md5($new_password);
                       $user_id = $_POST['user_id'];

                          
                           if($pass === $pasx && $new_password === $confirm_password){
                               mysqli_query($conn,"UPDATE admin SET password='$acupass' WHERE user_id = '$user_id'");

                           }else{
                              echo 'New password is not matched'; 
                           }

                    
                       
                        


          
 


                    }ELSE{
                      echo 'No Prior Details';
                    }


                ?>


              </div>
            </div>
          </div>