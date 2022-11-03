<?php 
include('../../connection/connection.php');
include('../../connection/session.php'); 
 
$result=mysqli_query($conn, "select * from teacher left join section ON teacher.sec_id = section.section_id left join grade ON section.grade_id = grade.grade_id where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
 
 ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PCS | HOME
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
       
        <a href="#" class="simple-text logo-normal">
          <div class="logo-image-big">
            <center><img src="../images/logo.png" style="width:50%;"></center>
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="index.php">
              <i class="nc-icon nc-bank" style="color:#421714;"></i>
              <p style="color:#421714;">Dashboard</p>
            </a>
          </li>
           
          <li>
            <a href="#" data-toggle="modal" data-target="#myModal">
              <i class="nc-icon nc-settings-gear-65" style="color:#421714;"></i>
              <p style="color:#421714;">Logout</p>
            </a>
          </li>
          
        
        </ul>
      </div>
    </div>

     <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <p>Are you sure you want to logout ?</p>
      </div>
      <div class="modal-footer">
          <a href="logout.php" class="btn btn-default">Yes</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>


    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
           
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-user">
              <div class="image" style="height:300px;">
                <img src="../images/cover.png" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#" style="text-decoration:none;">
                    <img class="avatar" src="../images/tech_1.png" style="border:none;" alt="...">
                    <h5 class="title" style="color:#2c3e50;">
                      TEACHER! <?php echo strtoupper($row['fname']); ?> <?php echo strtoupper($row['lname']); ?>
                    </h5>
                     <h5 class="title" style="color:#2c3e50;">
                      ADVISORY : <?php echo strtoupper($row['section_name']); ?> |  GRADE : <?php echo strtoupper($row['grade_level']); ?>
                    </h5>
                  </a>
                </div>
              </div>
              <div class="card-footer" style="margin-top:-100px;">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-6 ml-auto">
                      <h5>  <br><small>EMPLOYEE NO: <b><?php echo strtoupper($row['code']); ?></b></small></h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
                      <h5>  <br><small>EMAIL: <b><?php echo strtoupper($row['email']); ?></b></small></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
          <?php if(!empty($_GET['view'])){ ?>
          
          <?php if($_GET['view'] == 'SCAN'){ ?>
          <?php include_once('include/scan.php'); ?> 
          <?php } else if($_GET['view'] == 'SUBJECT') { ?>
          <?php include_once('include/module.php'); ?> 
          <?php } else if($_GET['view'] == 'DIRECTORY') { ?>
          <?php include_once('include/student_record.php'); ?> 
          <?php } else if($_GET['view'] == 'SETTING') { ?>
          <?php include_once('include/setting.php'); ?> 
          <?php } else if($_GET['view'] == 'CHANGE') { ?>
          <?php include_once('include/change.php'); ?> 
          <?php } else { ?>
          <?php } ?>

          <?php } else {  ?>
          
          <?php include_once('include/nav.php'); ?>

          <?php } ?>  


       


          
        
        </div>
      </div>




      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script> GVNHS
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>



  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
