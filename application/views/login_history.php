<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link href="../../vendors/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet">
<!-- START CONTENT -->
        <section id="content">
          <!--start container-->
          <div class="container">
		  
		  
		  <!--DataTables example-->
              <div id="table-datatables">
                <h4 class="header">Login History</h4>
                <div class="row">
                 
                  <div class="col s12">
                    <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                      <thead>
                        <tr>
						  
                          <th>Username</th>
						  <th>Email</th>
						  <th>Mobile #</th>
                          <th>Position</th>
                          <th>Login Date</th>
                         
                         
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
						
                          <th>Username</th>
						  <th>Email</th>
						  <th>Mobile #</th>
                          <th>Position</th>
                          <th>Login Date</th>
                          
                        </tr>
                      </tfoot>
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
						  <td><?php echo $row->mobile_number; ?></td>
						  <td><?php echo $row->department; ?></td>
                          <td><?php echo $row->login_date_time; ?></td>
						  
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
      $(function() {
  $('#Login_History1').addClass('active');
});
      </script> 
