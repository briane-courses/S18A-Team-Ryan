<?php
    include "connector.php";

    $stmt = $conn->prepare("SELECT * FROM Faculty WHERE id = :idNumber");
    $stmt->execute(["idNumber" => $_GET["id"]]);
    $faculty = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conn->prepare("SELECT date, time_start, time_end, Course.name AS course, section, Room.name AS room, CheckerAccount.user_name AS checker, remarks
        FROM Attendance, CourseOffering, Course, CheckerAccount, Room, RotationRoom, Rotation
        WHERE faculty_id = :idNumber
            AND CourseOffering.course_id = Course.id
            AND courseoffering_id = CourseOffering.id
            AND CourseOffering.room_id = Room.id
            AND RotationRoom.room_id_list LIKE CONCAT('%', Room.id, '%')
            AND RotationRoom.id = Rotation.id
            AND Rotation.id = CheckerAccount.rotation_id;");
    $stmt->execute(["idNumber" => $_GET["id"]]);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Search Specific Faculty</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/searchspecific-faculty.css" rel="stylesheet">
	<link href="../css/dashboard.css" rel="stylesheet">
	<link href="../css/add-AY.css" rel="stylesheet">
	<link href="../css/daterangepicker.css" rel="stylesheet" type="text/css"><!-- DROPDOWN-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css" rel="stylesheet"><!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
	<link href="../css/bootstrap-timepicker.min.css" type="text/css"><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	<script src="../js/jquery-3.0.0.min.js">
	</script><!-- Include all compiled plugins (below), or include individual files as needed -->

	<script src="../js/bootstrap.min.js">
	</script>
	<script src="../js/moment.js" type="text/javascript">
	</script>
	<script src="../js/daterangepicker.js" type="text/javascript">
	</script>
	<script src="http://momentjs.com/downloads/moment-with-locales.js">
	</script>
	<script src="http://momentjs.com/downloads/moment-timezone-with-data.js">
	</script><!-- DROPDOWN -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js">
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
	           $(document).ready(function($) {
	               $(".table-row").click(function() {
	                   window.document.location = $(this).data("href");
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
	           $(document).ready(function($) {
	               $(".row-data").click(function() {
	                   window.document.location = $(this).data("href");
	               });
	           });
	</script>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button class="navbar-toggle" data-target="#navbar-brand-centered" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
				<div class="navbar-brand navbar-brand-centered">
					FAMS
				</div>
			</div><!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-brand-centered">
				<ul class="nav navbar-nav">
					<li>
						<a href="dashboard.html"><b>Maintenance</b></a>
					</li>
					<li>
						<a href="dashboard-reports.html"><b>Reports</b></a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="padding:7px;">
					<li><button class="btn btn-default" id="dashay-button" type="button"><b>Current AY: 2016 - 2017 || Term 1</b></button></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container" style="margin-top:-20px;">
		<div class="im-centered-body">
			<div class="row">
				<div style="margin:auto;width:98%;margin-left:150px">
					<div class="box col-xs-3 searchresults-box">
						<div class="box-inner innerbox">
							<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label>Type of Classes</label>
							<div class="radio" id="class-choose">
								&nbsp;<label><input checked name="class-type" type="radio">Normal</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label><input name="class-type" type="radio">Makeup</label>
							</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label class="checkbox-inline"><input checked id="inlineCheckbox1" name="load-type" type="checkbox" value="option1"> Undergraduate</label> <label class="checkbox-inline"><input id="inlineCheckbox1" name="load-type" type="checkbox" value="option1"> Graduate</label>
						</div>
					</div>
				</div>
				<div class="box col-xs-2 searchresults-box">
					<div class="box-inner innerbox">
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label>Filter by</label>
						<div class="radio" id="class-choose">
							&nbsp;<label><input checked name="filter-type" type="radio">Daily</label><br>
							&nbsp;<label><input name="filter-type" type="radio">Monthly</label><br>
							&nbsp;<label><input name="filter-type" type="radio">Term-End</label>
						</div>
					</div>
				</div>
				<div class="box col-xs-3 searchresults-box">
					<div class="box-inner innerbox">
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label>Filter Input</label>
						<form class="form form-horizontal">
							<div class="form-group">
								<label class="control-label col-xs-5" style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date</label>
								<div class="col-xs-1">
									<input class="form-control" name="dailydate" style="width:130px;" type="text" value="10/31/2016">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-5" style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Month</label>
								<div class="col-xs-1">
									<select style="width:130px;height:25px">
										<option selected>
											January
										</option>
										<option>
											February
										</option>
										<option>
											March
										</option>
										<option>
											April
										</option>
										<option>
											May
										</option>
										<option>
											June
										</option>
										<option>
											July
										</option>
										<option>
											August
										</option>
										<option>
											September
										</option>
										<option>
											October
										</option>
										<option>
											November
										</option>
										<option>
											December
										</option>
									</select>
								</div>
							</div>
							<div class="form-group" style="display:none;">
								<label class="control-label col-xs-5" style="text-align:left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Year</label>
								<div class="col-xs-1" style="width:130px;">
									<select style="width:130px;height:25px">
										<option selected>
											Term 1
										</option>
										<option>
											February
										</option>
										<option>
											March
										</option>
										<option>
											April
										</option>
										<option>
											May
										</option>
										<option>
											June
										</option>
										<option>
											July
										</option>
										<option>
											August
										</option>
										<option>
											September
										</option>
										<option>
											October
										</option>
										<option>
											November
										</option>
										<option>
											December
										</option>
									</select>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="box col-xs-1 searchresults-box text-center">
					<div class="box-inner innerbox">
						<br>
						<label>Search</label><br>
						<button class="btn btn-lg btn-success" data-target="#searchrecords-modal" data-toggle="modal"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
			</div>
		</div><br>
		<h5 id="title-header">Search Results</h5>
		<div class="row">
			<div class="box col-xs-12">
				<div class="box-inner">
					<div class="row">
						<br>
						<p class="col-xs-1"></p>
						<p class="col-xs-2">Faculty Name:</p>
						<p class="col-xs-3"><b><?php echo $faculty['last_name']. ", " . $faculty['first_name'] . " " . $faculty['middle_name']; ?></b></p>
						<p class="col-xs-2"></p>
						<p class="col-xs-2">Faculty ID:</p>
						<p class="col-xs-2"><?php echo $faculty['id']; ?></p>
					</div>
					<div class="row">
						<p class="col-xs-1"></p>
						<p class="col-xs-2"></p>
						<p class="col-xs-3"><?php echo $faculty['department']; ?></p>
					</div>
					<div class="row">
						<p class="col-xs-1"></p>
						<p class="col-xs-2"></p>
						<p class="col-xs-3"><?php echo $faculty['college']; ?></p>
					</div>
				</div>
			</div>
		</div><br>
		<br>
		<br>
		<div class="row">
			<div class="box col-xs-12">
				<div class="box-content">
					<table class="table table-bordered table-condensed table-hover">
						<thead>
							<tr>
								<th>Date</th>
								<th>Time</th>
								<th>Course</th>
								<th>Section</th>
								<th>Room</th>
								<th>Checker</th>
								<th>Remarks</th>
							</tr>
						</thead>
						<tbody>
                            <?php
                                foreach ($stmt as $row) {
									echo "<tr class='row-data' data-href='#'>
										<td>".$row["date"]."</td>
										<td>".$row["time_start"]." - ".$row["time_end"]."</td>
										<td>".$row["course"]."</td>
										<td>".$row["section"]."</td>
										<td>".$row["room"]."</td>
										<td>".$row["checker"]."</td>
										<td>".$row["remarks"]."</td>
									</tr>";
								}
                            ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div><!-- SEARCH ATTENDANCE RECORDS MODAL -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="searchrecords-modal" role="dialog" style="display: none;" tabindex="-1">
		<div class="modal-dialog">
			<div class="addaymodal-container" id="searchrecords-container">
				<form class="form form-horizontal">
					<fieldset>
						<legend class="text-center"></legend>
						<h3><legend class="text-center"><b>Search Attendance Records</b></legend></h3>
						<div class="form-group">
							<label class="control-label col-xs-5" style="text-align:left;"><input checked id="search1" name="search-options" type="radio" value="1">&nbsp;&nbsp;by ID Number:</label>
							<div class="col-xs-4">
								<input class="form-control" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-5" style="text-align:left;"><input checked id="search1" name="search-options" type="radio" value="1">&nbsp;&nbsp;by Name:</label>
							<div class="col-xs-4">
								<input class="form-control" type="text">
							</div>
						</div><br>
						<div class="text-center">
							<button class="submit btn btn-success col-xs-3" style="margin-left:85px; margin-right:30px;" type="submit"><i class="glyphicon glyphicon-search"></i> SUBMIT</button> <button class="cancel btn btn-danger col-xs-3" data-dismiss="modal" type="button"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<div class="navbar navbar-fixed-bottom">
		<div class="container text-center">
			<div class="im-centered">
				<a class="navbar-btn btn-success btn" data-target="#addrecord-modal" data-toggle="modal" href="#"><span class="glyphicon glyphicon-plus"></span> ADD NEW RECORD</a> <a class="navbar-btn btn-success btn" data-target="#modifyrecord-modal" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span> MODIFY</a> <a class="navbar-btn btn-danger btn" href="http://youtu.be/zJahlKPCL9g"><span class="glyphicon glyphicon-trash"></span> REMOVE</a> <a class="navbar-btn btn-success btn" data-target="#makeup-modal" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> ADD MAKE UP CLASS</a>
			</div>
		</div>
	</div><!-- ADD NEW RECORD MODAL -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="addrecord-modal" role="dialog" style="display: none;" tabindex="-1">
		<div class="modal-dialog">
			<div class="addaymodal-container" id="daily-container">
				<form action="php/generate-daily.php" class="form form-horizontal" method="post">
					<fieldset>
						<legend class="text-center"></legend>
						<h3><legend class="text-center"><b>Add New Attendance Record</b></legend></h3>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Faculty ID No:</label>
							<div class="col-xs-8">
								<input class="form-control" type="text" value="123456">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Faculty Name:</label>
							<div class="col-xs-8">
								<input class="form-control" type="text" value="Briane Samson">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Absence Date:</label>
							<div class="col-xs-8">
								<input class="form-control" name="dailydate" type="text" value="10/31/2016">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Course:</label>
							<div class="col-xs-8">
								<select style="text-align:left;width:180px;height:30px;">
									<option selected>
										SOFENGG
									</option>
									<option>
										SWDESPA
									</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Section:</label>
							<div class="col-xs-8">
								<input class="form-control" id="section" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Checker:</label>
							<div class="col-xs-8">
								<input class="form-control" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Remarks:</label>
							<div class="col-xs-8" style="text-align:left;">
								<select style="text-align:left;width:180px;height:30px;">
									<option selected>
										VR Vacant Room
									</option>
									<option>
										CLA
									</option>
									<option>
										COB
									</option>
									<option>
										COS
									</option>
									<option>
										COE
									</option>
									<option>
										CCS
									</option>
									<option>
										CED
									</option>
									<option>
										SOE
									</option>
								</select>
							</div>
						</div><br>
						<div class="text-center">
							<button class="submit btn btn-success col-xs-3" style="margin-left:85px; margin-right:30px;" type="submit"><i class="glyphicon glyphicon-plus"></i> ADD</button> <button class="cancel btn btn-danger col-xs-3" data-dismiss="modal" type="button"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div><!-- MODIFY RECORD MODAL -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modifyrecord-modal" role="dialog" style="display: none;" tabindex="-1">
		<div class="modal-dialog">
			<div class="addaymodal-container" id="daily-container">
				<form action="php/generate-daily.php" class="form form-horizontal" method="post">
					<fieldset>
						<legend class="text-center"></legend>
						<h3><legend class="text-center"><b>Modify Attendance Record</b></legend></h3>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Faculty ID No:</label>
							<div class="col-xs-8">
								<input class="form-control" type="text" value="123456">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Faculty Name:</label>
							<div class="col-xs-8">
								<input class="form-control" type="text" value="Briane Samson">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Absence Date:</label>
							<div class="col-xs-8">
								<input class="form-control" name="dailydate" type="text" value="10/31/2016">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Course:</label>
							<div class="col-xs-8">
								<select style="text-align:left;width:180px;height:30px;">
									<option selected>
										SOFENGG
									</option>
									<option>
										SWDESPA
									</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Section:</label>
							<div class="col-xs-8">
								<input class="form-control" placeholder="S17" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Checker:</label>
							<div class="col-xs-8">
								<input class="form-control" placeholder="Keith" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Remarks:</label>
							<div class="col-xs-8" style="text-align:left;">
								<select style="text-align:left;width:180px;height:30px;">
									<option selected>
										VR Vacant Room
									</option>
									<option>
										CLA
									</option>
									<option>
										COB
									</option>
									<option>
										COS
									</option>
									<option>
										COE
									</option>
									<option>
										CCS
									</option>
									<option>
										CED
									</option>
									<option>
										SOE
									</option>
								</select>
							</div>
						</div><br>
						<div class="text-center">
							<button class="submit btn btn-success col-xs-3" style="margin-left:85px; margin-right:30px;" type="submit"><i class="glyphicon glyphicon-floppy-saved"></i> SAVE</button> <button class="cancel btn btn-danger col-xs-3" data-dismiss="modal" type="button"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div><!-- ADD MAKE UP CLASS MODAL -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="makeup-modal" role="dialog" style="display: none;" tabindex="-1">
		<div class="modal-dialog">
			<div class="addaymodal-container" id="daily-container">
				<form action="php/generate-daily.php" class="form form-horizontal" method="post">
					<fieldset>
						<legend class="text-center"></legend>
						<h3><legend class="text-center"><b>Add Make Up Class</b></legend></h3>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Faculty ID No:</label>
							<div class="col-xs-8">
								<input class="form-control" type="text" value="123456">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Faculty Name:</label>
							<div class="col-xs-8">
								<input class="form-control" type="text" value="Briane Samson">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Date:</label>
							<div class="col-xs-8">
								<input class="form-control" name="dailydate" type="text" value="10/31/2016">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Start Time:</label>
							<div class="col-xs-6">
								<input class="form-control" id="starttime" name="starttime" type="time">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">End Time:</label>
							<div class="col-xs-6">
								<input class="form-control" id="endtime" name="endtime" type="time">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Course:</label>
							<div class="col-xs-8">
								<select style="text-align:left;width:180px;height:30px;">
									<option selected>
										SOFENGG
									</option>
									<option>
										SWDESPA
									</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Section:</label>
							<div class="col-xs-8">
								<input class="form-control" id="section" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Checker:</label>
							<div class="col-xs-8">
								<input class="form-control" type="text">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-xs-4" style="text-align:left;">Remarks:</label>
							<div class="col-xs-8" style="text-align:left;">
								<select style="text-align:left;width:180px;height:30px;">
									<option selected>
										VR Vacant Room
									</option>
									<option>
										CLA
									</option>
									<option>
										COB
									</option>
									<option>
										COS
									</option>
									<option>
										COE
									</option>
									<option>
										CCS
									</option>
									<option>
										CED
									</option>
									<option>
										SOE
									</option>
								</select>
							</div>
						</div><br>
						<div class="text-center">
							<button class="submit btn btn-success col-xs-3" style="margin-left:85px; margin-right:30px;" type="submit"><i class="glyphicon glyphicon-plus"></i> ADD</button> <button class="cancel btn btn-danger col-xs-3" data-dismiss="modal" type="button"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
