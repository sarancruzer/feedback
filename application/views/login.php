<!DOCTYPE html>
<html lang="en">
  <!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================ -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="HR FEEDBACK SYSTEM">
    <title>Login Page | HR FEEDBACK SYSTEM</title>
    <!-- Favicons-->
    <link rel="icon" href="./images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="./images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="./css/themes/fixed-menu/materialize.css" type="text/css" rel="stylesheet">
    <link href="./css/themes/fixed-menu/style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="./css/custom/custom.css" type="text/css" rel="stylesheet">
    <link href="./css/layouts/page-center.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="./vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
  </head>
  <body class="cyan">
      <?php $message = $this->session->flashdata('Error');
                         
                       if($message !=""){  ?>
                      <div id="card-alert" class="card orange">
                    <div class="card-content white-text">
                      <p> <i class="material-icons">warning</i>  <?php echo $message = $this->session->flashdata('Error'); ?></p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php }  ?>
    <div id="login-page" class="row" >
      <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" method="post" name="loginPanel" action="index.php/login/loginprocess">
          <div class="row">
            <div class="input-field col s12 center">
              <img src="./images/logo/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
              <p class="center login-form-text">HR FEEDBACK SYSTEM</p>
            </div>
          </div>
          <div class="row margin" style="margin-left: -41px !important;">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5"></i>
              <input id="username" type="text" name="emp_mail_id">
              <label for="username" class="center-align">Username</label>
            </div>
          </div>
          <div class="row margin" style="margin-left: -41px !important;">
            <div class="input-field col s12">
              <i class="material-icons prefix pt-5"></i>
              <input id="password" type="password" name="emp_pass">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m12 l12 ml-2 mt-3">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              
			   <input class="btn waves-light col s12" type="submit" name="Login">
            </div>
          </div>
          <div class="row" style="display:none">
            <div class="input-field col s6 m6 l6">
              <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
            </div>
            <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="./vendors/jquery-3.2.1.min.js"></script>
	
    <!--materialize js-->
    <script type="text/javascript" src="./js/materialize.min.js"></script>
	
    <!--scrollbar-->
    <script type="text/javascript" src="./vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="./js/plugins.js"></script>
	<!--<script>


          $(function() {


              $("form[name='loginPanel']").submit(function(e) {


                  var formData = new FormData($(this)[0]);


                  $.ajax({


          					url: "http://thoughtbuzz.in/Feedback_system/index.php/login/loginprocess",


                    type: "POST",


          					data: formData,


          					success: function (msg) {


          						$('body,html').animate({ scrollTop: 0 }, 200);


          					  if(msg == 0){


                        $('#error_panel').show();


                      } else if(msg == 1) {


                        $('#error_panel').hide();


                        location.href = "<?=base_url('dashboard');?>";


                      }


          					},


          					cache: false,


          					contentType: false,


          					processData: false


          				});


          				e.preventDefault();


              });


          });


        </script>-->
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="./js/custom-script.js"></script>
	
	 
  </body>
</html>