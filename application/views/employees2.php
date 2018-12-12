<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$org_id = $this->uri->segment(3); 
?>
 <!-- CORE CSS-->
    <link href="../../../css/themes/fixed-menu/materialize.css" type="text/css" rel="stylesheet">
    <link href="../../../css/themes/fixed-menu/style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="../../../css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="../../../vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="../../../vendors/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet">
    <link href="../../../vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
    
    <link href="../../vendors/prism/prism.css" type="text/css" rel="stylesheet">
    <!--prism -->
    <script type="text/javascript" src="../../vendors/prism/prism.js"></script>
    <link href="../../vendors/jquery.nestable/nestable.css" type="text/css" rel="stylesheet">
    
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
 <!--custom-script.js - Add your own theme custom JS-->    
 <script type="text/javascript" src="../../../js/custom-script.js"></script> 
                       <?php $message = $this->session->flashdata('update');
                         $message2 = $this->session->flashdata('SUSS');
                       if($message !=""){  ?>
                      <div id="card-alert" class="card orange">
                    <div class="card-content white-text">
                      <p> <i class="material-icons">warning</i>  <?php echo $message = $this->session->flashdata('update'); ?></p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php } 
                  if($message2 !=""){  ?>
                   <div id="card-alert" class="card gradient-45deg-green-teal">
                    <div class="card-content white-text">
                      <p>
                        <i class="material-icons">check</i> <?php echo $message2 = $this->session->flashdata('SUSS'); ?></p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <?php } ?>
<link href="../../../vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
  <style>
   .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}
ol, ul {
    margin-top: 0;
    margin-bottom: 10px;
}

.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
    color: #fff;
    text-decoration: none;
    background-color: #337ab7;
    outline: 0;
}
.dropdown-menu>li>a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
}
   </style>
    <script src="../../../js/bootstrap3-typeahead.min.js"></script>  
