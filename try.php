<html>
	<?php

	include "php/connector.php";

	$date = isset($_POST["dailydate"]) ? $_POST["dailydate"] : false;
	$buttonDaily = isset($_POST["ButtonDaily"]) ? $_POST["ButtonDaily"] : false;
	
   
	
    //echo "Data: ".$date."</br>";
    //echo $buttonDaily."</br>";
    


    if($buttonDaily == 'faculty')
    {
    	$picker = isset($_POST["picker"]) ? $_POST["picker"] : false;
    	//echo $picker."</br>";	
    	$input = isset($_POST["input"]) ? $_POST["input"] :false;
    	//echo $input."</br>";

    }
    else
    {
    	$options = isset($_POST["options"]) ? $_POST["options"] : false;
    	$college = isset($_POST["college"]) ? $_POST["college"] : false;
    	$department = isset($_POST["department"]) ? $_POST["department"] : false;
    	//echo $options."</br>";
    	//echo $college."</br>";
    	//echo $department."</br>";
    }

    // echo "<script>
    //             window.location.replace('../generatedaily-all.html');
    //         </script>";

?>
	<head>
		<meta charset = "UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<title> Daily Faculty Report - All </title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/generatedaily-all.css">
		<link rel="stylesheet" href="css/dashboard.css">
		<link rel="stylesheet" type="text/css" href="css/daterangepicker.css"/>
		<!-- DROPDOWN-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src = "js/jquery-3.0.0.min.js"></script>
    	<!-- Include all compiled plugins (below), or include individual files as needed -->
    	<script src="js/bootstrap.min.js"></script>

    	<script type="text/javascript">
		    $("[rel='tooltip']").tooltip();    
			    $('.thumbnail').hover(
			        function(){
			            $(this).find('.caption').slideDown(500); //.fadeIn(250)
			        },
			        function(){
			            $(this).find('.caption').slideUp(250); //.fadeOut(205)
			        }
			    ); 
		</script>

		<script type="text/javascript">
				var $table = $('#resulttable');

		$(function () {
		    $table.on('post-body.bs.table', function () {
		        $table.bootstrapTable('mergeCells', {
		            index: 0,
		            field: 'picture',
		            rowspan: 7
		        });
		    });
		});
		</script>

    </head>

    <body>
    	<nav class="navbar navbar-default" role="navigation">
    	  <div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <div class="navbar-brand navbar-brand-centered">FAMS</div>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="navbar-brand-centered">
			      <ul class="nav navbar-nav">
			        <li><a href="dashboard.html"><b>Maintenance</b></a></li>
			        <li><a href="dashboard-reports.html"><b>Reports</b></a></li>		
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        
			        <li><a href="index.html"><b>Log Out</b></a></li>		        
			      </ul>
			    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<div class = "container">
			<h5 id="title-header">Daily Faculty Attendance Summary Report 
				<p style = "float:right">	      
					<a href="http://youtu.be/zJahlKPCL9g" class="navbar-btn btn-success btn" style = "margin-top:-5px;">
				     <span class="glyphicon glyphicon-print"></span> PRINT </a> &nbsp;

			      	<a href="http://youtu.be/zJahlKPCL9g" class="navbar-btn btn-success btn" style = "margin-top:-5px;">
			      	<span class="glyphicon glyphicon-envelope"></span> EMAIL  </a>
			     </p>
			</h5>
			<div class = "row">
				<div class ="box col-md-12">
					<div class="box-inner">

						<div class = "row">
							<br>
							<p class = "col-xs-1"></p>
							<p class = "col-xs-1">To:</p>
							<p class = "col-xs-2"><b>Registrar</b></p>
							<p class = "col-xs-4"></p>
							<p class = "col-xs-1"> </p>
							<p class = "col-xs-2 text-right"> <b> <?php echo $date; ?> </b> </p>
						</div>

						<div class = "row">
							<br>
							<p class = "col-xs-1"></p>
							<p class = "col-xs-1">Term:</p>
							<p class = "col-xs-4">1st Trimester, AY 2016-2017</p>
							<p class = "col-xs-2"></p>
							<p class = "col-xs-1"> </p>
							<p class = "col-xs-2 text-right"> 
								<b> 
									<?php //$dw = date( "w", $date);
										//if($dw == 0)
											echo "Sunday";
									?> 
								</b> </p>
 
						</div>
						<br>

					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class ="box col-md-12">
						<div class="box-content">
							<table id="resulttable" class="table table-bordered table-striped table-condensed">
								<thead class="collegelabel">
									<tr>
										<th colspan ="7">College of Computer Studies</th>	
									</tr>
								</thead>
								<thead id = "col-header">
									<tr>
										<th>Department</th>
										<th>Faculty</th>
										<th>Time</th>
										<th>Course</th>
										<th>Section</th>
										<th>Room</th>
										<th>Remarks</th>
									</tr>
								</thead>
								<tbody>
									<tr class="row-data" data-href="#">
										<?php
											$stmt = $conn->prepare("SELECT department,first_name,middle_name,last_name,time_start,time_end,section,remarks, room_id,course_id
																	FROM (SELECT department,first_name,middle_name,last_name,time_start,time_end,C.section,room_id,C.id as 'offering_id', course_id
																			  FROM faculty F
																			  INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																	INNER JOIN attendance A on A.courseoffering_id = Y.offering_id;");

    										$stmt->execute(["user_name" => $username, "password" => $password]);
										

										?>
										<td>Sofware Technology</td>
										<td>SAMSON, BRIANE PAUL V.</td>
										<td>09:15 - 10:45</td>
										<td>SOFENGG</td>
										<td>S17</td>
										<td>G203</td>
										<td>VACANT ROOM</td>
									</tr>
									<tr class="row-data" data-href="#">
										<td> </td>
										<td>ONG, ETHEL</td>
										<td>12:45 - 14:15</td>
										<td>INTRODB</td>
										<td>S18A</td>
										<td>G209</td>
										<td>LATE</td>
									</tr>
									<tr class="row-data" data-href="#">
										<td> </td>
										<td>SAMSON, BRIANE PAUL V.</td>
										<td>09:15 - 10:45</td>
										<td>SOFENGG</td>
										<td>S17</td>
										<td>G203</td>
										<td>VACANT ROOM</td>
									</tr>
									<tr class="row-data" data-href="#">
										<td> </td>
										<td>ONG, ETHEL</td>
										<td>12:45 - 14:15</td>
										<td>SOFENGG</td>
										<td>S18A</td>
										<td>G209</td>
										<td>LATE</td>
									</tr>

									<tr class="row-data" data-href="#">
										<td>Information Technology</td>
										<td>SAMSON, BRIANE PAUL V.</td>
										<td>09:15 - 10:45</td>
										<td>SOFENGG</td>
										<td>S17</td>
										<td>G203</td>
										<td>VACANT ROOM</td>
									</tr>
									<tr class="row-data" data-href="#">
										<td> </td>
										<td>ONG, ETHEL</td>
										<td>12:45 - 14:15</td>
										<td>INTRODB</td>
										<td>S18A</td>
										<td>G209</td>
										<td>LATE</td>
									</tr>
									<tr class="row-data" data-href="#">
										<td> </td>
										<td>SAMSON, BRIANE PAUL V.</td>
										<td>09:15 - 10:45</td>
										<td>SOFENGG</td>
										<td>S17</td>
										<td>G203</td>
										<td>VACANT ROOM</td>
									</tr>
									<tr class="row-data" data-href="#">
										<td> </td>
										<td>ONG, ETHEL</td>
										<td>12:45 - 14:15</td>
										<td>SOFENGG</td>
										<td>S18A</td>
										<td>G209</td>
										<td>LATE</td>
									</tr>
								</tbody>
							</table>
						</div>
				</div>
			</div>
    	</div>

    </body>

</html>