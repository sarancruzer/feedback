<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_type = $this->session->userdata('user_type');

if($user_type==0){
$org_id = $this->session->userdata('user_id');
}else{
	$org_id = $this->session->userdata('org_id');
}
?>
<script src="../../../vendors/custom/jquery.min.js"></script>
<script src="../../../vendors/custom/bootstrap.min.js"></script>
<link href="../../../vendors/custom/bootstrap.min.css" rel="stylesheet" />
<script src="../../../vendors/custom/bootstrap-select.min.js"></script>
<link href="../../../vendors/custom/bootstrap-select.min.css" rel="stylesheet" />
<!-- START CONTENT -->

        <section id="content">
		<ul id="profile-dropdowns" style="margin-left: 950px;width: 100px;height: 70px; display: none;  position: absolute; background: white;z-index: 1;">
              <li style="height: 40px;">
                <a href="http://thoughtbuzz.in/Feedback_system/index.php/profile/index/0" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Profile</a>
              </li>
              
              <li>
                <a href="http://thoughtbuzz.in/Feedback_system/" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Logout</a>
              </li>
            </ul>
          <!--start container-->
          <div class="container">
		  
		   <!--card stats start-->
            <div id="card-stats">
             
            </div>
           
				<!--work collections start-->
            <div id="work-collections">
              <div class="row">
                <div class="col s12 m12 l6">
                  <ul id="projects-collection" class="collection z-depth-1" style="background: white;">
                    <li class="collection-item avatar">
                      <i class="material-icons cyan circle">card_travel</i>
                      <h2 class="collection-header m-0" style="position: absolute;top: 28px; font-size: 27px;">Department & team  performance </h2>
                      
                    </li>
					<?php  if($user_type == 1){?>
                    <h3 style="margin-left: 44px;margin-top: 18px;position: absolute;">Organization</h3>
					<h3 style="margin-left: 235px;    margin-bottom: -15px;position: absolute;margin-top: 17px;">Departments & teams</h3>
					
					<div class="input-field col s3" style="width: 224px; margin-left: -7px; margin-top: 58px; position: inherit;">
                           
     <select onChange="getOrganization(this.value);" name="org_id"  class="form-control selectpicker org_id" data-live-search="true" required>
                              <option value="000">Select Organization</option>
                             <?php 
                                  //echo "<pre>".print_r($teams,1)."</pre>";
			            foreach($organization as $row)
			            { 
			              echo '<option value="'.$row->id .'">'.$row->name .'</option>';
			            }
			            ?>
                             
                            </select>
                             
                            </div>
					<div class="input-field col s3" style="width: 308px; margin-left: 200px; margin-top: -34px; position: inherit;">
                          
                         <?php 
                                  //echo "<pre>".print_r($groups,1)."</pre>"; ?>
                          <style>
						select.bs-select-hidden, select.selectpicker {
							display: block !important;
						}
					  .input-field select {
						  display: block !important;
						position: inherit !important;
						width: 252px !important;
						pointer-events: all !important;
						height: 38px !important;
						top: 0 !important;
						left: 9px !important;
						opacity: 0 !important;
					}

					  
					  </style>
          
							
							<select  name="category" id="state-list" onChange="drawChartteam(this.options[this.selectedIndex].value)" class="form-control" data-live-search="true" style="opacity: 1 !important;">
						  <option value="">Select Team or Department</option>
						  </select>
                           
                        </div>
						
						
						<div class="input-field col s3" style="display:none; width: 328px; position: absolute; margin-top: -34px;     margin-left: 708px;">
                          
                         <?php 
                                  //echo "<pre>".print_r($groups,1)."</pre>"; ?>
                         
              <select  id="dep-list" onChange="drawChartdepartment(this.options[this.selectedIndex].value)" class="form-control" data-live-search="true" style="opacity: 1 !important;">
                              <option value="">Select Department</option>
                             
                            </select>
                           
                        </div>
						</br>
						</br>
						</br>
						</br>
						</br>
						</br>
					<?php }else{ ?>
					<h3 style="margin-left: 149px;    margin-bottom: -15px;position: absolute;margin-top: 17px;">Departments & teams</h3>
					<div class="input-field col s3" style="width: 308px; margin-left: 119px; margin-top: 54px; position: inherit;">
                          
                         <?php 
                                  //echo "<pre>".print_r($groups,1)."</pre>"; ?>
                          <style>
						select.bs-select-hidden, select.selectpicker {
							display: block !important;
						}
					  .input-field select {
						  display: block !important;
						position: inherit !important;
						width: 252px !important;
						pointer-events: all !important;
						height: 38px !important;
						top: 0 !important;
						left: 9px !important;
						opacity: 0 !important;
					}

					  
					  </style>
          
							
							<select  name="category" id="state-list" onChange="drawChartteam(this.options[this.selectedIndex].value)" class="form-control" data-live-search="true" style="opacity: 1 !important;">
						  <option value="">Select Team or Department</option>
						  </select>
                           
                        </div>
						
						
						<div class="input-field col s3" style="display:none; width: 328px; position: absolute; margin-top: -34px;     margin-left: 708px;">
                          
                         <?php 
                                  //echo "<pre>".print_r($groups,1)."</pre>"; ?>
                         
              <select  id="dep-list" onChange="drawChartdepartment(this.options[this.selectedIndex].value)" class="form-control" data-live-search="true" style="opacity: 1 !important;">
                              <option value="">Select Department</option>
                             
                            </select>
                           
                        </div>
						</br>
						</br>
						</br>
						</br>
						</br>
						</br>
					<?php } ?>
					 <div id="bar_chart" style="padding: 17px;"></div>
					
                  </ul>
                </div>
                <div class="col s12 m12 l6">
                  <ul id="issues-collection" class="collection z-depth-1" style="background: white;">
                    <li class="collection-item avatar">
                      <i class="material-icons red accent-2 circle">bug_report</i>
					  
                      <h2 class="collection-header m-0" style="position: absolute;top: 28px; font-size: 27px;">(YES or No) category performance </h2>
                     
                    </li>
					<?php  if($user_type == 1){?>
						<h3 style="margin-left: 48px; margin-top: 18px;">Organization</h3>
					<h3 style="margin-left: 273px; position: absolute;margin-top: -36px;">Questions</h3>
					<div class="input-field col s3" style="width: 186px; margin-left: 25px; margin-top: 4px; position: inherit;">
                           
                              <select onChange="getqus(this.value);" name="org_id"  class="form-control selectpicker" data-live-search="true" required>
                              <option value="000">Select Organization</option>
                             <?php 
                                  //echo "<pre>".print_r($teams,1)."</pre>";
			            foreach($organization as $row)
			            { 
			              echo '<option value="'.$row->id .'">'.$row->name .'</option>';
			            }
			            ?>
                             
                            </select>
                             
                            </div>
					
                    	<div class="input-field col s8" style="width: 230px; margin-left: 205px; position: absolute;     margin-top: 3px;">
                      
                
                         <select  id="qus-list" onChange="drawChartqus(this.options[this.selectedIndex].value)" class="form-control" data-live-search="true" style="opacity: 1 !important;width: 230px !important;">
                              <option value="">Select Questions</option>
                             
                            </select>
                        </div>
						</br>
						</br>
						</br>
						</br>
						</br>
						
					<?php }else{ ?>
					<h3 style="margin-left: 202px; position: absolute;margin-top: 12px;">Questions</h3>
					<div class="input-field col s8" style="width: 230px; margin-left: 136px; position: absolute;     margin-top: 49px;">
                      
                
                         <select  id="qus-list" onChange="drawChartqus(this.options[this.selectedIndex].value)" class="form-control" data-live-search="true" style="opacity: 1 !important;width: 230px !important;">
                              <option value="">Select Questions</option>
                             
                            </select>
                        </div>
						</br>
						</br>
						</br>
						</br>
						</br>
						</br>
						</br>
					<?php } ?>
                   <div id="chart_div"></div>
                   
                 
                  </ul>
                </div>
               </div>
            </div>
            <!--work collections end-->
			
			
			
				<!--work collections start-->
           
              <div id="work-collections">
              <div class="row">
                <div class="col s12 m12 l6">
                  <ul id="issues-collection" class="collection z-depth-1" style="background: white;">
                    <li class="collection-item avatar">
                      <i class="material-icons red accent-2 circle">bug_report</i>
                      <h2 class="collection-header m-0" style="position: absolute;top: 28px; font-size: 27px;">Polls charts </h2>
                     
                    </li>
                    	<div class="input-field col s8">
                          <?php  if($user_type == 1){?>
                       <h3 style="margin-left: 50px; margin-top: -5px;">Organization</h3>
					<h3 style="margin-left: 305px;margin-bottom: -73px;position: absolute;margin-top: -36px;">Questions</h3>
					<div class="input-field col s3" style="width: 186px; margin-left: 25px; margin-top: 17px; position: inherit;">
                           
                              <select onChange="getqus2(this.value);" name="org_id"  class="form-control selectpicker" data-live-search="true" required>
                              <option value="000">Select Organization</option>
                             <?php 
                                  //echo "<pre>".print_r($teams,1)."</pre>";
			            foreach($organization as $row)
			            { 
			              echo '<option value="'.$row->id .'">'.$row->name .'</option>';
			            }
			            ?>
                             
                            </select>
                             
                            </div>
					
                    	<div class="input-field col s8" style="width: 230px; margin-left: 230px; position: absolute;     margin-top: 16px;">
                         
						   
						   <select  id="qus-list2" onChange="drawChartpollsearch(this.options[this.selectedIndex].value)" class="form-control" data-live-search="true" style="opacity: 1 !important;width: 230px !important;">
                              <option value="">Select Questions</option>
                             
                            </select>
						   
						   
                        </div>
						</br>
						</br>
						</br>
						</br>
						</br>
						
						  <?php }else{ ?>
					<h3 style="margin-left: 189px;margin-bottom: -73px;position: absolute;margin-top: -5px;">Questions</h3>
					<div class="input-field col s8" style="width: 230px; margin-left: 110px; position: absolute;     margin-top: 32px;">
                         
						   
						   <select  id="qus-list2" onChange="drawChartpollsearch(this.options[this.selectedIndex].value)" class="form-control" data-live-search="true" style="opacity: 1 !important;width: 230px !important;">
                              <option value="">Select Questions</option>
                             
                            </select>
						   
						   
                        </div>
						</br>
						</br>
						</br>
						</br>
						</br>
						  <?php } ?>
                   <div id="chart_div2"></div>
                   
                 
                  </ul>
                </div>
              
            
            <!--work collections end-->
			
			
			
			<!--work collections start-->
           
              
                <div class="col s12 m12 l6">
                  <ul id="issues-collection" class="collection z-depth-1" style="background: white;">
                    <li class="collection-item avatar">
                      <i class="material-icons red accent-2 circle">bug_report</i>
                      <h2 class="collection-header m-0" style="position: absolute;top: 28px; font-size: 27px;">Comparison charts </h2>
                     
                    </li>
                    	<div class="input-field col s8">
                          <?php  if($user_type == 1){?>
                     <h3 style="margin-left: 9px;margin-top: -4px;position: absolute;">Organization</h3>
					<h3 style="margin-left: 212px;margin-top: -5px;">Bar 1</h3>
					<h3 style="margin-left: 381px;margin-bottom: -73px;position: absolute;margin-top: -34px; width: 64px;">Bar 2</h3>
					<button class="btn cyan waves-light" onclick="drawChartgroup2()" style="margin-left: 91px;margin-bottom: -73px;position: absolute;margin-top: 65px;background: green;color: white;">Compare</button>
					<div class="input-field col s3" style="width: 173px; margin-left: -10px; margin-top: 13px; position: inherit;">
                           
                              <select onChange="getOrganization33(this.value);" name="org_id"  class="form-control selectpicker" data-live-search="true" required>
                              <option value="000">Select Organization</option>
                             <?php 
                                  //echo "<pre>".print_r($teams,1)."</pre>";
			            foreach($organization as $row)
			            { 
			              echo '<option value="'.$row->id .'">'.$row->name .'</option>';
			            }
			            ?>
                             
                            </select>
                             
                            </div>
					<div class="input-field col s3" style="width: 173px; margin-left: 139px; margin-top: -34px; position: inherit;">
                       
          
							
							<select  name="category" id="bar1" class="form-control" data-live-search="true" style="opacity: 1 !important;width: 173px !important;">
						  <option value="">Select Bar 1</option>
						  </select>
                           
                        </div>
						
						
						<div class="input-field col s3" style="width: 173px; position: absolute; margin-top: 11px;     margin-left: 330px;">
                          
                         <?php 
                                  //echo "<pre>".print_r($groups,1)."</pre>"; ?>
                         
              <select  id="bar2"  class="form-control" data-live-search="true" style="opacity: 1 !important;width: 173px !important;">
                              <option value="">Select Bar 2</option>
                             
                            </select>
                           
                        </div>
						</br>
						</br>
						</br>
						</br>
						</br>
						<?php } else{ ?>
						<h3 style="margin-left: 105px;margin-top: -5px;">Bar 1</h3>
					<h3 style="margin-left: 339px;margin-bottom: -73px;position: absolute;margin-top: -34px; width: 64px;">Bar 2</h3>
					<button class="btn cyan waves-light" onclick="drawChartgroup2()" style="margin-left: 91px;margin-bottom: -73px;position: absolute;margin-top: 65px;background: green;color: white;">Compare</button>
							<div class="input-field col s3" style="width: 173px; margin-left: 28px; margin-top: 11px; position: inherit;">
                       
          
							
							<select  name="category" id="bar1" class="form-control" data-live-search="true" style="opacity: 1 !important;width: 173px !important;">
						  <option value="">Select Bar 1</option>
						  </select>
                           
                        </div>
						
						
						<div class="input-field col s3" style="width: 173px; position: absolute; margin-top: 11px;     margin-left: 266px;">
                          
                         <?php 
                                  //echo "<pre>".print_r($groups,1)."</pre>"; ?>
                         
              <select  id="bar2"  class="form-control" data-live-search="true" style="opacity: 1 !important;width: 173px !important;">
                              <option value="">Select Bar 2</option>
                             
                            </select>
                           
                        </div>
						</br>
						</br>
						</br>
						</br>
						</br>
						<?php } ?>
                   <div id="chart_divgroup" ></div>
                   
                 
                  </ul>
                </div>
              </div>
              </div>
              </div>
			  
            <!--work collections end-->
			
			
		
		   <!-- //////////////////////////////////////////////////////////////////////////// -->
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
		 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		 
		 
		 	<?php  if($user_type != 1){?>
			<script type="text/javascript">
			$(document).ready(function($){
			  getOrganization(<?php echo $org_id; ?>);
			  getqus(<?php echo $org_id; ?>)
			  getqus2(<?php echo $org_id; ?>);
			  getOrganization33(<?php echo $org_id; ?>)
			});

      </script>  
	  
			<?php } ?>
  
    <script type="text/javascript">
      // Load the Visualization API and the line package.
      google.charts.load('current', {'packages':['bar']});
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart1);
  
    function drawChart1(category_id) {
  
       
        var dataString = 'category_id=' + category_id;
        $.ajax({
        type: 'POST',
        url: "http://thoughtbuzz.in/Feedback_system/index.php/charts/getdata/0?"+dataString,
		data: dataString,
		
          
        success: function (data1) {
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable();
  
      data.addColumn('string', 'Category');
      data.addColumn('number', 'Value');
     
        
      var jsonData = $.parseJSON(data1);
      
      for (var i = 0; i < jsonData.length; i++) {
            data.addRow([jsonData[i].category_id+' ('+jsonData[i].test+')', parseFloat(jsonData[i].quiz_value)]);
      }
	  var formatter = new google.visualization.NumberFormat({
      pattern: '#,##0.0'
    });
      var options = {
        chart: {
          title: '',
          subtitle: ''
        },
    axes: {
            y: {
                all: {
                    range: {
                        max: 5,
                        min: 0
                    }
                }
            },
            
        },
		hAxis: {
		  format: '#,##0.00000'
		},
        bars: 'vertical', // Required for Material Bar Charts.
        width: 500,
        height: 350
         
      };
      var chart = new google.charts.Bar(document.getElementById('bar_chart2'));
      chart.draw(data, options);
	  var chart2 = new google.charts.Bar(document.getElementById('bar_chart2'));
      chart2.draw(data, options);
       }
     });
    }
	
	
	  function drawChartteam(category_id) {
  
       
        var dataString = 'team=' + category_id;
        $.ajax({
        type: 'POST',
        url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/getdatateam/0?"+dataString,
		data: dataString,
		
          
        success: function (data1) {
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable();
  
      data.addColumn('string', 'Category');
      data.addColumn('number', 'Value');
     
        
      var jsonData = $.parseJSON(data1);
      
      for (var i = 0; i < jsonData.length; i++) {
            data.addRow([jsonData[i].category_id+' ('+jsonData[i].test+')', parseFloat(jsonData[i].quiz_value)]);
      }
	  var formatter = new google.visualization.NumberFormat({
      pattern: '#,##0.0'
    });
      var options = {
        chart: {
          title: '',
          subtitle: ''
        },
      axes: {
            y: {
                all: {
                    range: {
                        max: 5,
                        min: 0
                    }
                }
            },
            
        },
		hAxis: {
		  format: '#,##0.00000'
		},
        bars: 'vertical', // Required for Material Bar Charts.
        width: 500,
        height: 350
         
      };
      var chart = new google.charts.Bar(document.getElementById('bar_chart'));
      chart.draw(data, options);
	  var chart2 = new google.charts.Bar(document.getElementById('bar_chart2'));
      chart2.draw(data, options);
       }
     });
    }
	


	
	
	  function drawChartdepartment(category_id) {
  
       
        var dataString = 'department=' + category_id;
        $.ajax({
        type: 'POST',
        url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/getdatadepartment/0?"+dataString,
		data: dataString,
		
          
        success: function (data1) {
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable();
  
      data.addColumn('string', 'Category');
      data.addColumn('number', 'Value');
     
        
      var jsonData = $.parseJSON(data1);
      
      for (var i = 0; i < jsonData.length; i++) {
            data.addRow([jsonData[i].category_id+' ('+jsonData[i].test+')', parseFloat(jsonData[i].quiz_value)]);
      }
	  
	var formatter = new google.visualization.NumberFormat({
      pattern: '#,##0.0'
    });
     formatter.format(data, 1);
      var options = {
        chart: {
          title: '',
          subtitle: ''
        },
        axes: {
            y: {
                all: {
                    range: {
                        max: 5,
                        min: 0
                    }
                }
            },
            
        },
		hAxis: {
		  format: '#,##0.00000'
		},
        bars: 'vertical', // Required for Material Bar Charts.
        width: 500,
        height: 350
         
      };
      var chart = new google.charts.Bar(document.getElementById('bar_chart'));
      chart.draw(data, options);
	  var chart2 = new google.charts.Bar(document.getElementById('bar_chart2'));
      chart2.draw(data, options);
       }
     });
    }
	
	
  </script>
  
  <script type="text/javascript"> 
     
    // Load the Visualization API and the piechart package. 
    google.charts.load('current', {'packages':['corechart']}); 
       
    // Set a callback to run when the Google Visualization API is loaded. 
    google.charts.setOnLoadCallback(drawChart2); 
       
    function drawChart2(category_id) { 
	
	     
        var dataString = 'category_id=' + category_id;
      var jsonData = $.ajax({ 
          url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/get_all_yes_no/0?"+dataString, 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
// create color map
  var colors = {
    'YES': 'green',
    'No': 'red',
  };

  // build slices
  var slices = [];
  for (var i = 0; i < data.getNumberOfRows(); i++) {
    slices.push({
      color: colors[data.getValue(i, 0)]
    });
  }
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.PieChart(document.getElementById('chart_div1')); 
      chart.draw(data, {width: 500, height: 368,slices: slices}); 
    } 
	
	
	
	
	function drawChartqus(category_id) { 
	
	     
        var dataString = 'category_id=' + category_id;
      var jsonData = $.ajax({ 
          url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/get_all_yes_no_qus/0?"+dataString, 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
// create color map
  var colors = {
    'YES': 'green',
    'No': 'red',
  };

  // build slices
  var slices = [];
  for (var i = 0; i < data.getNumberOfRows(); i++) {
    slices.push({
      color: colors[data.getValue(i, 0)]
    });
  }
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.PieChart(document.getElementById('chart_div')); 
      chart.draw(data, {width: 500, height: 368,slices: slices}); 
    } 
 
    </script> 
	
	
	
	  <script type="text/javascript"> 
     
    // Load the Visualization API and the piechart package. 
    google.charts.load('current', {'packages':['corechart']}); 
       
    // Set a callback to run when the Google Visualization API is loaded. 
    google.charts.setOnLoadCallback(drawChartpoll); 
       
    function drawChartpoll(category_id) { 
	
	     
        var dataString = 'category_id=' + category_id;
      var jsonData = $.ajax({ 
          url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/get_all_yes_no_poll/0?"+dataString, 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
// create color map
  var colors = {
    'YES': 'green',
    'No': 'red',
  };

  // build slices
  var slices = [];
  for (var i = 0; i < data.getNumberOfRows(); i++) {
    slices.push({
      color: colors[data.getValue(i, 0)]
    });
  }
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.PieChart(document.getElementById('chart_div22')); 
      chart.draw(data, {width: 500, height: 368,slices: slices}); 
    } 
	
	
	
	function drawChartpollsearch(category_id) { 
	
	     
        var dataString = 'category_id=' + category_id;
      var jsonData = $.ajax({ 
          url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/get_all_yes_no_pollsearch/0?"+dataString, 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
// create color map
  var colors = {
    'YES': 'green',
    'No': 'red',
  };

  // build slices
  var slices = [];
  for (var i = 0; i < data.getNumberOfRows(); i++) {
    slices.push({
      color: colors[data.getValue(i, 0)]
    });
  }
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.PieChart(document.getElementById('chart_div2')); 
      chart.draw(data, {width: 500, height: 368,slices: slices}); 
    } 
 
    </script> 
  
  
  
	 <script>  
	 		$(".profile-button").click(function(){
    $("#profile-dropdowns").show();
});

$('.container').click(function(){
    $('#profile-dropdowns').hide();
    
})
	 
	 
      $(function() {
  $('#dashboard1').addClass('active');
});


function getOrganization(val) {
			//getdep(val);
			$.ajax({
			type: "POST",
			url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/getteamanddep/0?Organization_id="+val,
			data:'Organization_id='+val,
			success: function(data){
				$("#state-list").html(data);
				
			}
			});
		}

function getdep(val) {
			
			$.ajax({
			type: "POST",
			url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/getdep/0?Organization_id="+val,
			data:'Organization_id='+val,
			success: function(data){
				$("#dep-list").html(data);
				
			}
			});
		}
	function getqus(val) {
			
			$.ajax({
			type: "POST",
			url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/getqus/0?Organization_id="+val,
			data:'Organization_id='+val,
			success: function(data){
				$("#qus-list").html(data);
				
			}
			});
		}	
		
		
	function getqus2(val) {
			
			$.ajax({
			type: "POST",
			url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/getquspoll/0?Organization_id="+val,
			data:'Organization_id='+val,
			success: function(data){
				$("#qus-list2").html(data);
				
			}
			});
		}	
			

	google.charts.load('current', {
    callback: drawChartgroup,
    packages: ['corechart']
  });

  function drawChartgroup() {
    var data = google.visualization.arrayToDataTable([
      ['Category ', 'Bar 1', 'Bar 2'],
	   ['Leadership (1)',  2,      5],
          ['Power (1)',  3,      2],
          ['Security (1)',  4,       1],
          ['Strength (1)',  5,      3]
      
    ]);

    var options = {
      title: 'Organization',
     
	   axes: {
            y: {
                all: {
                    range: {
                        max: 5,
                        min: 0
                    }
                }
            },
            
        },
        bars: 'vertical', // Required for Material Bar Charts.
        width: 500,
        height: 350
	  
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_divgroups'));
    chart.draw(data, options);
  }	
			
		
function getOrganization33(val) {
			//getdep33(val);
			$.ajax({
			type: "POST",
			url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/getteamanddep/0?Organization_id="+val,
			data:'Organization_id='+val,
			success: function(data){
				$("#bar1").html(data);
				$("#bar2").html(data);
				
			}
			});
		}

function getdep33(val) {
			
			$.ajax({
			type: "POST",
			url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/getdep/0?Organization_id="+val,
			data:'Organization_id='+val,
			success: function(data){
				$("#dep-list33").html(data);
				
			}
			});
		}
		
		
		 function drawChartgroup2() {
			 var bar1 = $('select#bar1 option:selected').val();
			 var bar2 = $('select#bar2 option:selected').val();
			 var dataString = 'category_id=' + bar1;
			
			 $.ajax({
        type: 'POST',
        url: "http://thoughtbuzz.in/Feedback_system/index.php/dashboard/getcompere/0?bar1="+bar1+"&bar2="+bar2,
		data: dataString,
		
          
        success: function (data1) {
	 
	  var data = new google.visualization.DataTable();
  
      data.addColumn('string', 'Category');
      data.addColumn('number', bar1);
      data.addColumn('number', bar2);
       
      var jsonData = $.parseJSON(data1);
      
      for (var i = 0; i < jsonData.length; i++) {
            data.addRow([jsonData[i].category_id, parseFloat(jsonData[i].bar1), parseFloat(jsonData[i].bar2)]);
      }
	  //+"("+jsonData[i].test+","+jsonData[i].test2+")"
	  var formatter = new google.visualization.NumberFormat({
      pattern: '#,##0.0'
    });
      var options = {
        chart: {
          title: '',
          subtitle: ''
        },
          axes: {
            y: {
                all: {
                    range: {
                        max: 5,
                        min: 0
                    }
                }
            },
            
        },
		hAxis: {
		  format: '#,##0.00000'
		},
        bars: 'vertical', // Required for Material Bar Charts.
        width: 500,
        height: 350
         
      };
      var chart = new google.charts.Bar(document.getElementById('chart_divgroup'));
      chart.draw(data, options);
       }
     });
    

    
	
  }	
		  
      </script>  
	  
	  
	  
	