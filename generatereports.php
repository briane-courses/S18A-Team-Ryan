<html> 
	<?php

	include "php/connector.php";

	$buttons = isset($_POST["buttons"]) ? $_POST["buttons"] : false;

    //echo "Data: ".$date."</br>";
    //echo $buttonDaily."</br>";
	
	if($buttons == 'daily') 
	{
		$date = isset($_POST["dailydate"]) ? $_POST["dailydate"] : false;
		$dates = explode("/",$date);
		$date = $dates[2]."-".$dates[0]."-".$dates[1]; 
		$dateFilter = "date = '".$date."' ";

		switch($dates[0])
		{
			case 1 : $labeldate = "January"; break;
			case 2 : $labeldate = "February"; break;
			case 3 : $labeldate = "March"; break;
			case 4 : $labeldate = "April"; break;
			case 5 : $labeldate = "May"; break;
			case 6 : $labeldate = "June"; break;
			case 7 : $labeldate = "July"; break;
			case 8 : $labeldate = "August"; break;
			case 9 : $labeldate = "September"; break;
			case 10 : $labeldate = "October"; break;
			case 11 : $labeldate = "November"; break;
			case 12 : $labeldate = "December"; break;
		}
		$labeldate = $labeldate." ".$dates[1].", ".$dates[2];
	}
	else if($buttons == 'monthly')
	{
		$months = isset($_POST["months"]) ? $_POST["months"] : false;
		$years = isset($_POST["years"]) ? $_POST["years"] : false;

		$month = $months;
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
		$labeldate = $month." ".$years;

	}
	else if($buttons == 'term')
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
		if($terms == 1)
			$termP = "1st";
		if($terms == 2)
			$termPs = "2nd";
		if($terms == 3)
			$termP = "3rd";

		$labeldate = $termP." TRIMESTER, ".$years ;

	}
		
	
	$options = isset($_POST["options"]) ? $_POST["options"] : false;

	 // if (($timestamp = strtotime($date)) !== false)
	 // {
		// $php_date = getdate($timestamp);
		// // or if you want to output a date in year/month/day format:
		// $dateString = date("F d, Y", $timestamp); // see the date manual page for format options      
	 // }

