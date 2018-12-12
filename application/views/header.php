<?php  $user_type = $this->session->userdata('user_type');
$user_id = $this->session->userdata('user_id');

$q = $this -> db
           -> select('profile_pic')
           -> where('id', $user_id)
           -> limit(1)
           -> get('organization')-> row();
		   //echo $q->profile_pic;
		   //var_dump($q);
?>
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
    <meta name="description" content="response">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Response</title>
    <!-- Favicons-->
    <link rel="icon" href="../../../images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="../../../images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="../../../css/themes/fixed-menu/materialize.css" type="text/css" rel="stylesheet">
    <link href="../../../css/themes/fixed-menu/style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="../../../css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="../../../vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="../../../vendors/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet">
    <link href="../../../vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
    
    <link href="../../../vendors/prism/prism.css" type="text/css" rel="stylesheet">
    <!--prism -->
    <script type="text/javascript" src="../../../vendors/prism/prism.js"></script>
    <link href="../../../vendors/jquery.nestable/nestable.css" type="text/css" rel="stylesheet">
    
	<!-- jQuery Library -->    
<script type="text/javascript" src="../../../vendors/jquery-3.2.1.min.js"></script>    
<!--materialize js-->    
<script type="text/javascript" src="../../../js/materialize.min.js"></script>   
 <!--scrollbar-->    
<script type="text/javascript" src="../../../vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>    <!-- chartjs -->    
<script type="text/javascript" src="../../../vendors/chartjs/chart.min.js"></script>    
<!-- sparkline -->    
<script type="text/javascript" src="../../../vendors/sparkline/jquery.sparkline.min.js"></script>    
<!-- google map api -->    
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>    <!--jvectormap-->    
<script type="text/javascript" src="../../../vendors/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>    <script type="text/javascript" src="../../../vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>    <script type="text/javascript" src="../../../vendors/jvectormap/vectormap-script.js"></script>    
<!--google map-->   
 <script type="text/javascript" src="../../../js/scripts/google-map-script.js"></script>    
 <!--plugins.js - Some Specific JS codes for Plugin Settings-->    
 <script type="text/javascript" src="../../../js/plugins.js"></script>    
 <!--card-advanced.js - Page specific JS-->    
 <script type="text/javascript" src="../../../js/scripts/dashboard-analytics.js"></script>	 
 <!-- data-tables -->    
 <script type="text/javascript" src="../../../vendors/data-tables/js/jquery.dataTables.min.js"></script>    <!--data-tables.js - Page Specific JS codes -->   
 <script type="text/javascript" src="../../../js/scripts/data-tables.js"></script>  

<!--prism -->
    <script type="text/javascript" src="../../../vendors/prism/prism.js"></script>
 
 
