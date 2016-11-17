<html> 
	<?php

	include "php/connector.php";

	$buttons = isset($_POST["buttons"]) ? $_POST["buttons"] : "monthly/term";

   
	
    //echo "Data: ".$date."</br>";
    //echo $buttonDaily."</br>";
	
	if($buttons == 'daily') 
	{
		$date = isset($_POST["dailydate"]) ? $_POST["dailydate"] : false;
		$dates = explode("/",$date);
		$date = $dates[2]."-".$dates[0]."-".$dates[1]; 
		$dateFilter = "date = '".$date."' ";
	}
	else if($buttons == 'monthly')
	{
		$months = isset($_POST["months"]) ? $_POST["months"] : false;
		$years = isset($_POST["years"]) ? $_POST["years"] : false;

		switch($months)
		{
			case "January" : $months =1; $end = 31; break;
			case "February" : $months =2; 
			if(($year % 4 == 0) && ($years % 100 != 0) || ($years % 400 == 0))
				$end = 28; 
			else 
				$end =29; 
			break;
			case "March" : $months =3; $end = 31; break;
			case "April" : $months =4; $end = 30; break;
			case "May" : $months =5; $end = 31; break;
			case "June" : $months =6; $end = 30; break;
			case "July" : $months =7; $end = 31; break;
			case "August" : $months =8; $end = 31; break;
			case "September" : $months =9; $end = 30; break;
			case "October" : $months =10; $end = 31; break;
			case "November" : $months =11; $end = 30; break;
			case "December" : $months =12; $end = 31; break;
		}


		$date = $years."-".$months."-01"; 
		$date2 = $years."-".$months."-".$end; 

		$dateFilter = "date BETWEEN '".$date."' AND '".$date2."' "; 
	}
	else
	{
		$terms = isset($_POST["terms"]) ? $_POST["terms"] : false;
		$years = isset($_POST["academicyears"]) ? $_POST["academicyears"] : false;

		$stmt = $conn->prepare("SELECT * 
								FROM term INNER JOIN academicyear AY ON term.year_id = AY.id 
								WHERE term_no = :terms AND AY.name = :years;");

		$stmt->execute(["terms" => $terms, "years" =>$years]);
		

		$result = $stmt->execute();
		$rows = $stmt->fetch(PDO::FETCH_ASSOC); // assuming $result == true
									 
		$dateFilter = "date BETWEEN '".$rows['start']."' AND '".$rows['end']."' "; 

	}
		
	
	$options = isset($_POST["options"]) ? $_POST["options"] : false;

?>
	<head>
		<meta charset = "UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<title> Daily Faculty Report - All </title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/add-AY.css">
		<link rel="stylesheet" href="css/generatedaily-all.css">
		<link rel="stylesheet" href="css/dashboard.css">
		<link rel="stylesheet" type="text/css" href="css/daterangepicker.css"/>
		<!-- DROPDOWN-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
		<!-- FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
		<!-- DROPDOWN -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src = "js/jquery-3.0.0.min.js"></script>
    	<!-- Include all compiled plugins (below), or include individual files as needed -->
    	<script src="js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="js/moment.js"></script>
	    <script type="text/javascript" src="js/daterangepicker.js"></script>

	    	    <!-- DROPDOWN -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
    	<!-- For Segmented Tabs -->
    	<script type="text/javascript">
			$(function(){
    
		    $('div.segmented-control a').on('click', function(){
		        
		        $('div.segmented-control a').each(function(i,e){
		            $(e).removeClass('active');
		        });
		        
		        $(this).addClass('active');
		        $(this).find('input').prop('checked',true);
		        return false;
		        
		    });
		    
		});

		</script>



		<script type="text/javascript">
			$(function(){
    
		    $('div.segmented-report-type a').on('click', function(){
		        
		        $('div.segmented-report-type a').each(function(i,e){
		            $(e).removeClass('active');
		        });
		        
		        $(this).addClass('active');
		        $(this).find('input').prop('checked',true);
		        return false;
		        
		    });
		    
		});

		</script>

		<script>
			$(document).ready(function(){
				$("#facultyButtonDaily").click(function() {
			      	$("#inputIDNumDaily").show();
			        $("#inputOthersDaily").hide();
			        console.log("ASD");
			    });

			    $("#othersButtonDaily").click(function() {
			      	$("#inputOthersDaily").show();
			      	$("#inputIDNumDaily").hide();
			      	$("#inputIDNumDaily").removeAttr
			      	console.log("ASD");
			    });
			});

			$(document).ready(function(){
				$("#facultyButtonMonthly").click(function() {
			      	$("#inputIDNumMonthly").show();
			        $("#inputOthersMonthly").hide();
			    });
			    $("#othersButtonMonthly").click(function() {
			      	$("#inputOthersMonthly").show();
			      	$("#inputIDNumMonthly").hide();
			    });
			});

			$(document).ready(function(){
				$("#facultyButtonTerm").click(function() {
			      	$("#inputIDNumTerm").show();
			        $("#inputOthersTerm").hide();
			    });
			    $("#othersButtonTerm").click(function() {
			      	$("#inputOthersTerm").show();
			      	$("#inputIDNumTerm").hide();
			    });
			});
			
			$(document).ready(function(){
				$('#inputName').click(function(){
				var name =$("#name");
		 		var idnumber =$("#idnumber");
		 		name.removeAttr("readonly");
		 		//idnumber.removeAttr("required");
		 		//name.prop("required", "true");
		 		idnumber.prop("readonly", "true");
		 		});
	 			
	 			$('#inputID').click(function(){
	 			var name =$("#name");
		 		var idnumber =$("#idnumber");
		 		name.prop("readonly", "true");
		 		//idnumber.prop("required", "true");
		 		//name.removeAttr("required");
		 		idnumber.removeAttr("readonly");
	 			});

	 			
			});

			$(document).ready(function(){
				$("#dailyButton").click(function() {
			      	$("#inputDaily").show();
			        $("#inputMonthly").hide();
			        $("#inputMonthly2").hide();
			        $("#inputTerm").hide();
			    });
			    $("#monthlyButton").click(function() {
			      	$("#inputMonthly").show();
			      	$("#inputMonthly2").show();
			      	$("#inputDaily").hide();
			      	$("#inputTerm").hide();
			    });
			    $("#termButton").click(function() {
			      	$("#inputTerm").show();
			      	$("#inputDaily").hide();
			        $("#inputMonthly").hide();
			        $("#inputMonthly2").hide();
			    });

			});
		</script>

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
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="navbar-brand-centered">
			      <ul class="nav navbar-nav">
			        <li><a href="dashboard.html"><b>Maintenance</b></a></li>
			        <li><a href="dashboard-reports.html"><b>Log Out</b></a></li>		
			      </ul>
			      <ul class="nav navbar-nav navbar-right" style = "padding:7px;">
			        
			        <li>

			        	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#ayModal" id = "dashay-button"> 
			        		<b>Current AY: 2016 - 2017 || Term 1<b>
			        		<?php 

									 if (($timestamp = strtotime($date)) !== false)
									 {
									   $php_date = getdate($timestamp);
									   // or if you want to output a date in year/month/day format:
									   $dateString = date("F d, Y", $timestamp); // see the date manual page for format options      
									 }
									 

									 // $stmt= $conn->prepare("SELECT name, term_no
										// 					FROM academicyear A
										// 					INNER JOIN term T ON T.year_id = A.id
										// 					WHERE t.term_no =
										// 					(SELECT term_no FROM term
										// 					WHERE :dailydate BETWEEN term.start AND term.end);");
									 // $stmt->execute(["dailydate" => $date]);

									 // $result = $stmt->execute();
									 // $rows = $stmt->fetch(PDO::FETCH_ASSOC); // assuming $result == true
								

									 
									 //        echo "Current ".$rows['name']." || Term ".$rows['term_no'];
									 
									 // switch($rows['term_no'] )
									 // {
									 // 	case '1': $term_no_string = '1st'; break;
									 // 	case '2': $term_no_string = '2nd'; break;
									 // 	case '3': $term_no_string = '3rd'; break;

									 // }
									 //$labelDate = "<h5>".$term_no_string." TRIMESTER, ".$rows['name']."</h5><h5>".$dateString."</h5>"

								?>
			        		</button>

					</li>
				  </ul>

			    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<!-- Current AY Modal -->    
        <div class="modal fade" id="ayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		 <div class="modal-dialog">
				<div class="addaymodal-container" id = "searchrecords-container">
						<fieldset>
                            
                            <div class="">
                                <label class = "control-label col-xs-5" style = "text-align:left;">Current Academic Year: </label>
			            	 	<div class = "col-xs-4">
			            	 		<input type="text" class="form-control" style = "width:213px;" placeholder="2016 - 2017"/>
			            	 	</div>
                            </div>
                            <br>
                            <div class="">
                                <label class = "control-label col-xs-5" style = "text-align:left;">Current Term </label>
			            	 	<div class = "col-xs-4">
			            	 		<input type="text" class="form-control" style = "width:213px;" placeholder="1 "/>
			            	 	</div>
                            </div>
                            
                            <div class="text-center">
                                <a data-dismiss="modal" data-toggle="modal" href="#adday-modal" id="adday" >Academic Year finished? Click to add a new one!</a>
                            </div>
                            <br><br>
							<div class="text-center">
						        <button type="button" class="cancel btn btn-danger col-xs-offset-4 col-xs-3" data-dismiss="modal" style=""><i class = "glyphicon glyphicon-remove"></i> CLOSE </button>
				            </div>
						
			        	</fieldset>


				</div>
		  </div>
		</div>
		<div class = "container">
			<p style = "float:right">

					<a href = "#" data-toggle="modal" data-target = "#generate-modal" class="navbar-btn btn-success btn" style = "margin-top:-5px;">
			      	<span class="glyphicon glyphicon-th-list"></span> <b> GENERATE </b> </a> &nbsp;

					<a href="#" class="navbar-btn btn-success btn" style = "margin-top:-5px;">
				     <span class="glyphicon glyphicon-print"></span> <b> PRINT </b> </a> &nbsp;

			      	<a href="#" class="navbar-btn btn-success btn" style = "margin-top:-5px;">
			      	<span class="glyphicon glyphicon-envelope"></span> <b> EMAIL </b>  </a>  	
			</p>
			<br><br>
			<center>
				<div class="row">
					<h4><b>FACULTY ATTENDANCE REPORT</b></h4>
					<?php //echo $labelDate; ?>
				</div>
			</center>
			<br>
			<div class="row">
				<div class ="box col-md-12">
						<div class="box-content">
							<table id="resulttable" class="table table-bordered table-striped table-condensed">
								<thead class="collegelabel">
									<tr><th colspan ='9'></th></tr>
								</thead> 
								<thead id = 'col-header'><tr>
									<th>Date </th>
									<th>College </th>
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
									<?php

										$filter = "";
 										
											if($options == 'faculty'){
												$filter = "WHERE ";
												$inputs = isset($_POST["inputs"]) ? $_POST["inputs"] : false;
												

												if($inputs == 'idnumber'){
													$idnumber = isset($_POST["idnumber"]) ? $_POST["idnumber"] : false;
													
													$stmt= $conn->prepare("SELECT first_name, middle_name, last_name FROM faculty 
										    							   WHERE id = :idnumber ;");

													$stmt->execute(["idnumber" => $idnumber]);

													$result = $stmt->execute();
													$rows = $stmt->fetch(PDO::FETCH_ASSOC);			    		
													$filter = $filter."last_name ='".$rows['last_name']."' AND  first_name ='".$rows['first_name']."' AND middle_name ='".$rows['middle_name']."'";
							
										    	}
												else
												{
													$name = isset($_POST["name"]) ? $_POST["name"] : false;
													$stmt= $conn->prepare("SELECT first_name, middle_name, last_name FROM faculty 
										    							   WHERE first_name= :name OR last_name= :name OR middle_name= :name");

													$stmt->execute(["name" => $name]);

													$result = $stmt->execute();
													$rows = $stmt->fetch(PDO::FETCH_ASSOC);
											    	$filter = $filter."last_name ='".$rows['last_name']."' AND  first_name ='".$rows['first_name']."' AND middle_name ='".$rows['middle_name']."'";
													
												}
												
												
										    }
										    else
										    {

										    	$college = isset($_POST["college"]) ? $_POST["college"] : false;
										    	$department = isset($_POST["department"]) ? $_POST["department"] : false;


										    	
										    	$filter = "WHERE ";

										    	if($department == 'All Departments')
										    	{
										    		if ($college == 'All Colleges')	
										   				$filter = "";
										   			else
										   				$filter = $filter."college= '".$college."'";
										   		}
										   		else
										   		{
										   			$filter = $filter."department= '".$department."' ";

										   			if ($college != 'All Colleges')	
										   				$filter = $filter."AND college= '".$college."'";

										   		}	
										    		
										    											    	
										    }
											$stmt = $conn->prepare("SELECT college, department,first_name,middle_name,last_name,time_start,time_end,section,remarks,room_name,date,code
																	FROM
																		(SELECT college, department,first_name,middle_name,last_name,time_start,time_end,section,remarks,name as 'room_name',date,course_id
																		FROM
																			(SELECT college, department,first_name,middle_name,last_name,time_start,time_end,section,remarks, room_id,course_id, date
																			 FROM 
																				(SELECT college, department,first_name,middle_name,last_name,time_start,time_end,C.section,room_id,C.id as 'offering_id', course_id
																				 FROM faculty F
																				 INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																			 INNER JOIN attendance A on A.courseoffering_id = Y.offering_id
																			 WHERE ".$dateFilter." ) as Z
																		INNER JOIN room R on R.id = Z.room_id) as A
																	INNER JOIN course C ON C.id = A.course_id
																	".$filter."
																	;");
																
									 		$result = $stmt->execute();

										$prevCollege = "";
									 		while($rows = $stmt->fetch(PDO::FETCH_ASSOC))
									 		{
									 			if($prevCollege != $rows['college'])

									 				echo "<tr class='row-data' data-href='#'>
									 				<td>".$rows['date']."</td>
									 				<td>".$rows['college']."</td>
									 				<td>".$rows['department']."</td>
									 				<td>".$rows['last_name'].", ".$rows['first_name']." ".$rows['middle_name']."</td>
									 				<td>".$rows['time_start']." - ".$rows['time_end']."</td>
									 				<td>".$rows['code']."</td>
									 				<td>".$rows['section']."</td>
									 				<td>".$rows['room_name']."</td>
									 				<td>".$rows['remarks']."</td></tr>";

									 		}
											
										?>
								</tbody>
							</table>
						</div>
				</div>
			</div><br><br>


		<!-- GENERATE REPORTS MODAL -->
		<div class="modal fade" id="generate-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="addaymodal-container" id = "daily-container">
					<form class = "form form-horizontal" action="generatereports.php" method="POST">
						<fieldset>
			            	 <legend class="text-center"><h3><b>Generate Reports</b></h3></legend>


			            	 <div class="form-group">
			            	 	<label class = "control-label col-xs-4" style = "text-align:left;">Type:</label>
						        <div class="col-xs-5">
						            <div class="segmented-report-type" style="width:500px;margin-left:5px;">
									    <a id ="dailyButton" href="#" class="list-group-item active" value = "daily">
									    	Daily
									    	<input name ="buttons" value ="daily"type="radio" checked/>
									    </a>
									    <a id="monthlyButton" href="#" class="list-group-item" value = "month">
									    	Monthly
									        <input name ="buttons" value ="monthly" type="radio"/>
									    </a>
									    <a id ="termButton" href="#" class="list-group-item" value = "term">
									    	Term
									    	<input name ="buttons" value ="term" type="radio"/>
									    </a>
									                
									</div>
						        </div>
			            	 </div>
									


			            	 <div class="form-group">
			            	 	<label class = "control-label col-xs-4" style = "text-align:left;">Date:</label>
			            	 	
			            	 	<div id = "inputDaily" class = "col-xs-8">
			            	 		<input type="text" class="form-control" id = "dailydate" name="dailydate"/>
			            	 	</div>
								
								<div id = "inputMonthly" class = "col-xs-4" name = "monthly" style = "display:none;">
									
									<select class="selectpicker show-tick" style = "text-align:left;;" name ="months" data-width="110px">
										<option selected>January</option>
										<option>February</option>
										<option>March</option>
										<option>April</option>
										<option>May</option>
										<option>June</option>
										<option>July</option>
										<option>August</option>
										<option>September</option>
										<option>October</option>
										<option>November</option>
										<option>December</option>
									</select>						                


			            		</div>

			            		<div id = "inputMonthly2" style = "display:none;">
				            		<select id = "try" class="selectpicker show-tick" style = "text-align:left;" name ="years" data-width="100px">
												<option selected>2016</option>
												<option>2015</option>
												
									</select>
								</div>
									

			            		<div id = "inputTerm" class = "col-xs-4" name = "terms" style = "display:none;">
						                
						                <select class="selectpicker show-tick" style = "text-align:left;" name ="academicyears">
												<option selected>A.Y. 2016-2017</option>
												<option>A.Y. 2015-2016</option>
												
									    </select>
									    <br><br>
						                <select class="selectpicker show-tick" style = "text-align:left;" name ="terms">
												<option value = "1" selected>Term 1</option>
												<option value = "2">Term 2</option>
												<option value = "3">Term 3</option>
												
									    </select>

									    

			            		</div>

			            	 </div>

			            	 <div class="form-group">
						        <label for="inputPassword" class="control-label col-xs-4" style = "text-align:left;">Report for:</label>
						        <div class="col-xs-5">
						            <div class=" segmented-control" style="width:150px;margin-left:5px;">
									    <a id ="facultyButtonDaily" href="#" class="list-group-item active">
									    	Faculty
									    	<input type="radio" name ="options" value ="faculty" checked/>
									    </a>
									    <a id="othersButtonDaily" href="#" class="list-group-item">
									    	Others
									        <input type="radio" name ="options" value = "others"/>
									    </a>
									                
									</div>
						        </div>
						    </div>
						    <hr class="style2 col-xs-offset-1 col-xs-9"><br>

						    <div id = "inputIDNumDaily">
							    <div class="form-group">
		                            <div class="form-group">
					            	 	<label class = "control-label col-xs-4" style = "text-align:left; margin-left:15px;">
					            	 		<input type="radio" name="inputs" id="inputID" value="idnumber"checked>&nbsp;&nbsp;by ID Number: </label>
					            	 	<div class = "col-xs-3">
					            	 		<input type="text" class="form-control"	id= "idnumber" name="idnumber"/>
					            	 	</div>
					            	</div>

				            	 	<div class="form-group">
					            	 	<label class = "control-label col-xs-4" style = "text-align:left; margin-left:15px;">
					            	 		<input type="radio" name="inputs" id="inputName" value="name">&nbsp;&nbsp;by Name: </label>
					            	 	<div class = "col-xs-3">
					            	 		<input type="text" class="form-control"	id= "name" name="name" readonly/>

					            	 	</div>
					            	</div>
							    </div>

							</div>

						    <div id = "inputOthersDaily" style = "display:none;">

							    <div class = "form-group">
				            	 		<label class = "control-label col-xs-4" style = "text-align:left;">Report filter:</label>
				            	 		<div class = "col-xs-5" style="width:250px">
											<select class="selectpicker show-tick" style = "text-align:left;" name ="college">
												<option selected>All Colleges</option>
												<option>CLA</option>
												<option>COB</option>
												<option>COS</option>
												<option>COE</option>
												<option>CCS</option>
												<option>CED</option>
												<option>SOE</option>
									    	</select>
				            	 		</div>
							    </div>

							    <div class = "form-group">
				            	 		<label class = "control-label col-xs-4" style = "text-align:left;"></label>
				            	 		<div class = "col-xs-5">
											<select class="selectpicker show-tick" name = "department" multiple>
											<option selected>All Departments</option>
												<option>Software Technology</option>
												<option>Information Technology</option>
												<option>Computer Technology	</option>

									    	</select>
				            	 		</div>
							    </div>
							</div>
							<br>

						    <div class="text-center">
						        <button id="btnViewReportDaily" type="submit" class="btn btn-success btn-lg col-xs-4 submit" style = "margin-left:40px; margin-right:30px;font-size:14px;"> <i class="glyphicon glyphicon-th-list"></i> GENERATE </button> 
						        
						        <button type="button" class="btn btn-danger btn-lg col-xs-4 cancel" data-dismiss="modal" style="
    							margin-left: 20px;font-size:14px;"> <i class="glyphicon glyphicon-remove"></i> CANCEL </button>
				            </div>

			        	</fieldset>
					</form>
				</div>
		  </div>
		</div>


    	</div>

    </body>

</html>