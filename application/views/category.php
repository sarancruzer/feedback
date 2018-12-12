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
           ?>  <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/category/savingdata/<?php echo $row->id; ?>">
                      <h4 class="header2">Category Details</h4>
                      <div class="row">
           
	
		   
		   
		   
                         <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="John Doe" id="category" name="category"type="text" value="<?php echo $row->category; ?>" class="validate" required>
                          <label for="icon_prefix">Category Name</label>
                        </div>
                        
          
                <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />  
               
                
           <?php       
                }  
           }  
           else  
           {  
           ?>  <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/category/savingdata/">
                      <h4 class="header2">Category Details</h4>
                      <div class="row">
					  
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
		   
					  
					  
                        <div class="input-field col s4">
                          <i class="material-icons prefix">account_circle</i>
                          <input placeholder="John Doe" id="category" name="category"type="text" class="validate" required>
                          <label for="icon_prefix">Category Name</label>
                        </div>
                       
						
                     
					  
		   <?php } ?> </div>
					   <div class="input-field col s12" >
                          <div class="input-field col s12 right">
                            <input class="btn cyan waves-light" type="submit" name="Add" value="Add">
                               
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
		  
		  
		   <!--DataTables example-->
              <div id="table-datatables">
                <h4 class="header">Categories list</h4>
                <div class="row">
                 
                  <div class="col s12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Category Name</th>
						  <th>Organization Name</th>
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
								
								//echo "<pre>".print_r($row,1)."</pre>";
						   ?>  
					  
                        <tr>
                          <td><?php echo $row->category; ?></td>
						  
						  <td><?php 
						  $this->db->select("name"); 
						  $this->db->where("id", $row->org_id);  
                          $query = $this->db->get("organization"); 
						  
						   echo $query->result()[0]->name; ?></td>
						  
                          <td><a class="waves-light green btn" href="<?php echo base_url(); ?>index.php/category/update_data/<?php echo $row->id; ?>" ><i class="material-icons left">settings_backup_restore</i> Edit</a></td>
                          <td><a class="waves-light red btn" href="<?php echo base_url(); ?>index.php/category/delete_data/<?php echo $row->id; ?>"><i class="material-icons right">gps_fixed</i> Delete</a></td>
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
                     window.location="<?php echo base_url(); ?>category/delete_data/"+id;  
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