<!-- START CONTENT -->
        <section id="content">
          <!--start container-->
          <div class="container">
		  <h4 class="header">Employee ADD</h4>
		   <!-- Inline form with placeholder -->
            <div class="row">
              <div class="col s12 m12 l12">
                <div class="card-panel">
                  <div class="row">
                    
					  
					   <?php  
           if(isset($user_data))  
           {  
                foreach($user_data->result() as $row)  
                {  
           ?>  <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/employees2/savingdata/<?php echo $row->id; ?>">
                      <h4 class="header2">Employees</h4>
                      <div class="row">
           
                         <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="John Doe" id="name" name="name"type="text" value="<?php echo $row->name; ?>" class="validate" required>
                          <label for="icon_prefix">Name</label>
                        </div>
                        <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="CVR 02455" id="cvr_number" value="<?php echo $row->email; ?>" name="email" type="text" class="validate" required>
                          <label for="icon_email">Email</label>
                        </div>
						<div class="input-field col s4">
                          <i class="material-icons prefix">email</i>
                          <input autocomplete="off" id="department" value="<?php echo $row->department; ?>" name="department" type="text" class="typeahead validate" required>
                          <label for="icon_email">Department</label>
                        </div>
						
						
						<div class="input-field col s4">
                          <i class="material-icons prefix">call</i>
                          <input placeholder="1236547890" id="designation" value="<?php echo $row->designation; ?>" name="designation" type="text" class="validate" required>
                          <label for="icon_email">Designation</label>
                        </div>
						
						<div class="input-field col s4">
                          <i class="material-icons prefix">call</i>
                          <input placeholder="1236547890" id="mobile_number" value="<?php echo $row->mobile_number; ?>" name="mobile_number" type="text" class="validate" required>
                          <label for="icon_email">Mobile Number</label>
                        </div>
						
          
                <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />  
               
                
           <?php       
                }  
           }  
           else  
           {  
           ?>  <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/employees2/savingdata/">
                      <h4 class="header2">Employees</h4>
                      <div class="row">
                        <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="John Doe" id="name" name="name"type="text" class="validate" required>
                          <label for="icon_prefix">Name</label>
                        </div>
                        <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="xx@gmail.com" id="email" name="email" type="email" class="validate" required>
                          <label for="icon_email">Email</label>
                        </div>
						<div class="input-field col s4">
                          <i class="material-icons prefix">email</i>
                          <input placeholder="department" autocomplete="off" id="department" name="department" type="text" class="typeahead validate" required>
                          <label for="icon_email">Department</label>
                        </div>
						
						
						<div class="input-field col s4">
                          <i class="material-icons prefix">call</i>
                          <input placeholder="1236547890" id="designation" name="designation" type="text" class="validate" required>
                          <label for="icon_email">Designation</label>
                        </div>
						
							<div class="input-field col s4">
                          <i class="material-icons prefix">call</i>
                          <input placeholder="1236547890" id="mobile_number" name="mobile_number" type="text" class="validate" required>
                          <label for="icon_email">Mobile Number</label>
                        </div>
						
                     
					  
		   <?php } ?> </div>
					   <div class="input-field col s12" >
                          <div class="input-field col s12 right">
                            <input class="btn cyan waves-light" type="submit" name="Register" value="Add">
                                <a class="waves-light  btn" id="IMPORT">IMPORT</a>
                                
                          </div>
							  
                        </div>
                    </form>
			 <div class="right">
			 Download sample csv file	  
			<a class="dropdown-button btn-floating btn-large waves-light" href="http://thoughtbuzz.in/Feedback_system/sample.csv" data-activates="dropdown2">
                        <i class="material-icons">vertical_align_bottom</i>
                      </a>			  
			  </div>		
                  </div>
                 
				  <br>
					<form action="<?php echo site_url("employees2/upload_file");?>" method="post" enctype="multipart/form-data" id="importFrm" style="display:none">
                <input type="file" name="file" />
				<input type="hidden" name="org_id" value="<?php echo $org_id; ?>" >
                <input type="submit" class="btn btn-primary" name="importSubmit" value="Upload">
            </form>
                </div>
              </div>
            </div>
		  
		  
		   <!--DataTables example-->
              <div id="table-datatables">
                <h4 class="header">Employees list</h4>
                <div class="row">
                 
                  <div class="col s12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Name</th>
						  <th>Email</th>
						  <th>Department</th>
                          <th>Designation</th>
						  <th>Mobile Number</th>
                          <th>Edit</th>
                          <th>Delete</th>
                         
                        </tr>
                      </thead>
                      
                      <tbody>
					  
					   <?php  
						   if($fetch_data->num_rows() > 0)  
						   {  
								foreach($fetch_data->result() as $row)  
								{  
						   ?>  
					  
                        <tr>
                          <td><?php echo $row->name; ?></td>
						  <td><?php echo $row->email; ?></td>
                          <td><?php echo $row->department; ?></td>
						  <td><?php echo $row->designation; ?></td>
						   <td><?php echo $row->mobile_number; ?></td>
                          <td><a class="waves-light  " href="<?php echo base_url(); ?>index.php/employees2/update_data/<?php echo $row->id; ?>" >Edit</a></td>
                          <td><a class="waves-light  " href="<?php echo base_url(); ?>index.php/employees2/delete_data/<?php echo $row->id; ?>">Delete</a></td>
                        </tr>
                         <?php       
                }  
           }  
           else  
           {  
           ?>  
                <tr>  
                        <td >No Data Found</td> 
						<td >No Data Found</td> 
						<td >No Data Found</td> 
						<td >No Data Found</td>
                        <td >No Data Found</td> 
						<td >No Data Found</td> 
                        <td >No Data Found</td> 						
					 
                </tr>  
           <?php  
           }  
           ?>  
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <br>
		  
		  
		   <!-- //////////////////////////////////////////////////////////////////////////// -->
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
<script>  
      $(document).ready(function(){  
           $('#IMPORT').click(function(){  
                
			 
              $("#importFrm").show();
				
           });  
      });  
      </script>  
	  <script type="text/javascript">
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get('<?php echo base_url(); ?>index.php/employees/getDepartmentname/', { query: query }, function (data) {
                console.log(data);
                data = $.parseJSON(data);
                return process(data);
            });
        }
    });
</script>  