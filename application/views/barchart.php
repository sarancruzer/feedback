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
                    
					  
					  
					<div id="bar_chart"></div>  
					  
					  
					  
					  
		  
                  </div>
                </div>
              </div>
            </div>
		  
		  
	
              <br>
		  
		  
		   <!-- //////////////////////////////////////////////////////////////////////////// -->
          </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
    <script type="text/javascript">
      // Load the Visualization API and the line package.
      google.charts.load('current', {'packages':['bar']});
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);
  
    function drawChart() {
  
        $.ajax({
        type: 'POST',
        url: 'http://thoughtbuzz.in/Feedback_system/index.php/charts/getdata/0',
		
          
        success: function (data1) {
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable();
  
      data.addColumn('string', 'Category');
      data.addColumn('number', 'Value');
     
        
      var jsonData = $.parseJSON(data1);
      
      for (var i = 0; i < jsonData.length; i++) {
            data.addRow([jsonData[i].category_id, parseInt(jsonData[i].quiz_value)]);
      }
      var options = {
        chart: {
          title: 'Category Performance',
          subtitle: 'Show category and Ans of Company'
        },
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
         
      };
      var chart = new google.charts.Bar(document.getElementById('bar_chart'));
      chart.draw(data, options);
       }
     });
    }
  </script>
      
       <script>  
      $(function() {
  $('#Quiz1').addClass('active');
});
      </script> 