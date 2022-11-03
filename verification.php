<?php 
include('connection/connection.php');
include('connection/session.php'); 

if(!empty($_GET['view'])){

if($_GET['view'] == 'ADMIN'){
$result=mysqli_query($conn, "select * from admin where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
}else if($_GET['view'] == 'TEACHER'){
$result=mysqli_query($conn, "select * from teacher where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
}else if($_GET['view'] == 'STUDENT'){
$result=mysqli_query($conn, "select * from student where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
}else{

}

}else{


} 

 
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e48d166edc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Verification Form</title>
</head>

<body style="background-color:#ebffee;">

    <div class="container">

         <div class="img">
            <img src="DIST/CAROUSEL/1.png" alt="BG">
        </div>

        <div class="login-content">
            <?php if(!empty($_GET['view'])){ ?>

            <?php if($_GET['view'] == 'ADMIN') { ?>
            <form action="action/verify.php" method="POST">

                <div class="title-container">
                    <h1 style="color:green;"><?php echo strtoupper($_GET['view']); ?> | VERIFICATION</h1>
                    <h2>Hi! <?php echo strtoupper($row['fname']); ?></h2>
                    <p>Please provide the code that was sent to this email : <?php echo $row['email']; ?></p>
                </div>


                <div class="login-inner-content">


                    <div class="input-div one">
                        <div class="i">
                            <i class="far fa-user-circle"></i>
                        
                        </div>
                        <div class="div">
                           
                            <input type="number" name="code" class="ecode"  placeholder="Enter Verification Code" required>
                             <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>" class="ecode">
                        </div>
                    </div>



                    
                </div>

         <input type="submit" class="btn" name="verify" value="Login" style="background-color:green;">

            

            </form>
             <?php } else if($_GET['view'] == 'TEACHER') { ?>
             <form action="action/teacher_verify.php" method="POST">

                <div class="title-container">
                    <h1 style="color:green;"><?php echo strtoupper($_GET['view']); ?> | VERIFICATION</h1>
                    <h2>Hi! <?php echo strtoupper($row['fname']); ?></h2>
                    <p>Please provide the code that was sent to this email : <?php echo $row['email']; ?></p>
                </div>


                <div class="login-inner-content">


                    <div class="input-div one">
                        <div class="i">
                            <i class="far fa-user-circle"></i>
                            <!-- h5>Code</h5> -->
                        </div>
                        <div class="div">
                            
                            <input type="number" name="code" class="ecode"  placeholder="Enter Verification Code" required>
                             <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>" class="ecode">
                        </div>
                    </div>



                    
                </div>

                <input type="submit" class="btn" name="verify" value="Login" style="background-color:green;">

            

            </form> 
        <?php } else if($_GET['view'] == 'STUDENT') { ?>
             <form action="action/student_verify.php" method="POST">

                <div class="title-container">
                    <h1 style="color:green;"><?php echo strtoupper($_GET['view']); ?> | VERIFICATION</h1>
                    <h2>Hi! <?php echo strtoupper($row['fname']); ?></h2>
                    <p>Please provide the code that was sent to this email : <?php echo $row['email']; ?></p>
                </div>


                <div class="login-inner-content">


                    <div class="input-div one">
                        <div class="i">
                            <i class="far fa-user-circle"></i>
                        </div>
                        <div class="div">
                            
                            <input type="number" name="code" class="ecode"  placeholder="Enter Verification Code" required>
                             <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>" class="ecode">
                        </div>
                    </div>



                    
                </div>

                <input type="submit" class="btn" name="verify" value="Login" style="background-color:green;">

            

            </form> 
            <?php }else{ ?>


            <?php } ?>

            <?php } else { ?>

            <?php } ?>   
        </div>
    </div>





    <script src="script.js"></script>

</body>

</html>