?>
	<head>
		<meta charset = "UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<title> Daily Faculty Report - All </title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link href="css/global.css" rel="stylesheet">
		<link rel="stylesheet" href="css/generatedaily-all.css">
		<link rel="stylesheet" href="css/generatemonthlyterm.css">
		<link rel="stylesheet" href="css/dashboard.css">
		<link rel="stylesheet" type="text/css" href="css/table.css">
		<link rel="stylesheet" type="text/css" href="css/daterangepicker.css"/>
		<!-- DROPDOWN-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
		<!-- FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Bungee|Gudea" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src = "js/jquery-3.0.0.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="js/moment.js"></script>
	    <script type="text/javascript" src="js/daterangepicker.js"></script>
	    <!-- DROPDOWN -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

		<script type="text/javascript">
			$(function() {

				var currDate = moment.currDate;

			    $('input[name="dailydate"]').daterangepicker({
			        singleDatePicker: true,
			        showDropdowns: true,
			        value: currDate
			    }); 

			});
		</script>

		<script type="text/javascript">
			$(function() {

				var currMonth =moment.currDate;

			$('input[name="monthlydate"]').daterangepicker( {
			    format: "mm-yyyy",
			    viewMode: "months", 
			    minViewMode: "months",
			    enableYearToMonth: true, 
			    enableMonthToDay : false,
			    value : currMonth
			});

			});
		</script>

			<script type="text/javascript">
			$(function() {

				var currDate = moment.currDate;

			    $('input[name="dailydate"]').daterangepicker({
			        singleDatePicker: true,
			        showDropdowns: true,
			        value: currDate
			    }); 

			});
		</script>

		<!-- DATE RANGE PICKER -->
		<script type="text/javascript">

			$(function() {

			    var start = moment().subtract(29, 'days');
			    var end = moment();

			    function cb(start, end) {
			        $('#reportrange span').html(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
			        $('#reportrange2 span').html(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
			        $('#reportrange3 span').html(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
			    }
			    $('#reportrange').daterangepicker({
			        startDate: start,
			        endDate: end,
			        ranges: {
			          
			        }}, cb);
			    
			    $('#reportrange2').daterangepicker({
			        startDate: start,
			        endDate: end,
			        ranges: {
			          
			        }}, cb);

			    $('#reportrange3').daterangepicker({
			        startDate: start,
			        endDate: end,
			        ranges: {
			          
			        }}, cb);

			    cb(start, end);
			    
			});
		</script>

		<script type="text/javascript">
			$(function() {

				var currDate = moment.currDate;

			    $('input[name="dailydate"]').daterangepicker({
			        singleDatePicker: true,
			        showDropdowns: true,
			        value: currDate
			    }); 

			});
		</script>
		
		<!-- CHANGING OF REPORT TYPES -->
		<script>
			function change(){
				if(document.getElementById('report-type').value == "daily") {
			      	$("#inputDaily").show();
			        $("#inputTerm").hide();
			        $("#inputCustom").hide();
			        $("#inputPromo").hide();
				}

				if(document.getElementById('report-type').value == "term") {
			      	$("#inputTerm").show();
			      	$("#inputDaily").hide();
			        $("#inputCustom").hide();
			        $("#inputPromo").hide();
				}

				if(document.getElementById('report-type').value == "custom") {
					$("#inputCustom").show();
					$("#inputTerm").hide();
			      	$("#inputDaily").hide();
			      	$("#inputPromo").hide();
				}

				if(document.getElementById('report-type').value == "promotional") {
					$("#inputPromo").show();
					$("#inputDaily").hide();
					$("#inputTerm").hide();
					$("#inputCustom").hide();
				}

			}
		</script>

		<script>

			$(document).ready(function(){


				$("#collegepicker").change(function() {
					
					
					var college = $("#collegepicker :selected").val();
					
					if(college == 'CCS')
					{
						$("#department").val("CCS");
						$("#CCS").show();
				        $("#COS").hide();
				        $("#COL").hide();
				        $("#CLA").hide();
				        $("#GCOE").hide();
				        $("#SOE").hide();
				        $("#BAGCED").hide();
				        $("#RVRCOB").hide();
				        $("#All").hide();
					}
					if(college == 'COS')
					{
						$("#department").val("COS");
						$("#CCS").hide();
				        $("#COS").show();
				        $("#COL").hide();
				        $("#CLA").hide();
				        $("#GCOE").hide();
				        $("#SOE").hide();
				        $("#BAGCED").hide();
				        $("#RVRCOB").hide();
				        $("#All").hide();
					}
					if(college == 'COL')
					{
						$("#department").val("COL");
						$("#CCS").hide();
				        $("#COS").hide();
				        $("#COL").show();
				        $("#CLA").hide();
				        $("#GCOE").hide();
				        $("#SOE").hide();
				        $("#BAGCED").hide();
				        $("#RVRCOB").hide();
				        $("#All").hide();
					}
					if(college == 'CLA')
					{
						$("#department").val("CLA");
						$("#CCS").hide();
				        $("#COS").hide();
				        $("#COL").hide();
				        $("#CLA").show();
				        $("#GCOE").hide();
				        $("#SOE").hide();
				        $("#BAGCED").hide();
				        $("#RVRCOB").hide();
				        $("#All").hide();
					}
					if(college == 'GCOE')
					{
						$("#department").val("GCOE");
						$("#CCS").hide();
				        $("#COS").hide();
				        $("#COL").hide();
				        $("#CLA").hide();
				        $("#GCOE").show();
				        $("#SOE").hide();
				        $("#BAGCED").hide();
				        $("#RVRCOB").hide();
				        $("#All").hide();
					}
					if(college == 'SOE')
					{
						$("#department").val("SOE");
						$("#CCS").hide();
				        $("#COS").hide();
				        $("#COL").hide();
				        $("#CLA").hide();
				        $("#GCOE").hide();
				        $("#SOE").show();
				        $("#BAGCED").hide();
				        $("#RVRCOB").hide();
				        $("#All").hide();
					}
					if(college == 'BAGCED')
					{
						$("#department").val("BAGCED");
						$("#CCS").hide();
				        $("#COS").hide();
				        $("#COL").hide();
				        $("#CLA").hide();
				        $("#GCOE").hide();
				        $("#SOE").hide();
				        $("#BAGCED").show();
				        $("#RVRCOB").hide();
				        $("#All").hide();
					}
					if(college == 'RVRCOB')
					{
						$("#department").val("RVRCOB");
						$("#CCS").hide();
				        $("#COS").hide();
				        $("#COL").hide();
				        $("#CLA").hide();
				        $("#GCOE").hide();
				        $("#SOE").hide();
				        $("#BAGCED").hide();
				        $("#RVRCOB").show();
				        $("#All").hide();
					}
					if(college == 'All Colleges')
					{
						$("#department").val("All Colleges");
						$("#CCS").hide();
				        $("#COS").hide();
				        $("#COL").hide();
				        $("#CLA").hide();
				        $("#GCOE").hide();
				        $("#SOE").hide();
				        $("#BAGCED").hide();
				        $("#RVRCOB").hide();
				        $("#All").show();
					}
			    });

			    
			});


			$(document).ready(function(){
				$("#facultyButtonDaily").click(function() {
			      	$("#inputIDNumDaily").show();
			        $("#inputOthersDaily").hide();
			        console.log("ASD");
			    });

			    $("#othersButtonDaily").click(function() {
			      	$("#inputOthersDaily").show();
			        $("#CCS").hide();
			        $("#COS").hide();
			        $("#COL").hide();
			        $("#CLA").hide();
			        $("#GCOE").hide();
			        $("#SOE").hide();
			        $("#BAGCED").hide();
			        $("#RVRCOB").hide();
			        $("#All").show();
			      	$("#inputIDNumDaily").hide();
			      	
			      	console.log("ASaD");
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
		 		idnumber.val("");
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
		 		name.val("");

	 			});

	 			
			});

			$(document).ready(function(){
				$('#searchByName').click(function(){
				var name =$("#search-name");
				var fname =$("#search-fname");
		 		var idnumber =$("#search-idnumber");
		 		name.removeAttr("readonly");
		 		fname.removeAttr("readonly");
		 		idnumber.val("");
		 		idnumber.prop("readonly", "true");
		 		});
	 			
	 			$('#searchByID').click(function(){
	 			var name =$("#search-name");
	 			var fname =$("#search-fname");
		 		var idnumber =$("#search-idnumber");
		 		name.prop("readonly", "true");
		 		fname.prop("readonly", "true");
		 		idnumber.removeAttr("readonly");
		 		name.val("");
		 		fname.val("");
	 			});

	 			
			});


		</script>
		
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
					var name = $("#name");
					var fname = $("#fname");
					var idnumber = $("#idnumber");
					name.removeAttr("readonly");
					fname.removeAttr("readonly");
					idnumber.val("");
					//idnumber.removeAttr("required");
					//name.prop("required", "true");
					idnumber.prop("readonly", "true");
				});
				$('#inputID').click(function(){
					var name = $("#name");
					var fname = $("#fname");
					var idnumber = $("#idnumber");
					name.prop("readonly", "true");
					fname.prop("readonly", "true");
					//idnumber.prop("required", "true");
					//name.removeAttr("required");
					idnumber.removeAttr("readonly");
					name.val("");
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

			$(document).ready(function(){
				$('#searchByName').click(function(){
				var name =$("#search-name");
		 		var idnumber =$("#search-idnumber");
		 		name.removeAttr("readonly");
		 		idnumber.val("");
		 		//idnumber.removeAttr("required");
		 		//name.prop("required", "true");
		 		idnumber.prop("readonly", "true");
		 		});
	 			
	 			$('#searchByID').click(function(){
	 			var name =$("#search-name");
		 		var idnumber =$("#search-idnumber");
		 		name.prop("readonly", "true");
		 		//idnumber.prop("required", "true");
		 		//name.removeAttr("required");
		 		idnumber.removeAttr("readonly");
		 		name.val("");

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
			      	<span class="glyphicon glyphicon-th-list"></span> GENERATE </a> &nbsp;

					<a href="#" class="navbar-btn btn-success btn" style = "margin-top:-5px;">
				     <span class="glyphicon glyphicon-print"></span>  PRINT </a> &nbsp;

			      	<a href="#" class="navbar-btn btn-success btn" style = "margin-top:-5px;">
			      	<span class="glyphicon glyphicon-envelope"></span> EMAIL </a>  	
			</p>
			<br><br>
			<center>
				<div class="row">
					<h4><b>FACULTY ATTENDANCE REPORT</b></h4>
					<?php echo $labeldate; ?>
				</div>
			</center>
			
							
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


										    	switch ($department) {
										    		case 'CCS':
										    				$department = isset($_POST["ccs"]) ? $_POST["ccs"] : false;
										    			break;
										    		case 'COS':
										    				$department = isset($_POST["cos"]) ? $_POST["cos"] : false;
										    			break;
										    		case 'COL':
										    				$department = isset($_POST["col"]) ? $_POST["col"] : false;
										    			break;
										    		case 'CLA':
										    				$department = isset($_POST["cla"]) ? $_POST["cla"] : false;
										    			break;
										    		case 'RVRCOB':
										    				$department = isset($_POST["rvrcob"]) ? $_POST["rvrcob"] : false;
										    			break;
										    		case 'BAGCED':
										    				$department = isset($_POST["bagced"]) ? $_POST["bagced"] : false;
										    			break;
										    		case 'GCOE':
										    				$department = isset($_POST["gcoe"]) ? $_POST["gcoe"] : false;
										    			break;
										    		case 'SOE':
										    				$department = isset($_POST["soe"]) ? $_POST["soe"] : false;
										    			break;
										    		
										    		default:
										    				$department = isset($_POST["all"]) ? $_POST["all"] : false;
										    			break;
										    	}
										    	
										    	
										    	$filter= "";

										    	if($college != 'All Colleges')
										    	{
										    		$filter = "WHERE "."department= '".$department."' AND college= '".$college."'";
										   		}
										    		
										    											    	
										    }

										    if($buttons == 'daily')
										    {
										    	$stmt = $conn->prepare("SELECT college, department,first_name,middle_name,last_name,time_start,time_end,section,remarks,room_name,code
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
										 		if($rows = $stmt->fetch(PDO::FETCH_ASSOC))
										 		{
										 			echo "	<br>
															<div class='row'>
															<div class ='box col-md-12'>
															<div class='box-content'>
										 					<table id='resulttable' class='table table-bordered table-striped table-condensed'>
															<thead class='collegelabel'>
																<tr><th colspan ='7'>".$rows['college']."</th></tr>
															</thead> 
										 					<thead id = 'col-header'><tr>
															<th>Department</th>
															<th>Faculty</th>
															<th>Time</th>
															<th>Course</th>
															<th>Section</th>
															<th>Room</th>
															<th>Remarks</th>
															</tr>
															</thead>
															<tbody>";
										 			do
										 			{

										 				echo "<tr class='row-data' data-href='#'>
										 				<td>".$rows['department']."</td>
										 				<td>".$rows['last_name'].", ".$rows['first_name']." ".$rows['middle_name']."</td>
										 				<td>".$rows['time_start']." - ".$rows['time_end']."</td>
										 				<td>".$rows['code']."</td>
										 				<td>".$rows['section']."</td>
										 				<td>".$rows['room_name']."</td>
										 				<td>".$rows['remarks']."</td></tr>";

										 			}while($rows = $stmt->fetch(PDO::FETCH_ASSOC));

										 			echo "</tbody> </table>
										 				  </div>
														  </div>
														  </div><br><br>";

											 	}
											 		else
											 			echo "<h1> NO RECORDS FOUND </h1>";
										 		
											}
											else
											{
												if($filter != "")
													$filter = $filter."AND code = 'AB'";
												else
													$filter = "WHERE code = 'AB'";

												if($filter != "")
													$filter3 = $filter."AND code = 'AB'";
												else
													$filter3 = "WHERE code <> 'AB'";

												$stmt = $conn->prepare( "SELECT department,first_name,middle_name,last_name, faculty_id, A.id as 'record_id', code, name, COUNT(code)*1.5 as 'Total'
																		FROM (SELECT department,first_name,middle_name,last_name, faculty_id, status_id, reason,date
																		 FROM (SELECT department,first_name,middle_name,last_name,C.id as 'offering_id',F.id as 'faculty_id'
																			   FROM faculty F
																			   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																		 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																	     WHERE ".$dateFilter.") as Z
																	INNER JOIN attendancestatus A ON A.id = Z.status_id
																	".$filter."
																	GROUP BY faculty_id;
																	");
												
																	
										 		$result = $stmt->execute();
												if($rows = $stmt->fetch(PDO::FETCH_ASSOC))
												{
													echo "
													<center>
													<div class='row'>
													<div class ='box col-md-12'>
													<div class='box-content'>
													<table class='tg'>
													<tr>
												    <th class='tg-uce2'>Reason for Absence:</th>
												    <th class='tg-efv9'><b>CF</b> - Conference</th>
												    <th class='tg-efv9'><b>PM</b> - Personal Matters</th>
												    <th class='tg-efv9'><b>SI</b> - Sickness</th>
												    <th class='tg-efv9'><b>XX</b> - Reason Uknown</th>
												  	</tr>
												  	<tr>
												    <td class='tg-cgdk'></td>
												    <td class='tg-cgdk'><b>OB</b> - Official Business</td>
												    <td class='tg-cgdk'><b>AC</b> - Alternative Class</td>
												    <td class='tg-cgdk'><b>FT</b> - Field Trip</td>
												    <td class='tg-cgdk'><b>OL</b> - Online Class</td>
												  	</tr>
												  	<tr>
												    <td class='tg-efv9'></td>
												    <td class='tg-efv9'><b>SW</b> - Seatwork</td>
												    <td class='tg-efv9'><b>SB</b> - Substitute</td>
												    <td class='tg-efv9'><b>LA</b> - Late</td>
												    <td class='tg-efv9'><b>ED</b> - Early Dismissal</td>
												  	</tr>
													</table>
													</div>
													</div>
													</div>
													</center>
													<br><br>
													<div class='row'>
													<div class ='box col-md-12'>
													<div class='box-content'>
													<table class='table table-bordered table-striped table-condensed'>
													<tr>
													<th class='mainHeader' rowspan='3'><br><br>FACULTY NAME</th>
												    <th class='mainHeader' rowspan='3'><br>LOAD<br>(h/w)</th>
												    <th class='mainHeader' colspan='5'><br>ABSENCE</th>
												    <th class='mainHeader' rowspan='3'><br>MAKE-UP<br>HOURS</th>
												    <th class='mainHeader' colspan='8'><br>OTHERS</th>
												  	</tr>
												  	<tr>
												  	<td class='lblHeader' colspan='5'>in hours</td>
												    <td class='lblHeader' colspan='6'>in hours</td>
												    <td class='lblHeader' colspan='2'>in freq.</td>
												 	</tr>
												  	<tr>
												    <td class='subHeader'>CF</td>
												    <td class='subHeader'>PM</td>
												    <td class='subHeader'>SI</td>
												    <td class='subHeader'>XX</td>
												    <td class='subHeader'>TOTAL</td>
												    <td class='subHeader'>OB</td>
												    <td class='subHeader'>AC</td>
												    <td class='subHeader'>FT</td>
												    <td class='subHeader'>OL</td>
												    <td class='subHeader'>SW</td>
												    <td class='subHeader'>SB</td>
												    <td class='subHeader'>LA</td>
												    <td class='subHeader'>ED</td>
												  	</tr>
												  	";

												  

												  	do
										 			{
										 				$filter2 = "faculty_id = ".$rows['faculty_id'];

										 				$stmt0 = $conn->prepare( "SELECT first_name,middle_name,last_name, COUNT(C.id)*1.5 as 'LOAD'
																			FROM courseoffering C
																			INNER JOIN faculty F ON F.id = C.id
																			WHERE ".$filter2."
																			GROUP BY faculty_id;");					
										 				$result0 = $stmt0->execute();
										 				$rows0 = $stmt0->fetch(PDO::FETCH_ASSOC);
										 				
										 				$stmt2 = $conn->prepare( "SELECT faculty_id, A.id as 'record_id', code, name, COUNT(code)*1.5 as 'cf'
																			FROM (SELECT faculty_id, status_id, reason,date
																			 FROM (SELECT C.id as 'offering_id',F.id as 'faculty_id'
																				   FROM faculty F
																				   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																			 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																		     WHERE ".$dateFilter.") as Z
																		INNER JOIN attendancestatus A ON A.id = Z.status_id
																		".$filter." AND reason = 'cf' AND ".$filter2."
																		GROUP BY faculty_id,reason;
																		");					
										 				$result2 = $stmt2->execute();
										 				$rows2 = $stmt2->fetch(PDO::FETCH_ASSOC);

										 				$stmt3 = $conn->prepare( "SELECT faculty_id, A.id as 'record_id', code, name, COUNT(code)*1.5 as 'pm'
																			FROM (SELECT faculty_id, status_id, reason,date
																			 FROM (SELECT C.id as 'offering_id',F.id as 'faculty_id'
																				   FROM faculty F
																				   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																			 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																		     WHERE ".$dateFilter.") as Z
																		INNER JOIN attendancestatus A ON A.id = Z.status_id
																		".$filter." AND reason = 'pm' AND ".$filter2."
																		GROUP BY faculty_id,reason;
																		");					
										 				$result3 = $stmt3->execute();
										 				$rows3 = $stmt3->fetch(PDO::FETCH_ASSOC);

										 				$stmt4 = $conn->prepare( "SELECT faculty_id, A.id as 'record_id', code, name, COUNT(code)*1.5 as 'si'
																			FROM (SELECT faculty_id, status_id, reason,date
																			 FROM (SELECT C.id as 'offering_id',F.id as 'faculty_id'
																				   FROM faculty F
																				   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																			 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																		     WHERE ".$dateFilter.") as Z
																		INNER JOIN attendancestatus A ON A.id = Z.status_id
																		".$filter." AND reason = 'si' AND ".$filter2."
																		GROUP BY faculty_id,reason;
																		");					
										 				$result4 = $stmt4->execute();
										 				$rows4 = $stmt4->fetch(PDO::FETCH_ASSOC);

										 				$stmt5 = $conn->prepare( "SELECT faculty_id, A.id as 'record_id', code, name, COUNT(code)*1.5 as 'xx'
																			FROM (SELECT faculty_id, status_id, reason,date
																			 FROM (SELECT C.id as 'offering_id',F.id as 'faculty_id'
																				   FROM faculty F
																				   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																			 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																		     WHERE ".$dateFilter.") as Z
																		INNER JOIN attendancestatus A ON A.id = Z.status_id
																		".$filter." AND reason = 'xx' AND ".$filter2."
																		GROUP BY faculty_id,reason;
																		");					
										 				$result5 = $stmt5->execute();
										 				$rows5 = $stmt5->fetch(PDO::FETCH_ASSOC);

										 				$stmt6 = $conn->prepare( "SELECT M.date, X.attendance_id, M.id as 'makeupclass_id', COUNT(X.attendance_id)*1.5 as 'make-up'
																			FROM(SELECT faculty_id, status_id, reason,date, A.id as 'attendance_id'
																				FROM (SELECT C.id as 'offering_id', course_id, F.id as 'faculty_id'
																					  FROM faculty F
																					  INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																				INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																				WHERE ".$dateFilter.") as X
																			INNER JOIN makeupclass M ON M.attendance_id = X.attendance_id
																			WHERE ".$filter2." 
																			GROUP BY faculty_id");					
										 				$result6 = $stmt6->execute();
										 				$rows6 = $stmt6->fetch(PDO::FETCH_ASSOC);

										 				$stmt7 = $conn->prepare( "SELECT A.id as 'record_id', code, name, COUNT(code) as 'ob'
																			FROM(SELECT faculty_id, status_id, reason,date
																				 FROM (SELECT C.id as 'offering_id', course_id, F.id as 'faculty_id'
																					   FROM faculty F
																					   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																				 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																			     WHERE ".$dateFilter.") as Z
																			INNER JOIN attendancestatus A ON A.id = Z.status_id
																			".$filter3." AND reason = 'OB' AND ".$filter2."
																			GROUP BY faculty_id,reason;");					
										 				$result7 = $stmt7->execute();
										 				$rows7 = $stmt7->fetch(PDO::FETCH_ASSOC);

										 				$stmt8 = $conn->prepare( "SELECT A.id as 'record_id', code, name, COUNT(code) as 'ac'
																			FROM(SELECT faculty_id, status_id, reason,date
																				 FROM (SELECT C.id as 'offering_id', course_id, F.id as 'faculty_id'
																					   FROM faculty F
																					   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																				 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																			     WHERE ".$dateFilter.") as Z
																			INNER JOIN attendancestatus A ON A.id = Z.status_id
																			".$filter3." AND reason = 'AC' AND ".$filter2."
																			GROUP BY faculty_id,reason;");					
										 				$result8 = $stmt8->execute();
										 				$rows8 = $stmt8->fetch(PDO::FETCH_ASSOC);

										 				$stmt9 = $conn->prepare( "SELECT A.id as 'record_id', code, name, COUNT(code) as 'ft'
																			FROM(SELECT faculty_id, status_id, reason,date
																				 FROM (SELECT C.id as 'offering_id', course_id, F.id as 'faculty_id'
																					   FROM faculty F
																					   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																				 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																			     WHERE ".$dateFilter.") as Z
																			INNER JOIN attendancestatus A ON A.id = Z.status_id
																			".$filter3." AND reason = 'ft' AND ".$filter2."
																			GROUP BY faculty_id,reason;");					
										 				$result9 = $stmt9->execute();
										 				$rows9 = $stmt9->fetch(PDO::FETCH_ASSOC);

										 				$stmt10 = $conn->prepare( "SELECT A.id as 'record_id', code, name, COUNT(code) as 'ol'
																			FROM(SELECT faculty_id, status_id, reason,date
																				 FROM (SELECT C.id as 'offering_id', course_id, F.id as 'faculty_id'
																					   FROM faculty F
																					   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																				 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																			     WHERE ".$dateFilter.") as Z
																			INNER JOIN attendancestatus A ON A.id = Z.status_id
																			".$filter3." AND reason = 'ol' AND ".$filter2."
																			GROUP BY faculty_id,reason;");					
										 				$result10 = $stmt10->execute();
										 				$rows10 = $stmt10->fetch(PDO::FETCH_ASSOC);

										 				$stmt11 = $conn->prepare( "SELECT A.id as 'record_id', code, name, COUNT(code) as 'sw'
																			FROM(SELECT faculty_id, status_id, reason,date
																				 FROM (SELECT C.id as 'offering_id', course_id, F.id as 'faculty_id'
																					   FROM faculty F
																					   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																				 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																			     WHERE ".$dateFilter.") as Z
																			INNER JOIN attendancestatus A ON A.id = Z.status_id
																			".$filter3." AND reason = 'sw' AND ".$filter2."
																			GROUP BY faculty_id,reason;");					
										 				$result11 = $stmt11->execute();
										 				$rows11 = $stmt11->fetch(PDO::FETCH_ASSOC);

										 				$stmt12 = $conn->prepare( "SELECT A.id as 'record_id', code, name, COUNT(code) as 'sb'
																			FROM(SELECT faculty_id, status_id, reason,date
																				 FROM (SELECT C.id as 'offering_id', course_id, F.id as 'faculty_id'
																					   FROM faculty F
																					   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																				 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																			     WHERE ".$dateFilter.") as Z
																			INNER JOIN attendancestatus A ON A.id = Z.status_id
																			".$filter3." AND reason = 'sb' AND ".$filter2."
																			GROUP BY faculty_id,reason;");					
										 				$result12 = $stmt12->execute();
										 				$rows12 = $stmt12->fetch(PDO::FETCH_ASSOC);

										 				$stmt13 = $conn->prepare( "SELECT A.id as 'record_id', code, name, COUNT(code) as 'la'
																			FROM(SELECT faculty_id, status_id, reason,date
																				 FROM (SELECT C.id as 'offering_id', course_id, F.id as 'faculty_id'
																					   FROM faculty F
																					   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																				 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																			     WHERE ".$dateFilter.") as Z
																			INNER JOIN attendancestatus A ON A.id = Z.status_id
																			".$filter3." AND reason = 'la' AND ".$filter2."
																			GROUP BY faculty_id,reason;");					
										 				$result13 = $stmt13->execute();
										 				$rows13 = $stmt13->fetch(PDO::FETCH_ASSOC);

										 				$stmt14 = $conn->prepare( "SELECT A.id as 'record_id', code, name, COUNT(code) as 'ed'
																			FROM(SELECT faculty_id, status_id, reason,date
																				 FROM (SELECT C.id as 'offering_id', course_id, F.id as 'faculty_id'
																					   FROM faculty F
																					   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
																				 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
																			     WHERE ".$dateFilter.") as Z
																			INNER JOIN attendancestatus A ON A.id = Z.status_id
																			".$filter3." AND reason = 'ed' AND ".$filter2."
																			GROUP BY faculty_id,reason;");					
										 				$result14 = $stmt14->execute();
										 				$rows14 = $stmt14->fetch(PDO::FETCH_ASSOC);

										 				

										 				echo "<tr>
										 				<td id = 'name' class='tg-e1mw'>".$rows['last_name'].", ".$rows['first_name']." ".$rows['middle_name']."</td>
										 				<td class='tg-e1mw'>".$rows0['LOAD']."</td>
										 				<td class='tg-e1mw'>".$rows2['cf']."</td>
										 				<td class='tg-e1mw'>".$rows3['pm']."</td>
										 				<td class='tg-e1mw'>".$rows4['si']."</td>
										 				<td class='tg-e1mw'>".$rows5['xx']."</td>
										 				<td class='tg-e1mw'>".$rows['Total']."</td>
										 				<td class='tg-e1mw'>".$rows6['make-up']."</td>
										 				<td class='tg-e1mw'>".$rows7['ob']."</td>
										 				<td class='tg-e1mw'>".$rows8['ac']."</td>
										 				<td class='tg-e1mw'>".$rows9['ft']."</td>
										 				<td class='tg-e1mw'>".$rows10['ol']."</td>
										 				<td class='tg-e1mw'>".$rows11['sw']."</td>
										 				<td class='tg-e1mw'>".$rows12['sb']."</td>
										 				<td class='tg-e1mw'>".$rows13['la']."</td>
										 				<td class='tg-e1mw'>".$rows14['ed']."</td></tr>";

										 			}while($rows = $stmt->fetch(PDO::FETCH_ASSOC));

										 			echo "
												  	</table>
													</div>
													</div>
													</div>
													<br><br>
											    	</div>";

												}
												else
											 		echo "<h1> NO RECORDS FOUND </h1>";
												
												
											
											  	
											}
											
									 		
											
										?>

	<!-- GENERATE REPORTS MODAL -->
		<div class="modal fade" id="generate-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="addaymodal-container" id = "daily-container">
					<form class = "form form-horizontal" action="generatereports.php" method="POST">
						<fieldset>
							<legend style = "margin-bottom:-10px;"></legend>
							<h3><legend class="text-center"><b>GENERATE REPORTS</b></legend></h3>

			            	 <div class="form-group">
			            	 	<label class = "control-label col-xs-4" style = "text-align:left;">Type:</label>
						        <div class="col-xs-5">
						        	<select id = "report-type" class = "selectpicker show-tick" data-width = "155px" name ="buttons" onchange = "change()">
						        		<option id ="dailyButton" value = "daily"> Daily </option>
						        		<option value = "term"> Term-End </option>
						        		<option value = "custom"> Custom </option>
						        		<option value = "promotional"> Promotional </option>
						        	</select>
						        </div>
			            	 </div>
									


			            	 <div class="form-group">
			            	 	<label class = "control-label col-xs-4" style = "text-align:left;">Date:</label>
			            	 	
			            	 	<div id = "inputDaily" class = "col-xs-8">
			            	 		<input style = "width:100px;" type="text" class="form-control" id = "dailydate" name="dailydate"/>
			            	 	</div>
								
			            		<div id = "inputTerm" class = "col-xs-4" name = "terms" style = "display:none;">
						                
						                <select class="selectpicker show-tick" style = "text-align:left;" data-width = "155px"name ="academicyears">
												<option seleccted>A.Y. 2015-2016</option>
												
									    </select>
									    <br><br>
						                <select class="selectpicker show-tick" style = "text-align:left;" data-width = "155px" name ="terms">
												<option value = "1" selected>Term 1</option>
												<option value = "2">Term 2</option>
												<option value = "3">Term 3</option>
												
									    </select>

			            		</div>



			            		<div id = "inputCustom" class="col-xs-8" style = "display:none;">
						                <div id="reportrange" class="pull-right" style = "width:230px">
										    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
										    <span></span> <b class="caret" style = "float:right;margin-top:5px;"></b>
										</div>
			              			 
					    		</div>
								
								<div id = "inputPromo" class="col-xs-8" style = "display:none;margin-top:5px;">
									<span><i>start up to present</i></span>
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
					            	 		<input style = "width:214px"type="text" class="form-control"	id= "idnumber" name="idnumber"/>
					            	 	</div>
					            	</div>

				            	 	<div class="form-group">
					            	 	<label class = "control-label col-xs-4" style = "text-align:left; margin-left:15px;">
					            	 		<input type="radio" name="inputs" id="inputName" value="name">&nbsp;&nbsp;by Name: </label>
					            	 	<div class = "col-xs-3">
					            	 		<input style = "width:214px" type="text" class="form-control"	id= "name" name="name" readonly/>

					            	 	</div>
					            	</div>
							    </div>

							</div>

						    <div id = "inputOthersDaily" style = "display:none;">

							    <div class = "form-group">
							    	<input type ="hidden" id = "department" name = "department" value = "All Departments"/>
				            	 		<label class = "control-label col-xs-4" style = "text-align:left;">Report filter:</label>
				            	 		<div class = "col-xs-5" style="width:250px">
											<select id = "collegepicker" class="selectpicker show-tick" style = "text-align:left;" name ="college">
												<option value = "All Colleges" selected>All Colleges</option>
												<option value = "BAGCED">BAGCED</option>
												<option value = "CCS">CCS</option>
												<option value = "CLA">CLA</option>
												<option value = "COL">COL</option>
												<option value = "COS">COS</option>
												<option value = "GCOE">GCOE</option>
												<option value = "RVRCOB">RVRCOB</option>
												<option value = "SOE">SOE</option>
											</select>
				            	 		
				            	 		</div>
							    </div>

							    <div class = "form-group">
				            	 		<label class = "control-label col-xs-4" style = "text-align:left;"></label>
				            	 		<div id = "CCS" class = "col-xs-5">          	 			
											<select id = "departmentpicker" class="selectpicker show-tick" name = "ccs">
												<option> Computer Technology</option>
												<option> Software Technology</option>
												<option> Information Technology</option>
											
											</select> 	
				            	 		</div>
				            	 		<div id = "BAGCED" class = "col-xs-5">          	 			
											<select id = "departmentpicker" class="selectpicker show-tick" name = "bagced">
												<option> English and Applied Linguistics</option>
												<option> Science Education</option>
												<option> Physical Education</option>
											
											</select> 	
				            	 		</div>
				            	 		<div id = "COL" class = "col-xs-5">          	 			
											<select id = "departmentpicker" class="selectpicker show-tick" name = "col">
												<option> Law</option>
												
											
											</select> 	
				            	 		</div>
				            	 		<div id = "CLA" class = "col-xs-5">          	 			
											<select id = "departmentpicker" class="selectpicker show-tick" name = "cla">
												<option> Theology and Religious Studies</option>
												<option> History </option>
												<option> Behavioral Sciences </option>
												<option> Communication </option>
												<option> Philosophy </option>
												<option> Filipino </option>
												<option> International Studies </option>
												<option> Political Science </option>
												<option> Psychology </option>
												<option> Literature </option>
											
											</select> 	
				            	 		</div>
				            	 		<div id = "COS" class = "col-xs-5">          	 			
											<select id = "departmentpicker" class="selectpicker show-tick" name = "cos">
												<option> Biology </option>
												<option> Chemistry </option>
												<option> Physics </option>
												<option> Mathematics</option>
											
											</select> 	
				            	 		</div>
				            	 		<div id = "GCOE" class = "col-xs-5">          	 			
											<select id = "departmentpicker" class="selectpicker show-tick" name = "gcoe">
												<option> Chemical Engineering </option>
												<option> Civil Engineering </option>
												<option> Electronics and Communications Engineering </option>
												<option> Industrial Engineering </option>
												<option> Mechanical Engineering </option>
												<option> Manufacturing Engineering and Management </option>
											
											</select> 	
				            	 		</div>
				            	 		<div id = "RVRCOB" class = "col-xs-5">          	 			
											<select id = "departmentpicker" class="selectpicker show-tick" name = "rvrcob">
												<option> Accountancy </option>
												<option> Marketing Management </option>
												<option> Management and Organization </option>
												<option> Financial Management </option>
												<option> Commercial Law </option>
											
											</select> 	
				            	 		</div>
				            	 		<div id = "SOE" class = "col-xs-5">          	 			
											<select id = "departmentpicker" class="selectpicker show-tick" name = "soe">
												<option> Economics</option>

											</select> 	
				            	 		</div>
				            	 		<div id = "All" class = "col-xs-5">          	 			
											<select id = "departmentpicker" class="selectpicker show-tick" name = "all">												
												<option> All Departments</option>
											</select> 	
				            	 		</div>
							    </div>
							</div>
							<br>

						    <div class="text-center">
						        <button id="btnViewReportDaily" type="submit" class="btn btn-success col-xs-4 submit" style = "margin-left:40px; margin-right:30px;font-size:14px;"> <i class="glyphicon glyphicon-th-list"></i> GENERATE </button> 
						        
						        <button type="button" class="btn btn-danger col-xs-4 cancel" data-dismiss="modal" style="
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