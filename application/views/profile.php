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
                    
					  
					   <?php  
           if(isset($user_data))  
           {  
	           
                foreach($user_data->result() as $row)  
                {  
				//echo "<pre>".print_r($row,1)."</pre>";
				
           ?>  <form class="col s12" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/profile/savingdata/<?php echo $row->id; ?>">
                      <h4 class="header2">Profile Details</h4>
                      <div class="row">
           
	
		   
		   
		   
                         <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="John Doe" id="name" name="name"type="text" value="<?php echo $row->name; ?>" class="validate" required>
                          <label for="icon_prefix">Name</label>
                        </div>
						
						   <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="John Doe" disabled="disabled" id="email" name="email"type="text" value="<?php echo $row->email; ?>" class="validate" required>
                          <label for="icon_prefix">Email</label>
                        </div>
						
						  <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Enter Password" class="validate" >
                          <label for="icon_prefix">New Password</label>
                        </div>
						
						  <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input type="password" name="confirm_password" id="confirm_password" value="<?php echo set_value('confirm_password'); ?>" placeholder="Confirm Password" class="validate" >
                          <label for="icon_prefix">Confirm Password</label>
						  <span id='message'></span>
                        </div>
						
						 <div class="input-field col s4">
						 
                          
						  
                          <input type="file" name="file" class="validate" />
						  
                          <label for="icon_prefix" style="margin-bottom: 12px;position: inherit;">Select Profile Photo</label>
						  
                        </div>
						
						 
						
                        
          
                <input type="hidden" name="user_id" value="<?php echo $row->id; ?>" />  
               
                
           <?php       
                }  
            } ?> </div>
					   <div class="input-field col s12" >
                          <div class="input-field col s12 right">
                            <input class="btn cyan waves-light" type="submit" name="Add" value="Update">
                               
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
		  
		  
		
		  
		  
		   <!-- //////////////////////////////////////////////////////////////////////////// -->
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
<script>  
      $(document).ready(function(){  
           $('.delete_data').click(function(){  
                var id = $(this).attr("id");  
                if(confirm("Are you sure you want to delete this?"))  
                {  
                     window.location="<?php echo base_url(); ?>category/delete_data/"+id;  
                }  
                else  
                {  
                     return false;  
                }  
           });  
      });  
	  
	  
	  $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
	  
      </script>  
      
    