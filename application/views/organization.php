<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 $user_id = $this->session->userdata('user_id');?>


<style>
#backdrop {
  display: none;
  position: absolute;
  top: 0;
  left: 0;
  height: 550px;
  width: 100%;
  background: rgba(0, 0, 0, 0.3);
  z-index: 10;
   overflow: auto; /* Enable scroll if needed */
}

#modal {
  display: none;
  position: absolute;
 left: calc(27% - 100px);
  top: calc(32% - 100px);
  height: 550px;
  width: 1063px;
  background: #fff;
  text-align: center;
  z-index: 11;
   overflow: auto; /* Enable scroll if needed */
}
</style>

 

<div id="modal">
<button id="closeModal" class="btn-floating waves-light gradient-45deg-red-pink gradient-shadow right"><i class="material-icons">clear</i></button>
  <iframe width="1023px" height="900px" id="calendar" src="about:blank"  name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" >
    </iframe>
  
</div>
<div id="backdrop"></div>


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
           ?>  <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/organization/savingdata/<?php echo $row->id; ?>">
                      <h4 class="header2">Organization</h4>
                      <div class="row">
           
                         <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="John Doe" id="name" name="name"type="text" value="<?php echo $row->name; ?>" class="validate" required>
                          <label for="icon_prefix">Company Name</label>
                          <span class="card-content purple-text"><?php echo form_error("name"); ?></span> 
                        </div>
                        <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="CVR 02455" id="cvr_number" value="<?php echo $row->cvr_number; ?>" name="cvr_number" type="text" class="validate" required>
                          <label for="icon_email">CVR Number</label>
                          <span class="card-content purple-text"><?php echo form_error("cvr_number"); ?></span> 
                        </div>
						<div class="input-field col s4">
                          <i class="material-icons prefix">email</i>
                          <input placeholder="john@mydomain.com" id="email" value="<?php echo $row->email; ?>" name="email" type="email" class="validate" required>
                          <label for="icon_email">Email</label>
                        </div>
						
						
						<div class="input-field col s4">
                          <i class="material-icons prefix">call</i>
                          <input placeholder="1236547890" id="mobile_number" value="<?php echo $row->mobile_number; ?>" name="mobile_number" type="text" class="validate" required>
                          <label for="icon_email">Mobile Number</label>
                          <span class="card-content purple-text"><?php echo form_error("mobile_number"); ?></span> 
                        </div>
						
          
                <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />  
               
                
           <?php       
                }  
           }  
           else  
           {  
           ?>  <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/organization/savingdata/">
                      <h4 class="header2">Organization</h4>
                      <div class="row">
                        <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="John Doe" id="name" name="name"type="text" class="validate" required>
                          <label for="icon_prefix">Company Name</label>
                          <span class="card-content purple-text"><?php echo form_error("name"); ?></span>  
                        </div>
                        <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="CVR 02455" id="cvr_number" name="cvr_number" type="text" class="validate" required>
                          <label for="icon_email">CVR Number</label>
                          <span class="card-content purple-text"><?php echo form_error("cvr_number"); ?></span>  
                        </div>
						<div class="input-field col s4">
                          <i class="material-icons prefix">email</i>
                          <input placeholder="john@mydomain.com" id="email" name="email" type="email" class="validate" required>
                          <label for="icon_email">Email</label>
                        </div>
						
						
						<div class="input-field col s4">
                          <i class="material-icons prefix">call</i>
                          <input placeholder="1236547890" id="mobile_number" name="mobile_number" type="text" class="validate" required>
                          <label for="icon_email">Mobile Number</label>
                           <span class="card-content purple-text"><?php echo form_error("mobile_number"); ?></span>  
                        </div>
						
                     
					  
		   <?php } ?> </div>
		   <?php echo form_error("name"); ?>
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
                <h4 class="header">ORGANIZATION LIST</h4>
                <div class="row">
                 
                  <div class="col s12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Name</th>
						  <th>CVR Number</th>
                          <th>Email</th>
						  <th>Mobile Number</th>
						  <th style="display:none">Employee</th>
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
						  <td><?php echo $row->cvr_number; ?></td>
                          <td><?php echo $row->email; ?></td>
                          
                          
						   <td><?php echo $row->mobile_number; ?></td>
						   <td style="display:none"><a class="test" onclick="go('http://thoughtbuzz.in/Feedback_system/index.php/employees2/index/<?php echo $row->id; ?>')" >Add Employee</a></td>
						   
						   
						   
						   
						   
						   
                          <td><a class="waves-light green btn" href="<?php echo base_url(); ?>index.php/organization/update_data/<?php echo $row->id; ?>" > Edit</a></td>
                          <td><a class="waves-light red btn" href="<?php echo base_url(); ?>index.php/organization/delete_data/<?php echo $row->id; ?>"> Delete</a></td>
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
           $('.delete_data').click(function(){  
                var id = $(this).attr("id");  
                if(confirm("Are you sure you want to delete this?"))  
                {  
                     window.location="<?php echo base_url(); ?>organization/delete_data/"+id;  
                }  
                else  
                {  
                     return false;  
                }  
           });  
      });  
      </script>  
	  
	  <script>
$('.test').click(function() {
  var backdropHeight = $(document).height();
  $('#backdrop').css('height', backdropHeight);
  $('#backdrop').fadeIn(100, function() {
    $('#modal').fadeIn(200);
  });
});

$('#closeModal').click(function() {
  $('#modal').fadeOut(200, function() {
    $('#backdrop').fadeOut(100);
  });
});
</script>
 <script>  
      $(function() {
  $('#Organization1').addClass('active');
});



      </script>  
	  
	<script>
  function go(loc) {
	  //alert("jsdih");
	 $('#calendar').attr('src', loc);
  }
  </script>  
	  