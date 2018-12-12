<?php defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="../../../vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
<script src="../../../vendors/custom/jquery.min.js"></script>
<script src="../../../vendors/custom/bootstrap.min.js"></script>
<link href="../../../vendors/custom/bootstrap.min.css" rel="stylesheet" />
<script src="../../../vendors/custom/bootstrap-select.min.js"></script>
<link href="../../../vendors/custom/bootstrap-select.min.css" rel="stylesheet" />
<!-- START CONTENT -->
        <section id="content">
          <!--start container-->
          <div class="container">
		  
		   
		   
		    <div class="section">
              <p class="caption">Team & employee</p>
              <div class="divider"></div>
              <!--Basic Form-->
              <div id="basic-form" class="section">
                <div class="row">
                  <div class="col s12 m12 l6">
                    <div class="card-panel" style="height: 237px;">
                      <h4>Add Team Details</h4>
					  </br>
					  
                      <div class="row">
					  
                        		   <?php  
           if(isset($user_data))  
           {  
                foreach($user_data->result() as $row)  
                {  
           ?>  <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/team/savingdata/<?php echo $row->id; ?>">
                     
                      <div class="row">
					  
					  
           
                         <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="Enter the Team Name" class="form-control" id="team" name="team"type="text" value="<?php echo $row->team; ?>" class="validate" required>
                          
                        </div>
                        
          
                <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />  
               
                
           <?php       
                }  
           }  
           else  
           {  
           ?>  <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/team/savingdata/">
		    <div class="row">
                      <?php $user_type = $this->session->userdata('user_type');
					  
					  if($user_type==0){
						 // echo "xxxxxxxxxxxxxxx";
					  ?>
					  
					    <input  name="org_id" type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" >
							
					  <?php }elseif($user_type==3){  ?>

                     <input  name="org_id" type="hidden" value="<?php echo $this->session->userdata('org_id'); ?>" >

					  <?php }  else{  ?>
					   <div class="input-field col s12">
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
                     
                        <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="Enter the Team Name" id="team" name="team"type="text" class="validate" required>
                          
                        </div>
                       
						
                     
					  
		   <?php } ?> </div>
					   <div class="input-field col s12" >
                          <div class="input-field col s12 right">
                            <input class="btn cyan waves-light right" type="submit" name="Add" value="Add">
                               
                          </div>
                        </div>
                    </form>
					
                      </div>
                    </div>
					</br>
                  </div>
                  <!-- Form with placeholder -->
                  <div class="col s12 m12 l6">
                    <div class="card-panel">
                      <h4 >Assign employee & HR to Team </h4>
                      <div class="row">
                        <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/team/savingteamdata/">
                          <div class="row">
                            <div class="input-field col s12">
                              <select class="form-control selectpicker" id="employee_id" name="employee_id"  data-live-search="true">
                              
                             <?php 
                                  //echo "<pre>".print_r($teams,1)."</pre>";
			           
						 foreach($employees as $row)
			            { 
			              echo '<option data-tokens="'.$row->name .'" value="'.$row->id .'" >'.$row->name .'</option>';
			            }
			            ?>
                             
                            </select>
                              <label for="first_name">Team</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <select class="form-control selectpicker" id="teamsid" name="teamsid[]" multiple required data-live-search="true">
                              
                             <?php 
                                  //echo "<pre>".print_r($teams,1)."</pre>";
			            foreach($teams as $row)
			            { 
			              echo '<option data-tokens="'.$row->team .'" value="'.$row->team .'">'.$row->team .'</option>';
			            }
			            ?>
                             
                            </select>
                              <label for="email">Employee</label>
                            </div>
                          </div>
                         
                          <div class="row">
                            
                            <div class="row">
                              <div class="input-field col s12">
                                <button class="btn cyan waves-light right" type="submit" name="action">Submit
                                  <i class="material-icons right">send</i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
			  
			  
			  
			  
			  
			  
             
              </div>
            
		   
		   
		  
		  
		   <!--DataTables example-->
              <div id="table-datatables">
                <h4 class="header">Team list</h4>
                <div class="row">
                 
                  <div class="col s12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                      <thead>
                        <tr>
						<th><h4>Organization Name</h4></th>
                          <th><h4>Team Name</h4></th>
                          <th><h4>Edit</h4></th>
                          <th><h4>Delete</h4></th>
                         
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
						<td><h4><?php 
						  $this->db->select("name"); 
						  $this->db->where("id", $row->org_id);  
                          $query = $this->db->get("organization"); 
						  
						   echo $query->result()[0]->name; ?></h4></td>
                          <td><h4><?php echo $row->team; ?></h4></td>
						  
                          <td><a class="waves-light green btn" href="<?php echo base_url(); ?>index.php/team/update_data/<?php echo $row->id; ?>" > Edit</a></td>
                          <td><a class="waves-light red btn" href="<?php echo base_url(); ?>index.php/team/delete_data/<?php echo $row->id; ?>"> Delete</a></td>
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
                     window.location="<?php echo base_url(); ?>team/delete_data/"+id;  
                }  
                else  
                {  
                     return false;  
                }  
           });  
      });  
      </script>  
      
       <script>  
      $(function() {
  $('#Categories1').addClass('active');
});
      </script> 
	  


<script type="text/javascript">
        $(document).ready(function() {
            var arr = new Array();
            $("select[multiple]").change(function() {
                $(this).find("option:selected")
                if ($(this).find("option:selected").length > 4) {
                    $(this).find("option").removeAttr("selected");
                    $(this).val(arr);
					 alert('You can select upto 4 Team only');
                }
                else {
                    arr = new Array();
                    $(this).find("option:selected").each(function(index, item) {
                        arr.push($(item).val());
                    });
                }
            });
        });
    </script>