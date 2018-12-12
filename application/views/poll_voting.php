<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="../../../vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
<!-- START CONTENT -->
        <section id="content">
          <!--start container-->
          <div class="container">
		  
		   <!-- Inline form with placeholder -->
            <div class="row">
              <div class="col s12 m12 l12">
                <div class="card-panel">
                  <div class="row">
                    
					  
			  <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/poll_voting/savingdata/">
                      <h4 class="header2">Poll Details</h4>
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
                              <select   name="org_id"  data-error=".errorTxt6"  aria-required="true" aria-describedby="crole-error" aria-invalid="true" required>
                              
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
					  <?php } ?>
					  
                       <div class="input-field col s8">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="" id="subject" name="subject"type="text" class="validate" required>
                          <label for="icon_prefix">Poll Questions</label>
                        </div>
              		
                        
                        
						
                     
					  
		    </div>
					   <div class="input-field col s12" >
                          <div class="input-field col s12 right">
                            <input class="btn cyan waves-light" type="submit" name="Register" value="Add">
                               
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
		  
		
		   <!--DataTables example-->
              <div id="table-datatables">
                <h4 class="header">   Poll Questions list</h4>
                <div class="row">
                 
                  <div class="col s12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                      <thead>
                        <tr>
						<th>Organization Name</th>
                          <th>Poll Questions</th>
	                      <th>Push</th>
						  <th>Status</th>
						  <th>Active</th>
						  <th>Inactive</th>
                         
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
						<td><?php 
						  $this->db->select("name"); 
						  $this->db->where("id", $row->org_id);  
                          $query = $this->db->get("organization"); 
						  
						   echo $query->result()[0]->name; ?></td>
                          <td><?php echo $row->questions; ?></td>
						  
						   <td><?php  if($row->status_quc ==0){ ?><a class="btn-floating waves-light gradient-45deg-green-teal gradient-shadow" href="<?php echo base_url(); ?>index.php/poll_cron/?question_id=<?php echo $row->id; ?>" ><i class="material-icons">launch</i></a>
						   
						   
						  <?php }else{
							 echo "Already pushed"; 
						  } ?>
						   
						   
						   </td>
						  
						  <td><?php  if($row->status_quc ==0){
							  echo "active";
						  }else{
							 echo "inactive"; 
						  } ?></td>
						  <td><a class="btn-floating waves-light gradient-45deg-green-teal gradient-shadow" href="<?php echo base_url(); ?>index.php/poll_voting/active/<?php echo $row->id; ?>" ><i class="material-icons">done</i></a></td>
						  <td><a class="btn-floating waves-light gradient-45deg-red-pink gradient-shadow" href="<?php echo base_url(); ?>index.php/poll_voting/inactive/<?php echo $row->id; ?>" ><i class="material-icons">clear</i></a></td>
                         
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
     
	  
	  
	  $('select').on('change', function() {
		 // alert( this.value );
		  if( this.value=='YES_or_No'){
			  $("#Rating").hide();
             // $("#YES_or_No").show();			  
		  }
		  if( this.value=='Rating'){
			   $("#Rating").show();
              $("#YES_or_No").hide();
		  } 
		  
		});
      </script> 

<script>  
     
	  
	  $('#leavel_type').on('change', function() {
		
		  
		   if( this.value=='Levelone'){
			   
			   $("#Rating1").show();
			    $("#leavel").show();
               $("#Rating2").hide();
			   $("#Rating3").hide();
		  }
		  
		  if( this.value=='Leveltwo'){
			   $("#Rating2").show();
			    $("#leavel").show();
               $("#Rating1").hide();
			   $("#Rating3").hide();
		  }
		  
		  if( this.value=='Levelthree'){
			   $("#Rating3").show();
			    $("#leavel").show();
               $("#Rating2").hide();
			   $("#Rating1").hide();
		  }
		  
		  
		  
		  
		  
		  
		});
      </script> 

	  
       <script>  
      $(function() {
  $('#Poll_voting1').addClass('active');
});
      </script> 