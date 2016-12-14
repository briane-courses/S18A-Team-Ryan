<html> 
<?php
	include "connector.php";
	
	$filter = isset($_GET["filter"]) ? $_GET["filter"] : false;
	$dateFilter = isset($_GET["dateFilter"]) ? $_GET["dateFilter"] : false;
	$labeldate = isset($_GET["labeldate"]) ? $_GET["labeldate"] : false;
	$buttons = isset($_GET["buttons"]) ? $_GET["buttons"] : false;

?>
<head>
		<meta charset = "UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<title> Daily Faculty Report - All </title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link href="css/global.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/generatedaily-all.css">
		<link rel="stylesheet" href="../css/generatemonthlyterm.css">
		<link rel="stylesheet" href="../css/dashboard.css">
		<link rel="stylesheet" type="text/css" href="../css/table.css">
		<link rel="stylesheet" type="text/css" href="../css/daterangepicker.css"/>
		<!-- DROPDOWN-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
		<!-- FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Bungee|Gudea" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src = "../js/jquery-3.0.0.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="../js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="../js/moment.js"></script>
	    <script type="text/javascript" src="../js/daterangepicker.js"></script>
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

		          <ul class="nav navbar-nav" style="padding:7px;">

		            <li>

		              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ayModal" id="dashay-button"><b>Current AY: 2016 - 2017 || Term 1<b></button>
		            </li>

		          </ul>

		          <ul class="nav navbar-nav navbar-right">
		            <li><a href="index.html"><b>Log Out</b></a></li>
		          </ul>

		        </div>
			    <!-- /.navbar-collapse -->
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

					<a href = "../dashboard.html" data-toggle="modal" class="navbar-btn btn-success btn" style = "margin-top:-5px;">
			      	<span class="glyphicon glyphicon-chevron-left"></span> BACK </a> &nbsp;

					<a href="print.php" target= "_blank"class="navbar-btn btn-success btn" style = "margin-top:-5px;">
				     <span class="glyphicon glyphicon-print"></span> PRINT </a> &nbsp;

			      	<a href="#" data-toggle="modal" data-target = "#email-modal" class="navbar-btn btn-success btn" style = "margin-top:-5px;">
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
		 			echo $table1 ="	
		 				<br>
						<div class='row'>
						<div class ='box col-md-12'>
						<div class='box-content'>
	 					<table id='resulttable' name = 'resulttable' class='table table-bordered table-striped table-condensed'>
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
		 			
		 			$table2 = "";
		 			do
		 			{

						echo $temp="<tr class='row-data' data-href='#'>
						<td>".$rows['department']."</td>
						<td>".$rows['last_name'].", ".$rows['first_name']." ".$rows['middle_name']."</td>
						<td>".$rows['time_start']." - ".$rows['time_end']."</td>
						<td>".$rows['code']."</td>
						<td>".$rows['section']."</td>
						<td>".$rows['room_name']."</td>
						<td>".$rows['remarks']."</td></tr>";

						$table2.=$temp;
							
					}while($rows = $stmt->fetch(PDO::FETCH_ASSOC));

					echo $table3="</tbody> </table>
						  </div>
						  </div>
						  </div><br><br>";

					$table= "<h4><b>FACULTY ATTENDANCE REPORT</b></h4>".$labeldate.$table1.$table2.$table3;
					//On page 1
					$_SESSION['table'] = $table;
					
				}
		 		else
		 			echo "<script>
					      alert('No Records Found.');
					      window.location.replace('../dashboard.html');
					      </script>";
										 		
			}
			else
			{
												
				$dateFilter2 = "(".str_replace("date", "start", $dateFilter).") AND (".str_replace("date", "end", $dateFilter).") ";
												
				$stmt = $conn->prepare( "SELECT department, college, first_name,middle_name,last_name, faculty_id
											FROM (
												SELECT department,first_name, college, middle_name,last_name, faculty_id
												FROM (
													SELECT department, college, first_name,middle_name,last_name,term_id,C.id as 'offering_id',F.id as 'faculty_id' 
													FROM faculty F INNER JOIN courseoffering C ON C.faculty_id = F.id ".$filter."
											        ) as Y 
													INNER JOIN term T ON T.id = Y.term_id 
													WHERE ".$dateFilter2." 
												) as Z 
											GROUP BY faculty_id;");
																					
				$filter = "WHERE code = 'AB' ";

												
				$filter3 = "WHERE code <> 'AB' ";

				$result = $stmt->execute();
				if($rows = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					echo $table1 ="
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

				  	$table2 ="";
				  	do
					{
						$filter2 = "faculty_id = ".$rows['faculty_id'];

		 				$stmt1 = $conn->prepare( "SELECT first_name, middle_name,last_name, COUNT(*)*3.0 as 'LOAD', courseoffering_id, faculty_id 
													FROM (
														SELECT first_name,middle_name,last_name, C.id as 'courseoffering_id', faculty_id, term_id 
													    FROM courseoffering C INNER JOIN faculty F ON F.id = C.faculty_id) as X 
													INNER JOIN term T on X.term_id = T.id 
													WHERE ".$dateFilter2."AND ".$filter2."
													GROUP BY faculty_id;
													");
		 				$result1 = $stmt1->execute();
		 				$rows1 = $stmt1->fetch(PDO::FETCH_ASSOC);

		 				$stmt2 = $conn->prepare( "SELECT M.date, X.attendance_id, M.id as 'makeupclass_id', COUNT(X.attendance_id)*1.5 as 'make-up'
											FROM(SELECT faculty_id, status_id, remarks,date, A.id as 'attendance_id', department, college
												FROM (SELECT C.id as 'offering_id', course_id, F.id as 'faculty_id', department, college
													  FROM faculty F
													  INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
												INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
												WHERE ".$dateFilter.") as X
											INNER JOIN makeupclass M ON M.attendance_id = X.attendance_id
											WHERE ".$filter2." 
											GROUP BY faculty_id");					
		 				$result2 = $stmt2->execute();
		 				$rows2 = $stmt2->fetch(PDO::FETCH_ASSOC);

		 				$stmt3 = $conn->prepare( "SELECT faculty_id, A.id as 'record_id', code, name, COUNT(code)*1.5 as 'Total'
											FROM (SELECT faculty_id, status_id, remarks,date , department, college
											 FROM (SELECT C.id as 'offering_id',F.id as 'faculty_id', department, college 
												   FROM faculty F
												   INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y
											 INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id
										     WHERE ".$dateFilter.") as Z
										INNER JOIN attendancestatus A ON A.id = Z.status_id
										".$filter." AND ".$filter2."
										GROUP BY faculty_id;
										");			
														
						$result3 = $stmt3->execute();
						$rows3 = $stmt3->fetch(PDO::FETCH_ASSOC);


		 				$stmt0 = $conn->prepare("SELECT faculty_id, A.id as 'record_id', code, remarks, count(*) as 'count'
													FROM (
														SELECT faculty_id, status_id, remarks,date , department, college 
														FROM (
															SELECT C.id as 'offering_id',F.id as 'faculty_id', department, college 
															FROM faculty F INNER JOIN courseoffering C ON C.faculty_id = F.id) as Y 
														INNER JOIN attendance A ON A.courseoffering_id = Y.offering_id 
														WHERE ".$dateFilter." ) as Z 
													INNER JOIN attendancestatus A ON A.id = Z.status_id 
													WHERE ".$filter2."
													GROUP BY remarks;");
 						$result0 = $stmt0->execute();									 				
 						$array['CF'] = "--";
		 				$array['PM'] = "--";
		 				$array['SI'] = "--";
		 				$array['XX'] = "--";
		 				$array['OB'] = "--";
		 				$array['AC'] = "--";
		 				$array['FT'] = "--";
		 				$array['OL'] = "--";
		 				$array['SW'] = "--";
		 				$array['SB'] = "--";
		 				$array['LA'] = "--";
		 				$array['ED'] = "--";
		 				if($rows3['Total'] == null)
							$rows3['Total'] = "--";
						if($rows2['make-up'] == null)
							$rows2['make-up'] = "--";

						for($count =0; $count < 12; $count++)
						{
						$rows0 = $stmt0->fetch(PDO::FETCH_ASSOC);
						$index = $rows0['remarks'];
										 					
						if($index != 'LA' && $index != 'ED')
							$array[$index] = $rows0['count']*1.5;
						else
							$array[$index] = $rows0['count'];
										 					
						}



						echo $temp ="<tr>
						<td id = 'name' class='tg-e1mw'>".$rows['last_name'].", ".$rows['first_name']." ".$rows['middle_name']."</td>
						<td class='tg-e1mw'>".$rows1['LOAD']."</td>
						<td class='tg-e1mw'>".$array['CF']."</td>
						<td class='tg-e1mw'>".$array['PM']."</td>
						<td class='tg-e1mw'>".$array['SI']."</td>
						<td class='tg-e1mw'>".$array['XX']."</td>
						<td class='tg-e1mw'>".$rows3['Total']."</td>
						<td class='tg-e1mw'>".$rows2['make-up']."</td>
						<td class='tg-e1mw'>".$array['OB']."</td>
						<td class='tg-e1mw'>".$array['AC']."</td>
						<td class='tg-e1mw'>".$array['FT']."</td>
						<td class='tg-e1mw'>".$array['OL']."</td>
						<td class='tg-e1mw'>".$array['SW']."</td>
						<td class='tg-e1mw'>".$array['SB']."</td>
						<td class='tg-e1mw'>".$array['LA']."</td>
						<td class='tg-e1mw'>".$array['ED']."</td></tr>";

						$table2.=$temp;
					}while($rows = $stmt->fetch(PDO::FETCH_ASSOC));

					echo $table3 ="
						</table>
						</div>
						</div>
						</div>
						<br><br>
						</div>";

					$table= "<h4><b>FACULTY ATTENDANCE REPORT</b></h4>".$labeldate.$table1.$table2.$table3;
					//On page 1
					$_SESSION['table'] = $table;

				}else
		 			echo "<script>
					  alert('No Records Found.');
					  window.location.replace('../dashboard.html');
					  </script>";									  	
		
			}
?>

<!-- EMAIL MODAL -->
		<div class="modal fade" id="email-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		 <div class="modal-dialog">
				<div class="addaymodal-container" id = "searchrecords-container">
					<form action="generatereports.php" class="form form-horizontal" method="post">
						<fieldset>
							<legend style = "margin-bottom:-10px;"></legend>
							<h3><legend class="text-center"><b>EMAIL</b></legend></h3>

							<!--<div class="form-group">
				                <label class="control-label col-xs-4" style="text-align:left;">Type:</label>
				                <div class="col-xs-5">
				                  <select id="email-type" class="selectpicker show-tick" data-width="155px" onchange="email()">
				                        <option value ="daily-email"> Daily </option>
				                        <option value = "monthly-email"> Monthly </option>
								        <option value = "term-email"> Term-End </option>
				                        <option value = "custom-email"> Custom </option>
				                      </select>
				                </div>
			              	</div>

			              	<div class="form-group">
				                <label class="control-label col-xs-4" style="text-align:left;">Date:</label>

				                <div id="emailDaily" class="col-xs-8">
				                  <input style="width:100px;" type="text" class="form-control" id="dailydate2" name="dailydate2" />
				                </div>

				                <div id="emailMonthly" class="col-xs-4" name="monthly" style="display:none;">

				                  <select class="selectpicker show-tick" style="text-align:left;;" name="months" data-width="110px">
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

				                <div id="emailMonthly2" style="display:none;">
				                  <select id="try" class="selectpicker show-tick" style="text-align:left;" name="years" data-width="100px">
				                        <option selected>2016</option>
				                        <option>2015</option>

				                  </select>
				                </div>

				                <div id="emailCustom" class="col-xs-8" style="display:none;margin-left:-20px;">
				                  <div id="reportrange" class="pull-right" style="width:230px;">
				                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
				                    <span></span> <b class="caret" style="float:right;margin-top:5px;"></b>
				                    <input type="hidden" class="form-control" id="dates" name="dates" />
				                  </div>
				                </div>

				                <div id="emailTerm" class="col-xs-4" name="terms" style="display:none;">

				                  <select class="selectpicker show-tick" style="text-align:left;" data-width="155px" name="academicyears">
				                        <option seleccted>A.Y. 2015-2016</option>

				                      </select>
				                  <br><br>
				                  <select class="selectpicker show-tick" style="text-align:left;" data-width="155px" name="terms">
				                        <option value = "1" selected>Term 1</option>
				                        <option value = "2">Term 2</option>
				                        <option value = "3">Term 3</option>

				                  </select>


				                </div>



				            </div>-->


				            <div class = "email">
								<div class="form-group">
									<label class="control-label col-xs-4" style="text-align:left;">To:</label>
									<div class="col-xs-5" style="width:250px">
					                    <select id="email-receivers" class="selectpicker show-tick" style="text-align:left;" name="emailadd" data-width="155px" onchange = changeReceipients(); >
					                        <option value = "All Faculty" selected>All Faculty</option>
					                        <option value = "SpecFaculty">A Specific Faculty</option>
					                        <option value = "Custom">Custom</option>
				                      </select>

				                  	</div>
								</div>
							</div>

							<div id="custom-email" style = "display:none;">
								<div class="form-group">
									<label class="control-label col-xs-4" style="text-align:left;"></label>
									<div class="col-xs-8">
										<input class="form-control" type="text" value = "ccs@dlsu.edu.ph">
									</div>
								</div>
							</div>

							<div id="specific-email" style = "display:none;">
				                <div class="form-group">
				                  <div class="form-group">
				                    <label class="control-label col-xs-4" style="text-align:left; margin-left:15px;">
				                            <input type="radio" name="inputs" id="inputID" value="idnumber"checked>&nbsp;&nbsp;by ID Number: </label>
				                    <div class="col-xs-3">
				                      <input style="width:80px" type="text" class="form-control" id="idnumber" name="idnumber" maxlength="8" />
				                    </div>
				                  </div>

				                  <div class="form-group">
				                    <label class="control-label col-xs-4" style="text-align:left; margin-left:15px;">
				                            <input type="radio" name="inputs" id="inputName" value="name">&nbsp;&nbsp;by Name: </label>
				                    <div class="col-xs-3">
				                      <input style="width:214px" type="text" class="form-control" id="name" name="name" placeholder="Last Name, FirstName" readonly/>

				                    </div>
				                  </div>
				                </div>

				            </div>

							<br>
							<div class="text-center">
								<button class="submit btn btn-success col-xs-3" style="margin-left:85px; margin-right:30px;" type="submit"><i class="glyphicon glyphicon-envelope"></i> EMAIL</button> <button class="cancel btn btn-danger col-xs-3" data-dismiss="modal" type="button"><i class="glyphicon glyphicon-remove"></i> DISCARD</button>
							</div>
						<br>
						</fieldset>
					</form>
				</div>
		  </div>
		</div>



    	</div>

    </body>

</html>								
									 