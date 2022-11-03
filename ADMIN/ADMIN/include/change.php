     <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Password</h5>
              </div>
              <div class="card-body">

               <form action="#" method="POST">
                   
                   <div class="row">
                    <div class="col-md-12 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Old Password</label>
                        <input type="text" class="form-control" name="password" required>
                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id']; ?>" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="text" class="form-control" name="new_pass" required>
                      </div>
                    </div>
                  </div>

               

                   
                 
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" name="update" style="width:100%;" class="btn btn-primary btn-round">Change Password</button>
                      <br>
                      <a href="index.php?view=SETTING" style="width:100%;" class="btn btn-primary btn-round">Change Profile</a>
                    </div>
                  </div>
                </form>
              


                <?php 


                    if(isset($_POST['update'])){
                     
                       
                       $password = md5($_POST['password']);
                       $new_pass = md5($_POST['new_pass']);
                       $user_id = $_POST['user_id'];

                       $query     = mysqli_query($conn, "SELECT * FROM admin WHERE  password='$password' and user_id='$user_id'");
                        $row    = mysqli_fetch_array($query);
                        $num_row  = mysqli_num_rows($query);
                   
                        if ($num_row > 0) 
                          {     
                             $user_id = $row['user_id'];
                              mysqli_query($conn,"UPDATE admin SET password='$new_pass' WHERE user_id = '$user_id'"); 
                              echo 'Password Change';
                   
                          }
                        else
                          {
                            echo 'Invalid Old Password';
                          }
                       

                    }


                ?>


              </div>
            </div>
          </div>