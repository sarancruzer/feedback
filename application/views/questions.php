<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="../../../vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
<script src="../../../vendors/custom/jquery.min.js"></script>
<script src="../../../vendors/custom/bootstrap.min.js"></script>
<link href="../../../vendors/custom/bootstrap.min.css" rel="stylesheet" />
<script src="../../../vendors/custom/bootstrap-select.min.js"></script>
<link href="../../../vendors/custom/bootstrap-select.min.css" rel="stylesheet" />

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


<!-- START CONTENT -->
        <section id="content">
		 <ul id="profile-dropdowns" style="margin-left: 950px; width: 100px;height: 70px; display: none;  position: absolute; background: white;">
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
		   <?php 
			 $user_type = $this->session->userdata('user_type');
			if($user_type==1){ ?>
		   <!-- Inline form with placeholder -->
            <div class="row">
              <div class="col s12 m12 l12">
                <div class="card-panel">
                  <div class="row">
                   
					  
			  <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/questions/savingdata/">
                     
					  <h4 class="header2">Questions Details</h4>
                      <div class="row">
                      <?php $user_type = $this->session->userdata('user_type');
					  
					  if($user_type==0){
						 // echo "xxxxxxxxxxxxxxx";
					  ?>
					  
					    <input  name="org_id" type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" >
							
					  <?php }elseif($user_type==3){  ?>

                     <input  name="org_id" type="hidden" value="<?php echo $this->session->userdata('org_id'); ?>" >

					  <?php }  else{  ?>
					   <div class="input-field col s4">
                           <h4>Organization Name</h4>
                              <select onChange="getOrganization(this.value);" name="org_id"  class="form-control selectpicker" data-live-search="true" required>
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
					  <?php } ?>
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
                       <div class="input-field col s4">
                           <h4>Category Name</h4>
                         <?php 
                                  //echo "<pre>".print_r($groups,1)."</pre>"; ?>
                         
                          <select  name="category" id="state-list"  class="form-control" data-live-search="true" style="opacity: 1 !important;" required>
						  <option value="">Select category</option>
						  </select>
                              
                              
                             
                           
                          
                        </div>
                      <div class="input-field col s4">
                           <h4>Question Type</h4>
                          
                          <select  id="questions_type" name="questions_type"  class="form-control selectpicker" data-live-search="true" required>
                              <option value="" disabled="" selected="">Choose your questions type</option>
                              <option value="YES_or_No">YES or No</option>
                              <option value="Rating">Choose the best option</option>
                             
                            </select>
                          
                         
                          
                        </div>
                        <div class="input-field col s12">
                          <h4>Questions</h4>
                          <input placeholder="" id="questions" name="questions"type="text" class="validate" required>
                          
                        </div>
                       
                        
                        
                        
						
						
                        <div id='Rating' style="display:none">
						<input type="hidden" name="leavel_type" value="Level_one">
					
						
						
						
						
						
						
						
						<div id="leavel" ">
						
						<div class="input-field col s4">
                          <h4>First option</h4>
                          <input placeholder=""  name="leavel1"type="text" class="validate" id="11">
                          
                        </div>
						<div class="input-field col s4">
                          <h4> Second option</h4>
                          <input placeholder=""  name="leavel2"type="text" class="validate"id="22" >
                          
                        </div>
						<div class="input-field col s4">
                          <h4> Third option</h4>
                          <input placeholder=""  name="leavel3"type="text" class="validate" id="33" >
                          
                        </div>
						<div class="input-field col s4">
                           <h4> Fourth option</h4>
                          <input placeholder=""  name="leavel4"type="text" class="validate" id="44">
                         
                        </div>
						<div class="input-field col s4">
                           <h4>Fifth option</h4>
                          <input placeholder=""  name="leavel5"type="text" class="validate" id="55">
                         
                        </div>
						
						</div>
						
						
						
						</div>
                        
                        
						
                     
					  
		    </div> 
					   <div class="input-field col s12" >
                          <div class="input-field col s12 right">
                            <input class="btn cyan waves-light" type="submit" name="Register" value="Add">
                               <a class="waves-light  btn" id="IMPORT">IMPORT</a>
                          </div>
                        </div>
			
                    </form>
					 <div class="right">
			 Download sample csv file	  
			<a class="dropdown-button btn-floating btn-large waves-light" href="http://thoughtbuzz.in/Feedback_system/samplequestions.csv" data-activates="dropdown2">
                        <i class="material-icons">vertical_align_bottom</i>
                      </a>			  
			  </div>
                  </div>
				    <br>
					<form action="<?php echo site_url("questions/upload_file");?>" method="post" enctype="multipart/form-data" id="importFrm" style="display:none">
					<div class="row">
					
					<?php $user_type = $this->session->userdata('user_type');
					  
					  if($user_type==0){
						 // echo "xxxxxxxxxxxxxxx";
					  ?>
					  
					    <input  name="org_id" type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" >
							
					  <?php }elseif($user_type==3){  ?>

                     <input  name="org_id" type="hidden" value="<?php echo $this->session->userdata('org_id'); ?>" >

					  <?php }  else{  ?>
					<div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                              <select onChange="getOrganization2(this.value);" name="org_id"  class="form-control selectpicker" data-live-search="true" >
                              <option value="">Select Organization</option>
                             <?php 
                                  //echo "<pre>".print_r($teams,1)."</pre>";
			            foreach($organization as $row)
			            { 
			              echo '<option value="'.$row->id .'">'.$row->name .'</option>';
			            }
			            ?>
                             
                            </select>
                              <label for="email">Organization Name</label>
                        </div>
						<div class="input-field col s4">
						<select  name="category" id="state-listimp"  class="form-control" data-live-search="true" style="opacity: 1 !important;" required>
						  <option value="">Select category</option>
						  </select>
						</div>
						
					  <?php } ?>
						
					  <div class="input-field col s4">
                         
                <input type="file" name="file" />
				 
                            </div>
                
				
				</div>
				</br>
				</br>
				</br>
				</br>
				<input type="submit" class="btn btn-primary" name="importSubmit" value="Upload">
            </form>
                </div>
              </div>
            </div>
		  <?php } ?>
		
		   <!--DataTables example-->
              <div id="table-datatables">
                <h4 class="header">Questions list</h4>
                <div class="row">
                 
                  <div class="col s12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                      <thead>
                        <tr>
						<th>Organization Name</th>
                          <th>Questions</th>
						  <th>Questions Type</th>
						  <th>Category</th>
                         
						  <th>Status</th>
						  <?php 
			 $user_type = $this->session->userdata('user_type');
			if($user_type==1){ ?>
						  <th>Active</th>
						  <th>Inactive</th>
			<?php } ?>
                         
                        </tr>
                      </thead>
                      
                      <tbody>
					  
					   <?php  
						   if($fetch_data->num_rows() > 0)  
						   {  
								foreach($fetch_data->result() as $row)  
								{  
						   ?>  
					  
                        <tr style="height: 77px;">
						<td><?php 
						  $this->db->select("name"); 
						  $this->db->where("id", $row->org_id);  
                          $query = $this->db->get("organization"); 
						  
						   echo $query->result()[0]->name; ?></td>
                          <td><?php echo $row->questions; ?></td>
						  <td><?php echo $row->questions_type; ?></td>
						  <td><?php echo $row->category_id; ?></td>
						  
						  <td><?php  if($row->status_quc ==0){
							  echo "active";
						  }else{
							 echo "inactive"; 
						  } ?></td>
						  <?php 
			 $user_type = $this->session->userdata('user_type');
			if($user_type==1){ ?>
						  <td><a class="btn-floating waves-light gradient-45deg-green-teal gradient-shadow" href="<?php echo base_url(); ?>index.php/questions/active/<?php echo $row->id; ?>" ><i class="material-icons">done</i></a></td>
						  <td><a class="btn-floating waves-light gradient-45deg-red-pink gradient-shadow" href="<?php echo base_url(); ?>index.php/questions/inactive/<?php echo $row->id; ?>" ><i class="material-icons">clear</i></a></td>
			<?php } ?>
                         
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
						<?php 
			 $user_type = $this->session->userdata('user_type');
			if($user_type==1){ ?>
						<td >No Data Found</td> 
						<td >No Data Found</td> 
						<td >No Data Found</td> 
			<?php } ?>
												
					 
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


	$(".profile-button").click(function(){
    $("#profile-dropdowns").show();
});

$('.container').click(function(){
    $('#profile-dropdowns').hide();
    
})


	  
	  $('select').on('change', function() {
		// alert( this.value );
		  if( this.value=='YES_or_No'){
			  $("#Rating").hide();
             // $("#YES_or_No").show();	
                $("#11").removeAttr('required'); 
				$("#22").removeAttr('required'); 
				$("#33").removeAttr('required');  
				$("#44").removeAttr('required'); 
				$("#55").removeAttr('required'); 			 
		  }
		  if( this.value=='Rating'){
			   $("#Rating").show();
              $("#YES_or_No").hide();
			    $("#11").attr('required', ''); 
				$("#22").attr('required', ''); 
				$("#33").attr('required', '');  
				$("#44").attr('required', ''); 
				$("#55").attr('required', '');  			  
		  } 
		  
		});
      </script> 

<script>  
     
	  
	  $('#leavel_type').on('change', function() {
		
		  
		   if( this.value=='Level_one'){
			   
			   $("#Rating1").show();
			    $("#leavel").show();
               $("#Rating2").hide();
			   $("#Rating3").hide();
		  }
		  
		  if( this.value=='Level_two'){
			   $("#Rating2").show();
			    $("#leavel").show();
               $("#Rating1").hide();
			   $("#Rating3").hide();
		  }
		  
		  if( this.value=='Level_three'){
			   $("#Rating3").show();
			    $("#leavel").show();
               $("#Rating2").hide();
			   $("#Rating1").hide();
		  }
		  
		  
		  
		  
		  
		  
		});
		
		
		
		function getOrganization(val) {
			
			$.ajax({
			type: "POST",
			url: "http://thoughtbuzz.in/Feedback_system/index.php/questions/getcat/0?Organization_id="+val,
			data:'Organization_id='+val,
			success: function(data){
				$("#state-list").html(data);
				
			}
			});
		}
		
		function getOrganization2(val) {
			
			$.ajax({
			type: "POST",
			url: "http://thoughtbuzz.in/Feedback_system/index.php/questions/getcat/0?Organization_id="+val,
			data:'Organization_id='+val,
			success: function(data){
				$("#state-listimp").html(data);
				
			}
			});
		}

		
		$(document).ready(function(){  
           $('#IMPORT').click(function(){  
                
			 
              $("#importFrm").show();
				
           });  
      })
		
      </script> 

	  
       <script>  
      $(function() {
  $('#Questions1').addClass('active');
});
      </script> 