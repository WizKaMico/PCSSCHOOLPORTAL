<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.css'><link rel="stylesheet" href="DIST/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!-- https://dribbble.com/shots/15392711-Dashboard-Login-Sign-Up/-->

<div class="login-container">
  <div class="login-form" style="background-color:#ebffee;">
    <div class="login-form-inner">
     
    <?php if(!empty($_GET['view'])){ ?>		

     <?php if($_GET['view'] == 'TEACHER'){ ?>		

    <?php if(!empty($_GET['message']) && $_GET['message'] == 'LOCKED'){ ?>   
      <form action="action/teacher_login.php" method="POST">
      <div id="proceed"> 
      <div class="logo">
         <center><img src="DIST/LOGO/logo.png"></center>
      </div>

      <h1 align="center">TEACHER</h1>
      
      <div class="login-form-group">
        <label for="email">Email <span class="required-star">*</span></label>
        <input type="email" name="email" placeholder="email@website.com" id="email">
      </div>
      <div class="login-form-group">
        <label for="pwd">Password <span class="required-star">*</span></label>
        <input name="password" autocomplete="off" type="password" placeholder="Minimum 8 characters" id="pwd">
      </div>
       <button class="rounded-button login-cta" name="login" style="background-color:green;">Login</button>	
      <a href="index.php" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Back Home</a>
      <a href="recover.php?view=TEACHER" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Recover Account</a>

    
     </div>

        <p style="margin-top:50px;">You need to wait <span id="time">30</span> before you can proceed</p>
      </form>



                <style type="text/css">
                    
                    #proceed {
                      display: none;
                    }

                </style>

    <?php } else if(!empty($_GET['message']) && $_GET['message'] == 'Error'){ ?>    

    <script>
      
        alert("You've got 3 attemps remaining before your account is locked");
      
      </script>
 
    

    <form action="action/teacher_login.php" method="POST">
      <div class="logo">
         <center><img src="DIST/LOGO/logo.png"></center>
      </div>

      <h1 align="center">TEACHER</h1>
      
      <div class="login-form-group">
        <label for="email">Email <span class="required-star">*</span></label>
        <input type="email" name="email" placeholder="email@website.com" id="email">
      </div>
      <div class="login-form-group">
        <label for="pwd">Password <span class="required-star">*</span></label>
        <input name="password" autocomplete="off" type="password" placeholder="Minimum 8 characters" id="pwd">
      </div>
       <button class="rounded-button login-cta" name="login" style="background-color:green;">Login</button> 
      <a href="index.php" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Back Home</a>


      
      </form>          
       
            
    <?php } else { ?>


     <form action="action/teacher_login.php" method="POST">
      <div class="logo">
         <center><img src="DIST/LOGO/logo.png"></center>
      </div>

      <h1 align="center">TEACHER</h1>
      
      <div class="login-form-group">
        <label for="email">Email <span class="required-star">*</span></label>
        <input type="email" name="email" placeholder="email@website.com" id="email">
      </div>
      <div class="login-form-group">
        <label for="pwd">Password <span class="required-star">*</span></label>
        <input name="password" autocomplete="off" type="password" placeholder="Minimum 8 characters" id="pwd">
      </div>
       <button class="rounded-button login-cta" name="login" style="background-color:green;">Login</button> 
      <a href="index.php" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Back Home</a>

      
      </form>


    <?php } ?>  

      <?php } else if($_GET['view'] == 'ADMIN'){ ?>

      <?php if(!empty($_GET['message']) && $_GET['message'] == 'LOCKED'){ ?>     

      <form action="action/login.php" method="POST">	
      <div id="proceed"> 
       <div class="logo">
         <center><img src="DIST/LOGO/logo.png"></center>
      </div>
      <h1 align="center">ADMIN</h1>
      
      <div class="login-form-group">
        <label for="email">Email <span class="required-star">*</span></label>
        <input type="email" name="email" placeholder="email@website.com" id="email">
      </div>
      <div class="login-form-group">
        <label for="pwd">Password <span class="required-star">*</span></label>
        <input name="password" autocomplete="off" type="password" placeholder="Minimum 8 characters" id="pwd">
      </div>
      <button class="rounded-button login-cta" name="login" style="background-color:green;">Login</button>		
      <a href="index.php" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Back Home</a>	
       <a href="recover.php?view=ADMIN" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Recover Account</a>
      </div>
       <p style="margin-top:50px;">You need to wait <span id="time">30</span> before you can proceed</p>

            <style type="text/css">
                    
                    #proceed {
                      display: none;
                    }

                </style>
      </form>

      <?php } else if(!empty($_GET['message']) && $_GET['message'] == 'Error'){ ?>  

      <script>
      
        alert("You've got 3 attemps remaining before your account is locked");
      
      </script>
    

      <form action="action/login.php" method="POST">  
       <div class="logo">
         <center><img src="DIST/LOGO/logo.png"></center>
      </div>
      <h1 align="center">ADMIN</h1>
      
      <div class="login-form-group">
        <label for="email">Email <span class="required-star">*</span></label>
        <input type="email" name="email" placeholder="email@website.com" id="email">
      </div>
      <div class="login-form-group">
        <label for="pwd">Password <span class="required-star">*</span></label>
        <input name="password" autocomplete="off" type="password" placeholder="Minimum 8 characters" id="pwd">
      </div>
      <button class="rounded-button login-cta" name="login" style="background-color:green;">Login</button>    
      <a href="index.php" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Back Home</a>  
     

      </form>
    
      <?php } else { ?>


      <form action="action/login.php" method="POST">  
       <div class="logo">
         <center><img src="DIST/LOGO/logo.png"></center>
      </div>
      <h1 align="center">ADMIN</h1>
      
      <div class="login-form-group">
        <label for="email">Email <span class="required-star">*</span></label>
        <input type="email" name="email" placeholder="email@website.com" id="email">
      </div>
      <div class="login-form-group">
        <label for="pwd">Password <span class="required-star">*</span></label>
        <input name="password" autocomplete="off" type="password" placeholder="Minimum 8 characters" id="pwd">
      </div>
      <button class="rounded-button login-cta" name="login" style="background-color:green;">Login</button>    
      <a href="index.php" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Back Home</a>  
     

      </form>
    


      <?php } ?>  

      <?php } else if($_GET['view'] == 'STUDENT'){ ?>	

       <?php if(!empty($_GET['message']) && $_GET['message'] == 'LOCKED'){ ?>    
      <form action="action/student_login.php" method="POST">		
      <div id="proceed">
       <div class="logo">
         <center><img src="DIST/LOGO/logo.png"></center>
      </div>
      <h1 align="center">STUDENT</h1>
      
      <div class="login-form-group">
        <label for="email">Email <span class="required-star">*</span></label>
        <input type="email" name="email" placeholder="email@website.com" id="email">
      </div>
      <div class="login-form-group">
        <label for="pwd">Password <span class="required-star">*</span></label>
        <input name="password" autocomplete="off" type="password" placeholder="Minimum 8 characters" id="pwd">
      </div>
      <button class="rounded-button login-cta" name="login" style="background-color:green;">Login</button>		
      <a href="index.php" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Back Home</a>
       <a href="recover.php?view=STUDENT" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Recover Account</a>
      </div>
       <p style="margin-top:50px;">You need to wait <span id="time">30</span> before you can proceed</p>
      </form>


            <style type="text/css">
                    
                    #proceed {
                      display: none;
                    }

                </style>
      <?php } else if(!empty($_GET['message']) && $_GET['message'] == 'Error'){ ?>  

        <script>
      
        alert("You've got 3 attemps remaining before your account is locked");
      
      </script>

       <form action="action/student_login.php" method="POST">    
       <div class="logo">
         <center><img src="DIST/LOGO/logo.png"></center>
      </div>
      <h1 align="center">STUDENT</h1>
      
      <div class="login-form-group">
        <label for="email">Email <span class="required-star">*</span></label>
        <input type="email" name="email" placeholder="email@website.com" id="email">
      </div>
      <div class="login-form-group">
        <label for="pwd">Password <span class="required-star">*</span></label>
        <input name="password" autocomplete="off" type="password" placeholder="Minimum 8 characters" id="pwd">
      </div>
      <button class="rounded-button login-cta" name="login" style="background-color:green;">Login</button>    
      <a href="index.php" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Back Home</a>
   
      </form>

    <?php } else { ?>


       <form action="action/student_login.php" method="POST">    
       <div class="logo">
         <center><img src="DIST/LOGO/logo.png"></center>
      </div>
      <h1 align="center">STUDENT</h1>
      
      <div class="login-form-group">
        <label for="email">Email <span class="required-star">*</span></label>
        <input type="email" name="email" placeholder="email@website.com" id="email">
      </div>
      <div class="login-form-group">
        <label for="pwd">Password <span class="required-star">*</span></label>
        <input name="password" autocomplete="off" type="password" placeholder="Minimum 8 characters" id="pwd">
      </div>
      <button class="rounded-button login-cta" name="login" style="background-color:green;">Login</button>    
      <a href="index.php" class="rounded-button login-cta" style="background-color:green; margin-top:-25px;">Back Home</a>
   
      </form> 

    <?php } ?>  


      <?php } ?>	
      


      <?php } else { ?>

       <div class="login-form-group">
         <a href="index.php?view=TEACHER"><img src="DIST/IMAGE/3.svg" style="width:50%;"></a>
      </div>
      
      <div class="login-form-group">
         <a href="index.php?view=ADMIN"><img src="DIST/IMAGE/4.svg" style="width:50%;"></a> 
      </div>

      <div class="login-form-group">
         <a href="index.php?view=STUDENT"><img src="DIST/IMAGE/6.svg" style="width:50%;"></a>
      </div>				

      <?php } ?>
     
    </div>

  </div>
  <div class="onboarding">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide color-1">
          <div class="slide-image">
            <img src="DIST/CAROUSEL/1.png" loading="lazy" alt="" />
          </div>
          <div class="slide-content">
            <h2>Turn your ideas into reality.</h2>
            <p>Consistent quality and eperience across all platform and devices</p>
          </div>
        </div>
        <div class="swiper-slide color-1">
          <div class="slide-image">
            <img src="DIST/CAROUSEL/2.png" loading="lazy" alt="" />
          </div>
          <div class="slide-content">
            <h2>Turn your ideas into reality.</h2>
            <p>Consistent quality and eperience across all platform and devices</p>
          </div>
        </div>

        <div class="swiper-slide color-1">
          <div class="slide-image">
           <img src="DIST/CAROUSEL/3.png" loading="lazy" alt="" />
          </div>
          <div class="slide-content">
            <h2>Turn your ideas into reality.</h2>
            <p>Consistent quality and eperience across all platform and devices</p>
          </div>
        </div>

         <div class="swiper-slide color-1">
          <div class="slide-image">
           <img src="DIST/CAROUSEL/4.png" loading="lazy" alt="" />
          </div>
          <div class="slide-content">
            <h2>Turn your ideas into reality.</h2>
            <p>Consistent quality and eperience across all platform and devices</p>
          </div>
        </div>


         <div class="swiper-slide color-1">
          <div class="slide-image">
           <img src="DIST/CAROUSEL/5.png" loading="lazy" alt="" />
          </div>
          <div class="slide-content">
            <h2>Turn your ideas into reality.</h2>
            <p>Consistent quality and eperience across all platform and devices</p>
          </div>
        </div>

         <div class="swiper-slide color-1">
          <div class="slide-image">
           <img src="DIST/CAROUSEL/6.png" loading="lazy" alt="" />
          </div>
          <div class="slide-content">
            <h2>Turn your ideas into reality.</h2>
            <p>Consistent quality and eperience across all platform and devices</p>
          </div>
        </div>
      </div>

      </div>
      <!-- Add Pagination -->
      <!-- <div class="swiper-pagination"></div> -->
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.0/js/swiper.min.js'></script><script  src="DIST/script.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

   <script>
        
       var i = 30;
      var time = $("#time")
      var timer = setInterval(function() {
        time.html(i);
        if (i == 0) {
          $("#proceed").show();
          clearInterval(timer);

        }
        i--;
      }, 1000)     


    </script>

</body>
</html>
