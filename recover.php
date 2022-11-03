<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="RECOVERY/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-page">
  
   <?php if($_GET['view'] == 'ADMIN'){ ?>
      <div class="form">
            <center><img src="DIST/LOGO/logo.png"></center>
     <form action="#" method="POST">
        <input
          type="email"
          placeholder="email"
          class="username"
          name="email"
        />
        <input
          type="nunber"
          placeholder="employee id"
          class="username"
          name="employee_id"
        />

         <input
          type="password"
          placeholder="New Password"
          class="username"
          name="password"
        />
    
        <button name="proceed_admin">PROCEED</button>
     </form>  

     <?php if(isset($_POST['proceed_admin'])){ ?>
     <?php 
      include 'connection/connection.php';
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
      $password = mysqli_real_escape_string($conn, md5($_POST['password']));
      $query    = mysqli_query($conn, "SELECT * FROM admin WHERE employee_id='$employee_id' and email='$email'");
      $row    = mysqli_fetch_array($query);
      $num_row  = mysqli_num_rows($query);
 
      if ($num_row > 0) 
        {     

        $user_id = $row['user_id'];
        $email = $row['email']; 
        $role = 'ADMIN';

        mysqli_query($conn,"UPDATE admin SET  status = 'VALID', password='$password' WHERE user_id = '$user_id'"); 
        mysqli_query($conn,"DELETE FROM security_check WHERE email = '$email' AND role = '$role'");
        header('Location:index.php?view=ADMIN');
     
        }
      else
        {
          echo 'Invalid Username and Password Combination';
        }



     ?>
     <?php } else { ?>


     <?php } ?> 
     <?php } else if($_GET['view'] == 'TEACHER'){ ?>
           <div class="form">
            <center><img src="DIST/LOGO/logo.png"></center>
     <form action="#" method="POST">
        <input
          type="email"
          placeholder="email"
          class="username"
          name="email"
        />

         <input
          type="password"
          placeholder="New Password"
          class="username"
          name="password"
        />
    
        <button name="proceed_teacher">PROCEED</button>
     </form>  

     <?php if(isset($_POST['proceed_teacher'])){ ?>
     <?php 
      include 'connection/connection.php';
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, md5($_POST['password']));
      $query    = mysqli_query($conn, "SELECT * FROM teacher WHERE email='$email'");
      $row    = mysqli_fetch_array($query);
      $num_row  = mysqli_num_rows($query);
 
      if ($num_row > 0) 
        {     

        $user_id = $row['user_id'];
        $email = $row['email']; 
        $role = 'TEACHER';

        mysqli_query($conn,"UPDATE teacher SET  status = 'VALID', password='$password' WHERE user_id = '$user_id'"); 
        mysqli_query($conn,"DELETE FROM security_check WHERE email = '$email' AND role = '$role'");
        header('Location:index.php?view=TEACHER');
     
        }
      else
        {
          echo 'Invalid Username and Password Combination';
        }



     ?>
     <?php } else { ?>


     <?php } ?>  


     <?php } else if($_GET['view'] == 'STUDENT'){ ?>
           <div class="form">
            <center><img src="DIST/LOGO/logo.png"></center>
     <form action="#" method="POST">
        <input
          type="email"
          placeholder="email"
          class="username"
          name="email"
        />
        <input
          type="nunber"
          placeholder="Student lrn"
          class="username"
          name="stud_lrn"
        />

         <input
          type="password"
          placeholder="New Password"
          class="username"
          name="password"
        />
    
        <button name="proceed_student">PROCEED</button>
     </form>  

     <?php if(isset($_POST['proceed_student'])){ ?>
     <?php 
      include 'connection/connection.php';
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $stud_lrn = mysqli_real_escape_string($conn, $_POST['stud_lrn']);
      $password = mysqli_real_escape_string($conn, md5($_POST['password']));
      $query    = mysqli_query($conn, "SELECT * FROM student WHERE stud_lrn='$stud_lrn' and email='$email'");
      $row    = mysqli_fetch_array($query);
      $num_row  = mysqli_num_rows($query);
 
      if ($num_row > 0) 
        {     

        $user_id = $row['user_id'];
        $email = $row['email']; 
        $role = 'STUDENT';

        mysqli_query($conn,"UPDATE student SET status = 'VALID', password='$password' WHERE user_id = '$user_id'"); 
        mysqli_query($conn,"DELETE FROM security_check WHERE email = '$email' AND role = '$role'");
        header('Location:index.php?view=STUDENT');
     
        }
      else
        {
          echo 'Invalid Username and Password Combination';
        }



     ?>
     <?php } else { ?>


     <?php } ?>  



     <?php } else { ?>
     

     <?php } ?>


      </div>
    </div>
<!-- partial -->

</body>
</html>
