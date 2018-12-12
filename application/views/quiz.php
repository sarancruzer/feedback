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
              <div class="col s12 m12 l6">
                <div class="card-panel">
                  <div class="row">
                    
					  
		  <form class="col s12" method="post" action="<?php echo base_url(); ?>index.php/quiz/savingdata/">
                      <h4 class="header2">Questions</h4>
                      <div class="row">
					  
					   <?php  
						   if($fetch_data->num_rows() > 0)  
						   {  
					   //echo "<pre>".print_r($fetch_data,1)."</pre>";
					   $i=0;
								foreach($fetch_data->result() as $row)  
								{ 
                                $i++;								
								
								//echo $row->questions."</br>";
						   ?>  
					  
                        <div class="input-field col s12" id="test<?php echo $i?>" >
                          <input  id="question_id" name="question_id[]" type="hidden" value="<?php echo $row->question_id; ?>"  required>
                          <label for="icon_prefix"><?php echo $row->questions; ?></label>
						  
						 <?php if($row->questions_type=='Rating'){ 
						 
						 
						// echo "<pre>".print_r($row,1)."</pre>";
						 
						 ?>
						
                          </br>
						   </br>
						  <span class="rating">
						   <input id="rating5" type="radio" name="quiz_value[<?php echo $row->question_id; ?>]" value="1">
							  <label for="rating5">	<?php echo $row->leavel1 ?></label>
							   </br>
							    <input id="rating4" type="radio" name="quiz_value[<?php echo $row->question_id; ?>]" value="2">
							  <label for="rating4"><?php echo $row->leavel2 ?></label>
							  </br>
							   <input id="rating3" type="radio" name="quiz_value[<?php echo $row->question_id; ?>]" value="3">
							  <label for="rating3"><?php echo $row->leavel3 ?></label>
							  </br>
							   <input id="rating2" type="radio" name="quiz_value[<?php echo $row->question_id; ?>]" value="4">
							  <label for="rating2"><?php echo $row->leavel4 ?></label>
							  </br>
							  <input id="rating1" type="radio" name="quiz_value[<?php echo $row->question_id; ?>]" value="5" checked>
							  <label for="rating1"><?php echo $row->leavel5 ?></label>
							  </br>
							  
							  
							  
							  
							   
							</span>
						  
						  <?php }else{ ?>
						   </br>
                            <p>
                              <input name="quiz_value[<?php echo $row->question_id; ?>]" type="radio" value="YES" />
                              <label for="gender_male">YES</label>
                            </p>
                            <p>
                              <input name="quiz_value[<?php echo $row->question_id; ?>]" checked="checked" type="radio" value="No" />
                              <label for="gender_female">No</label>
                            </p>
						  <?php }?> 
                        </div>
                       
						 <?php       
                }  
            
           
           ?>  
                    
					  
		    </div>
					   <div class="input-field col s12" >
					   
					      <div class="input-field col s12 right" >
                            <div class="btn cyan waves-light" style="display: none;" id="one1"> Next </div>
                            <div class="btn cyan waves-light" style="display: none;" id="two2"> Next </div>
							
                          </div>
						  
						  
					   
                          <div class="input-field col s12 right" id="finished">
                            <input class="btn cyan waves-light" type="submit" name="Add" value="submit">
                               
                          </div>
						  <?php       
                }  else{
            
           
           ?>  <h3 class="header2"> Today's Questions completed. Have a Great Day. </h3>
		  
				<?php } ?>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            
		  
		 
						   
	
		  
		  
		  <?php  
						 if($old_fetch_data->num_rows() > 0 ||  $old_fetch_data2->num_rows() > 0){   ?>
		  
                  <div class="col s12 m12 l6">
                    
                    <ul id="projects-collection" class="collection z-depth-1">
                      <li class="collection-item avatar">
                        <i class="material-icons cyan circle">card_travel</i>
                        <h6 class="collection-header m-0">Feedback System</h6>
                        <p>QUESTIONS</p>
                      </li>
					   <?php  
					        foreach($old_fetch_data->result() as $row){ ?>
                      <li class="collection-item">
                        <div class="row">
                          <div class="col s5">
                           <span class="task-cat cyan">Vestibulum lobortis Department :- <?php echo $row->department; ?> </span>
                          </div>
                          <div class="col s2">
                            <span class="task-cat cyan">Pending</span>
                          </div>
                          <div class="col s5">
						  <a class="waves-light green btn" href="<?php echo base_url(); ?>index.php/quiz/old_quiz/?quiz_date=<?php echo $row->quiz_date; ?>&department=<?php echo $row->department; ?>" > <?php echo $row->quiz_date ?></a>
                           
                          </div>
                        </div>
                      </li>
							<?php } ?>
							
						 <?php  
					        foreach($old_fetch_data2->result() as $row){ ?>
                      <li class="collection-item">
                        <div class="row">
                          <div class="col s5">
                           <span class="task-cat cyan">Vestibulum lobortis Team :- <?php echo $row->team; ?> </span>
                          </div>
                          <div class="col s2">
                            <span class="task-cat cyan">Pending</span>
                          </div>
                          <div class="col s5">
						  <a class="waves-light green btn" href="<?php echo base_url(); ?>index.php/quiz/old_quiz/?quiz_date=<?php echo $row->quiz_date; ?>&team=<?php echo $row->team; ?>" > <?php echo $row->quiz_date ?></a>
                           
                          </div>
                        </div>
                      </li>
							<?php } ?>	
							
                      
                    </ul>
                  </div>
				  
						 <?php } ?>
                  
                </div>
                
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		   <!-- //////////////////////////////////////////////////////////////////////////// -->
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
 
      
       <script>  
      $(function() {
  $('#Quiz1').addClass('active');
});
//finished
/* jQuery(document).ready(function(){
	$('#test1').toggle('show');
	$('#one1').toggle('show');
    $('#one1').click(function() {   	
         $('#test1').toggle('hide');
		 $('#one1').toggle('hide');
		 $('#test2').toggle('show');
		 $('#two2').toggle('show');
    });
	 $('#two2').click(function() {   	
         $('#two2').toggle('hide');
		 $('#test2').toggle('hide');
		 $('#test3').toggle('show');
		 $('#three3').toggle('show');
		 $('#finished').toggle('show');
    });
	
}); */


      </script> 