<!-- chartist -->
    <script type="text/javascript" src="../../../vendors/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../../../vendors/jquery-validation/additional-methods.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="../../../js/plugins.js"></script>
    <!--form-validation.js - Page Specific JS codes-->
    <script type="text/javascript" src="../../../js/scripts/form-validation.js"></script>



 
 <!--custom-script.js - Add your own theme custom JS-->    
 <script type="text/javascript" src="../../../js/custom-script.js"></script> 
 
 
 
 
  </head>
  <body>

    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="index.html" class="brand-logo darken-1">
                    <img src="../../../images/logo/materialize-logo.png" alt="materialize logo">
                    <span class="logo-text hide-on-med-and-down">Response </span>
                  </a>
                </h1>
              </li>
            </ul>
            <div class="header-search-wrapper hide-on-med-and-down">
              <i class="material-icons">search</i>
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Feedback" />
            </div>
            <ul class="right hide-on-med-and-down">
              <li style="display:none">
                <a href="javascript:void(0);" class="waves-block waves-light translation-button" data-activates="translation-dropdown">
                  <span class="flag-icon flag-icon-gb"></span>
                </a>
              </li>
              <li>
                <a href="http://thoughtbuzz.in/Feedback_system/index.php/profile/index/0" class="waves-block waves-light">
                  <i class="material-icons">face</i>
                </a>
              </li>
			  
			  <li>
                <a href="http://thoughtbuzz.in/Feedback_system/" class="waves-block waves-light">
                  <i class="material-icons">keyboard_tab</i>
                </a>
              </li>
              
              <li style="display:none">
                <a href="javascript:void(0);" class="waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
				  <?php if(empty($q->profile_pic)){ ?>
                    <img src="../../../images/avatar/avatar-7.png" alt="avatar">
				  <?php } else{ ?>
					<img src="../../../uploadsimg/<?php echo $q->profile_pic ?>" alt="avatar">
					
				  <?php } ?>
                    <i></i>
                  </span>
                </a>
              </li>
             
            </ul>
            <!-- translation-button -->
            <ul id="translation-dropdown" class="dropdown-content">
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-gb"></i> English</a>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-fr"></i> French</a>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-cn"></i> Chinese</a>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-1">
                  <i class="flag-icon flag-icon-de"></i> German</a>
              </li>
            </ul>
            <!-- notifications-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>NOTIFICATIONS
                  <span class="new badge">5</span>
                </h6>
              </li>
              <li class="divider"></li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
              </li>
            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="http://thoughtbuzz.in/Feedback_system/index.php/profile/index/0" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Profile</a>
              </li>
              <li style="display:none">
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">settings</i> Settings</a>
              </li>
              <li style="display:none">
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">live_help</i> Help</a>
              </li>
              <li class="divider"></li>
              <li style="display:none">
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">lock_outline</i> Lock</a>
              </li>
              <li>
                <a href="http://thoughtbuzz.in/Feedback_system/" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- end header nav-->
    </header>
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
              <div class="row">
                <div class="col col s4 m4 l4">
				
				 <?php if(empty($q->profile_pic)){ ?>
                    <img src="../../../images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
				  <?php } else{ ?>
                  <img src="../../../uploadsimg/<?php echo $q->profile_pic ?>" alt="" class="circle responsive-img valign profile-image cyan">
				  <?php } ?>
                </div>
                <div class="col col s8 m8 l8">
                  <ul id="profile-dropdown-nav" class="dropdown-content">
                    <li>
                      <a href="http://thoughtbuzz.in/Feedback_system/index.php/profile/index/0" class="grey-text text-darken-1">
                        <i class="material-icons">face</i> Profile</a>
                    </li>
                    <li style="display:none">
                      <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">settings</i> Settings</a>
                    </li>
                    <li style="display:none">
                      <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">live_help</i> Help</a>
                    </li style="display:none">
                    <li class="divider"></li>
                    <li style="display:none">
                      <a href="#" class="grey-text text-darken-1">
                        <i class="material-icons">lock_outline</i> Lock</a>
                    </li>
                    <li>
                      <a href="http://thoughtbuzz.in/Feedback_system/" class="grey-text text-darken-1">
                        <i class="material-icons">keyboard_tab</i> Logout</a>
                    </li>
                  </ul>
                  <a class="btn-flat dropdown-button waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav"><?php  echo $this->session->userdata('user_name');?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                  <p class="user-roal"><?php  echo $this->session->userdata('user_email');?></p>
                </div>
              </div>
            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">
                <li class="bold" id="dashboard1">
                  <a  href="http://thoughtbuzz.in/Feedback_system/index.php/dashboard/index/0">
                    <i class="material-icons">dashboard</i>
                    <span class="nav-text">Dashboard</span>
                  </a>
                  
                </li>
				
				<li class="bold" id="dashboard1" style="display:none">
                  <a  href="http://thoughtbuzz.in/Feedback_system/index.php/charts/index/0">
                    <i class="material-icons">dashboard</i>
                    <span class="nav-text">Charts</span>
                  </a>
                  
                </li>
				<?php  if($user_type == 1){?>
				<li class="bold" id="Organization1">
                  <a href="http://thoughtbuzz.in/Feedback_system/index.php/organization/index/0">
                    <i class="material-icons">dvr</i>
                    <span class="nav-text">Organizations</span>
                  </a>
                 
                </li>
				
                <li class="bold" id="Categories1">
                 <a href="http://thoughtbuzz.in/Feedback_system/index.php/category/index/0">
                    <i class="material-icons">dvr</i>
                    <span class="nav-text">Categories</span>
                  </a>
                 
                </li>
				<?php } if($user_type == 3 || $user_type == 0 || $user_type == 1){?>
                <li class="bold" id="Questions1" >
                 <a href="http://thoughtbuzz.in/Feedback_system/index.php/questions/index/0">
                    <i class="material-icons">web</i>
                    <span class="nav-text">Question Bank</span>
                  </a>
                 
                </li>
				<?php } if($user_type == 3 || $user_type == 1 || $user_type == 0){?>
				<li class="bold" id="Poll_voting1" >
                 <a href="http://thoughtbuzz.in/Feedback_system/index.php/poll_voting/index/0">
                    <i class="material-icons">web</i>
                    <span class="nav-text">Poll Questions</span>
                  </a>
                 
                </li>
                <li class="bold" id="Employees1" >
                  <a href="http://thoughtbuzz.in/Feedback_system/index.php/employees/index/0">
                    <i class="material-icons">cast</i>
                    <span class="nav-text">Employees</span>
                  </a>
                 
                </li>
				<?php } if(  $user_type == 1 || $user_type == 0){?>
               <li class="bold" id="HR_Profile1">
                  <a href="http://thoughtbuzz.in/Feedback_system/index.php/hr_profile/index/0">
                    <i class="material-icons">invert_colors</i>
                    <span class="nav-text">HR Profile </span>
                  </a>
                 
                </li>
				 <?php } if( $user_type == 3 ||  $user_type == 0){?>
                <li class="bold" id="Team1">
                  <a href="http://thoughtbuzz.in/Feedback_system/index.php/team/index/0">
                    <i class="material-icons">invert_colors</i>
                    <span class="nav-text">Team </span>
                  </a>
                 
                </li>
				<?php } if($user_type == 2 || $user_type == 3 ){?>
				<li class="bold" id="Quiz1">
                  <a href="http://thoughtbuzz.in/Feedback_system/index.php/quiz/index/0">
                    <i class="material-icons">invert_colors</i>
                    <span class="nav-text"> Question</span>
                  </a>
                 
                </li>
				<li class="bold" id="Poll1">
                  <a href="http://thoughtbuzz.in/Feedback_system/index.php/poll_quiz/index/0">
                    <i class="material-icons">invert_colors</i>
                    <span class="nav-text"> Poll</span>
                  </a>
                 
                </li>
				<?php } if($user_type == 3 || $user_type == 1 || $user_type == 0){?>
                <li class="bold" id="Login_History1">
                  <a href="http://thoughtbuzz.in/Feedback_system/index.php/login_history/index/0">
                    <i class="material-icons">photo_filter</i>
                    <span class="nav-text">Login History</span>
                  </a>
                 
                </li>
                <li class="bold" id="Reports1" style="display:none">
                  <a class="collapsible-header waves-cyan">
                    <i class="material-icons">library_add</i>
                    <span class="nav-text">Reports</span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li>
                       <a href="http://thoughtbuzz.in/Feedback_system/index.php/reports/index/0">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span>Team </span>
                        </a>
                      </li>
                      <li>
                        <a href="http://thoughtbuzz.in/Feedback_system/index.php/reports/index/0">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span>Departments </span>
                        </a>
                      </li>
                      <li>
                        <a href="http://thoughtbuzz.in/Feedback_system/index.php/reports/index/0">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span>Organization </span>
                        </a>
                      </li>
                     <li>
                        <a href="http://thoughtbuzz.in/Feedback_system/index.php/reports/index/0">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span>Comparison </span>
                        </a>
                      </li>
				<?php } ?>
                    </ul>
                  </div>
                </li>
               </ul>
            </li>
           
             </ul>
          <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-light hide-on-large-only">
            <i class="material-icons">menu</i>
          </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->