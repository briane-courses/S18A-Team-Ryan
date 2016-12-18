<html>
  <?php

    include "/connector.php";


    date_default_timezone_set("Asia/Hong_Kong");
  
    $currentDate = date("Y-m-d");
  
    $sql = "SELECT name, term_no, year_id, start, end
    FROM term NATURAL JOIN academicyear
    Where '" . $currentDate . "' >=start AND '" . $currentDate . "' <=end;";
      $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
      
      $AY = $row[0];
      $Term = $row[1];
      $AYid = $row[2];
      $start = $row[3];
      $end = $row[4];
      if($AY == "" || $Term == ""){
        $Term = "Break";
      }

    $stmt = $conn->prepare("SELECT * FROM academicyear");
        
    $result = $stmt->execute();
    

  ?>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> FAMS 2.0 </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/daterangepicker.css" />
    <!-- DROPDOWN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Bungee|Gudea" rel="stylesheet">


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery-3.0.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/moment.js"></script>
    <script type="text/javascript" src="../js/daterangepicker.js"></script>
    <!-- DROPDOWN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>

    <!--AUTOCOMPLETE CSS -->
    <style>
        #search-id-list, #search-name-list, #id-list, #name-list{
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 80px;
            max-height:150px;
            overflow:auto;
            padding-left:5px;
            margin: 2px 0 0;
            margin-left:15px;
            font-size: 14px;
            font-weight:normal;
            text-align: left;
            list-style: none;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #ccc;
            border: 1px solid rgba(0,0,0,.15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
        }

        #search-name-list{
          width: 90%;
        }

        #name-list{
           width: 215px;
        }

        #search-id-list, #search-name-list, #id-list, #name-list{
          cursor:pointer;
        }

        .hover{
            background-color:#f5f5f5;
        }
    </style>

    <!-- AUTOCOMPLETE JS FOR ATTENDANCE RECORDS -->
    <script type="text/javascript">

      <!-- AutoComplet -->
      function autocompletName() {
        var min_length = 0; // min caracters to display the autocomplete
        var keyword = $('#search-name').val();
        if (keyword.length >= min_length) {
          $.ajax({
            url: 'ajax_refresh.php',
            type: 'POST',
            data: {keyword:keyword},
            success:function(data){
                $('#search-name-list').show();
                $('#search-name-list').html(data);
                $('#search-name-list li').mouseover(function(){
                    $('#search-name-list li').removeClass("hover");
                    $(this).addClass("hover");
                });
            }
          });
        } else {
          $('#search-name-list').hide();
        }
      }
 
      // set_item : this function will be executed when we select an item
      function set_itemName(item) {
        // change input value
        $('#search-name').val(item);
        // hide proposition list
        $('#search-name-list').hide();
      }

      <!-- AutoComplet -->
      function autocompletId() {

        var min_length = 0; // min caracters to display the autocomplete
        var id = $('#search-idnumber').val();
        if (id.length >= min_length) {
          $.ajax({
            url: 'ajax_refresh.php',
            type: 'POST',
            data: {id:id},
            success:function(data){
              $('#search-id-list').show();
              $('#search-id-list').html(data);
              $('#search-id-list li').mouseover(function(){
                  $('#search-id-list li').removeClass("hover");
                  $(this).addClass("hover");
              }); 
            }
          });
        } else {
          $('#search-id-list').hide();
        }
      }
 
      // set_item : this function will be executed when we select an item
      function set_item(item) {
        // change input value
        $('#search-idnumber').val(item);
        // hide proposition list
        $('#search-id-list').hide();
      }
    </script>

    <!-- AUTOCOMPLETE JS FOR GENERATE RECORDS -->
    <script type="text/javascript">
        <!-- AutoComplet -->
          function autocompletNameg() {
            var min_length = 0; // min caracters to display the autocomplete
            var keywordg = $('#name').val();
            if (keywordg.length >= min_length) {
              $.ajax({
                url: 'ajax_refresh.php',
                type: 'POST',
                data: {keywordg:keywordg},
                success:function(data){
                  $('#name-list').show();
                  $('#name-list').html(data);
                  $('#name-list li').mouseover(function(){
                    $('#name-list li').removeClass("hover");
                    $(this).addClass("hover");
                  });
            
                }
              });
            } else {
              $('#name-list').hide();
            }
          }
     
          // set_item : this function will be executed when we select an item
          function set_itemNameg(item) {
            // change input value
            $('#name').val(item);
            // hide proposition list
            $('#name-list').hide();
          }

          <!-- AutoComplet -->
          function autocompletIdg() {

            var min_length = 0; // min caracters to display the autocomplete
            var idg = $('#idnumber').val();
            if (idg.length >= min_length) {
              
              $.ajax({
                url: 'ajax_refresh.php',
                type: 'POST',
                data: {idg:idg},
                success:function(data){
                  $('#id-list').show();
                  $('#id-list').html(data);
                  $('#id-list li').mouseover(function(){
                    $('#id-list li').removeClass("hover");
                    $(this).addClass("hover");
                  });
            
                }
              });
            } else {
              $('#id-list').hide();
            }
          }
     
          // set_item : this function will be executed when we select an item
          function set_itemIdg(item) {
            // change input value
            $('#idnumber').val(item);
            // hide proposition list
            $('#id-list').hide();
          }
    </script>

    <!-- SINGLE CALENDAR -->
    <script type = "text/javascript">
      $(function() {

        var currDate = moment.currDate;

        $('input[name="dailydate"]').daterangepicker({
          singleDatePicker: true,
          showDropdowns: true,
          value: currDate
        });

      });

    </script>
    <style>
      .inactiveLink {
     pointer-events: none;
     cursor: default
     back
    }
    </style>
    <!-- DATE RANGE PICKER -->
    <script type="text/javascript">
      $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
          $('#reportrange span').html(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
          $('#dates').val(start.format('YYYY-MM-DD') + '.' + end.format('YYYY-MM-DD'));

        }

        function cb2(start, end) {
          $('#reportrange2 span').html(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
          $('#dates').val(start.format('YYYY-MM-DD') + '.' + end.format('YYYY-MM-DD'));
        }

        function cb3(start, end) {
          $('#reportrange3 span').html(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
          $('#dates').val(start.format('YYYY-MM-DD') + '.' + end.format('YYYY-MM-DD'));
        }
        $('#reportrange').daterangepicker({
          startDate: start,
          endDate: end,
          ranges: {

          }
        }, cb);

        $('#reportrange2').daterangepicker({
          startDate: start,
          endDate: end,
          ranges: {

          }
        }, cb2);

        $('#reportrange3').daterangepicker({
          startDate: start,
          endDate: end,
          ranges: {

          }
        }, cb3);
          
          cb3(start, end);
      });

    </script>

    <script type="text/javascript">
      $(function() {

        var currDate = moment.currDate;

        $('input[name="dailydate2"]').daterangepicker({
          singleDatePicker: true,
          showDropdowns: true,
          value: currDate
        });

      });

    </script>

    <!-- CHANGING OF REPORT TYPES -->
    <script>
      function change() {
        if (document.getElementById('report-type').value == "daily") {
          $("#inputDaily").show();
          $("#inputTerm").hide();
          $("#inputCustom").hide();
          $("#inputPromo").hide();
          $("#inputMonthly").hide();
          $("#inputMonthly2").hide();
          $("#facultyButtonDaily").removeClass("inactiveLink");
          $("#othersButtonDaily").removeClass("inactiveLink");
        }

        if (document.getElementById('report-type').value == "monthly") {
          $("#inputMonthly").show();
          $("#inputMonthly2").show();
          $("#inputDaily").hide();
          $("#inputCustom").hide();
          $("#inputPromo").hide();
          $("#inputTerm").hide();
          $("#facultyButtonDaily").removeClass("inactiveLink");
          $("#othersButtonDaily").removeClass("inactiveLink");
        }

        if (document.getElementById('report-type').value == "term") {
          $("#inputTerm").show();
          $("#inputDaily").hide();
          $("#inputCustom").hide();
          $("#inputPromo").hide();
          $("#inputMonthly").hide();
          $("#inputMonthly2").hide();
          $("#facultyButtonDaily").removeClass("inactiveLink");
          $("#othersButtonDaily").removeClass("inactiveLink");
        }

        if (document.getElementById('report-type').value == "custom") {
          $("#inputTerm").hide();
          $("#inputDaily").hide();
          $("#inputCustom").show();
          $("#inputPromo").hide();
          $("#inputMonthly").hide();
          $("#inputMonthly2").hide();
          $("#facultyButtonDaily").removeClass("inactiveLink");
          $("#othersButtonDaily").removeClass("inactiveLink");
         
        }

      }

    </script>

    <script type="text/javascript">
      $(function() {

        $('div.segmented-control a').on('click', function() {

          $('div.segmented-control a').each(function(i, e) {
            $(e).removeClass('active');
          });

          $(this).addClass('active');
          $(this).find('input').prop('checked', true);
          return false;

        });

      });

    </script>

    <script>
      $(function() {

        $('div.segmented-email a').on('click', function() {

          $('div.segmented-email a').each(function(i, e) {
            $(e).removeClass('active');
          });

          $(this).addClass('active');
          $(this).find('input').prop('checked', true);
          return false;

        });
      });

    </script>

    <script>
      $(document).ready(function() {

        $("#collegepicker").change(function() {

          var college = $("#collegepicker :selected").val();

          if (college == 'CCS') {
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
          if (college == 'COS') {
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
          if (college == 'COL') {
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
          if (college == 'CLA') {
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
          if (college == 'GCOE') {
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
          if (college == 'SOE') {
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
          if (college == 'BAGCED') {
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
          if (college == 'RVRCOB') {
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
          if (college == 'All Colleges') {
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

      $(document).ready(function() {
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

      $(document).ready(function() {
        $('#inputName').click(function() {
          var name = $("#name");
          var idnumber = $("#idnumber");
          name.removeAttr("readonly");
          idnumber.val("");
          //idnumber.removeAttr("required");
          //name.prop("required", "true");
          idnumber.prop("readonly", "true");

        });

        $('#inputID').click(function() {
          var name = $("#name");
          var idnumber = $("#idnumber");
          name.prop("readonly", "true");
          //idnumber.prop("required", "true");
          // name.removeAttr("required");
          idnumber.removeAttr("readonly");
          name.val("");

        });

      });

      $(document).ready(function() {
        $('#searchByName').click(function() {
          var name = $("#search-name");
          var fname = $("#search-fname");
          var idnumber = $("#search-idnumber");
          name.removeAttr("readonly");
          fname.removeAttr("readonly");
          idnumber.val("");
          idnumber.prop("readonly", "true");
           $('#search-id-list').hide();
        });

        $('#searchByID').click(function() {
          var name = $("#search-name");
          var fname = $("#search-fname");
          var idnumber = $("#search-idnumber");
          name.prop("readonly", "true");
          fname.prop("readonly", "true");
          idnumber.removeAttr("readonly");
          name.val("");
          fname.val("");
          $('#search-name-list').hide();
        });

      });

    </script>

    <!--EMAIL MODAL-->
    <script>
      $(document).ready(function() {

        $("#college-email").change(function() {

          var college = $("#college-email :selected").val();

          if (college == 'CCS') {
            $("#CCS-email").show();
            $("#COS-email").hide();
            $("#COL-email").hide();
            $("#CLA-email").hide();
            $("#GCOE-email").hide();
            $("#SOE-email").hide();
            $("#BAGCED-email").hide();
            $("#RVRCOB-email").hide();
            $("#All-email").hide();
          }
          if (college == 'COS') {
            $("#CCS-email").hide();
            $("#COS-email").show();
            $("#COL-email").hide();
            $("#CLA-email").hide();
            $("#GCOE-email").hide();
            $("#SOE-email").hide();
            $("#BAGCED-email").hide();
            $("#RVRCOB-email").hide();
            $("#All-email").hide();
          }
          if (college == 'COL') {
            $("#CCS-email").hide();
            $("#COS-email").hide();
            $("#COL-email").show();
            $("#CLA-email").hide();
            $("#GCOE-email").hide();
            $("#SOE-email").hide();
            $("#BAGCED-email").hide();
            $("#RVRCOB-email").hide();
            $("#All-email").hide();
          }
          if (college == 'CLA') {
            $("#CCS-email").hide();
            $("#COS-email").hide();
            $("#COL-email").hide();
            $("#CLA-email").show();
            $("#GCOE-email").hide();
            $("#SOE-email").hide();
            $("#BAGCED-email").hide();
            $("#RVRCOB-email").hide();
            $("#All-email").hide();
          }
          if (college == 'GCOE') {
            $("#CCS-email").hide();
            $("#COS-email").hide();
            $("#COL-email").hide();
            $("#CLA-email").hide();
            $("#GCOE-email").show();
            $("#SOE-email").hide();
            $("#BAGCED-email").hide();
            $("#RVRCOB-email").hide();
            $("#All-email").hide();
          }
          if (college == 'SOE') {
            $("#CCS-email").hide();
            $("#COS-email").hide();
            $("#COL-email").hide();
            $("#CLA-email").hide();
            $("#GCOE-email").hide();
            $("#SOE-email").show();
            $("#BAGCED-email").hide();
            $("#RVRCOB-email").hide();
            $("#All-email").hide();
          }
          if (college == 'BAGCED') {
            $("#CCS-email").hide();
            $("#COS-email").hide();
            $("#COL-email").hide();
            $("#CLA-email").hide();
            $("#GCOE-email").hide();
            $("#SOE-email").hide();
            $("#BAGCED-email").show();
            $("#RVRCOB-email").hide();
            $("#All-email").hide();
          }
          if (college == 'RVRCOB') {
            $("#CCS-email").hide();
            $("#COS-email").hide();
            $("#COL-email").hide();
            $("#CLA-email").hide();
            $("#GCOE-email").hide();
            $("#SOE-email").hide();
            $("#BAGCED-email").hide();
            $("#RVRCOB-email").show();
            $("#All-email").hide();
          }
          if (college == 'All Colleges') {
            $("#CCS-email").hide();
            $("#COS-email").hide();
            $("#COL-email").hide();
            $("#CLA-email").hide();
            $("#GCOE-email").hide();
            $("#SOE-email").hide();
            $("#BAGCED-email").hide();
            $("#RVRCOB-email").hide();
            $("#All-email").show();
          }
        });

      });

      $(document).ready(function() {
        $("#facultyEmail").click(function() {
          $("#inputFacultyEmail").show();
          $("#input-selected").show();
          $("#allFaculty").show();
          $("#selectedFaculty").show();
          $("#inputOthersEmail").hide();
        });
        $("#othersEmail").click(function() {
          $("#inputOthersEmail").show();
          $("#All-email").show();

          $("#input-selected").hide();
          $("#allFaculty").hide();
          $("#selectedFaculty").hide();
          $("#inputFacultyEmail").hide();

          $("#CCS-email").hide();
          $("#COS-email").hide();
          $("#COL-email").hide();
          $("#CLA-email").hide();
          $("#GCOE-email").hide();
          $("#SOE-email").hide();
          $("#BAGCED-email").hide();
          $("#RVRCOB-email").hide();

        });
      });

      $(document).ready(function() {
        $('#allFaculty').click(function() {
          var input = $("#input-selected");
          input.prop("readonly", "true");

        });

        $('#specificFaculty').click(function() {

          var input = $("#input-selected");
          input.removeAttr("readonly");
          input.val("");
        });
      });

    </script>

    <script type="text/javascript">
      $("[rel='tooltip']").tooltip();
      $('.thumbnail').hover(
        function() {
          $(this).find('.caption').slideDown(500); //.fadeIn(250)
        },
        function() {
          $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
      );

    </script>

    <script>
      $(document).ready(function() {
        $('input[type="radio"]').click(function() {
          if ($(this).attr('id') == 'selectedFaculty') {
            $('#to').show();
          } else {
            $('#to').hide();
          }
        });
      });

    </script>

    <!-- SELECT PICKER -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('.selectpicker').selectpicker({
          style: 'btn-default',
          size: false
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

          <ul class="nav navbar-nav" style="padding:7px;">

            <li>

              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ayModal" id="dashay-button"><b><?=$AY ?> Term <?=$Term?><b></button>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.html"><b>Log Out</b></a></li>
          </ul>

        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>


    <!-- Current AY Modal -->
    <div class="modal fade" id="ayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="addaymodal-container" id="searchrecords-container">
          <fieldset>

            <div class="col-xs-12">
              <label class="control-label col-xs-5" style="text-align:left;">Current Academic Year: </label>
              <div class="col-xs-4">
                <input type="text" class="form-control" style="width:213px;" placeholder="<?=$AY ?>"readonly/>
              </div>
            </div>
            <br>
            <div class="col-xs-12">
              <label class="col-xs-5" style="text-align:left;">Current Term: </label>
              <div class="col-xs-4">
                <input type="text" class="form-control" style="width:113px;" placeholder="<?=$Term?>" readonly/>
               </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="text-center">
              <a data-toggle="modal" data-dismiss="modal" href="#newTermmodal" id="adday">Term finished? Click to add a new one!</a>
            </div>
            <br>
            <div class="text-center">
              
                  <button class="cancel btn btn-danger col-xs-offset-4 col-xs-4" data-dismiss="modal" style="" type="button"><i class="glyphicon glyphicon-remove"></i> CLOSE</button>

            </div>

          </fieldset>
        </div>
      </div>
    </div>
    

    <!--Add Term Modal -->
        
    <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="newTermmodal" role="dialog" style="display: none;" tabindex="-1">
      <div class="modal-dialog">
        <div class="addaymodal-container" id="searchrecords-container">
          <form action="add-term.php" method="POST" class="form form-horizontal">
            <fieldset>
              <legend style="margin-bottom:-10px;"></legend>
              <h3><legend class="text-center"><b>ADD NEXT TERM</b></legend></h3>

                     <div class="form-group">
                          <label class="col-xs-4 control-label" for="term1">
                          <?php
                          if($Term  ==3){
                            $startY = substr($AY, 4, 5);
                            $endY = substr($AY, 10, 13);
                            (int) $startY+=1;
                            (int) $endY+=1;
                            echo "A.Y. ".$startY."-".$endY." Term 1";
                          }else{

                            echo $AY." Term ".($Term + 1);
                          }
                          ?>
                          </label>
                        <div class="col-xs-8">
                            <div id="reportrange2" class="pull-right">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                        <span></span> <b class="caret" style = "float:right;margin-top:5px;"></b>
                      <input type="hidden" class="form-control" id="dates" name="dates" />
                      <input type="hidden" name="academic_year" value="<?php echo $AY; ?>">
                      <input type="hidden" name="academic_year_id" value="<?php echo $AYid; ?>">
                      <input type="hidden" name="termNo" value="<?php echo $Term; ?>" /> 
                    </div>
                           
                    </div>
                     </div>
                <br>
                <div class="text-center">
                <button class="submit btn btn-success col-xs-3" style="margin-left:85px; margin-right:35px;" type="submit"><i class="glyphicon glyphicon-plus"></i> ADD TERM</button> <button class="cancel btn btn-danger col-xs-3" data-toggle = "modal" data-dismiss="modal" type="button" data-target = "#ayModal"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>        

    <!--After Navbar -->    
    <div class="container">
      <br><br>
      <div class="im-centered">
        <div class="row text-center">
          <h3><b>Faculty Attendance Monitoring System<b></h3>
        </div><br><br>

        <div class="row">

          <div class="col-sm-2"></div>

          <a href="#" class="" data-toggle="modal" data-target="#searchrecords-modal">
            <div class="col-sm-4">
              <div class="thumbnail">
                <div class="caption">
                  <h4 class="options-heading">Records</h4>
                </div>
                <img src="../img/searchRecord1.png" alt="..." class="">
              </div>
            </div>
          </a>

          <a href="#" class="" data-toggle="modal" data-target="#daily-modal">
            <div class="col-sm-4">
              <div class="thumbnail">
                <div class="caption">
                  <h4 class="options-heading">Reports</h4>
                </div>
                <img src="../img/Daily.png" alt="..." class="">

              </div>
            </div>
          </a>
          <div class="col-sm-2"></div>
        </div>
        <!--row -->
      </div>
      <!--im-centered-->
    </div>
    <!--container-->

    <!-- SEARCH ATTENDANCE RECORDS MODAL -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="searchrecords-modal" role="dialog" style="display: none;" tabindex="-1">
      <div class="modal-dialog">
        <div class="addaymodal-container" id="searchrecords-container">
          <form action="search-faculty.php" method="POST" class="form form-horizontal">
            <fieldset>
              <legend style="margin-bottom:-10px;"></legend>
              <h3><legend class="text-center"><b>SEARCH ATTENDANCE RECORDS</b></legend></h3>
              <div class="form-group">
                <label class="control-label col-xs-5" style="text-align:left;"><input checked id="searchByID" name="option" type="radio" value="idNumber">&nbsp;&nbsp;by ID Number:</label>
                <div class="col-xs-4">
                  <input class="form-control" id="search-idnumber" name="idNumber" type="text" maxlength="8" style="width:80px;" onkeyup = "autocompletId()" autocomplete = "off">
                  <ul id = "search-id-list"></ul>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-5" style="text-align:left;"><input id="searchByName" name="option" type="radio" value="name">&nbsp;&nbsp;by Name:</label>
                <div class="col-xs-7">
                  <input class="form-control" id="search-name" name="fullName" style="float: left; margin-right:5px;" type="text" placeholder="Last Name, First Name" onkeyup = "autocompletName()" autocomplete = "off" readonly>
                    <ul id = "search-name-list"></ul>
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
    <!-- GENERATE REPORTS MODAL -->
    <div class="modal fade" id="daily-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="addaymodal-container" id="daily-container">
          <form class="form form-horizontal" action="reports.php" method="POST">
            <fieldset>
              <legend style="margin-bottom:-10px;"></legend>
              <h3><legend class="text-center"><b>GENERATE REPORTS</b></legend></h3>

              <div class="form-group">
                <label class="control-label col-xs-4" style="text-align:left;">Type:</label>
                <div class="col-xs-5">
                  <select id="report-type" class="selectpicker show-tick" data-width="155px" name="buttons" onchange="change()">
                        <option id ="dailyButton" value = "daily"> Daily </option>
                        <option value = "monthly"> Monthly </option>
                        <option value = "term"> Term-End </option>
                        <option value = "custom"> Custom </option>
                      </select>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-xs-4" style="text-align:left;">Date:</label>

                <div id="inputDaily" class="col-xs-8">
                  <input style="width:100px;" type="text" class="form-control" id="dailydate" name="dailydate" />
                </div>

                <div id="inputMonthly" class="col-xs-4" name="monthly" style="display:none;">

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

                <div id="inputMonthly2" style="display:none;">
                          <select id="try" class="selectpicker show-tick" style="text-align:left;" name="years" data-width="100px">
                                <option selected>2016</option>
                                <option>2015</option>

                          </select>
                </div>

                <div id="inputTerm" class="col-xs-4" name="terms" style="display:none;">

                  <select class="selectpicker show-tick" style="text-align:left;" data-width="155px" name="academicyears">
                        <?php
                      while($rows = $stmt->fetch(PDO::FETCH_ASSOC))
                      {
                        echo "<option>".$rows['name']."</option>";
                      }
                      ?>

                      </select>

                      </select>
                  <br><br>
                  <select class="selectpicker show-tick" style="text-align:left;" data-width="155px" name="terms">
                        <option value = "1" selected>Term 1</option>
                        <option value = "2">Term 2</option>
                        <option value = "3">Term 3</option>

                      </select>

                </div>


                <div id="inputCustom" class="col-xs-8" style="display:none;margin-left:-20px;">
                  <div id="reportrange" class="pull-right" style="width:230px;">
                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                    <span></span> <b class="caret" style="float:right;margin-top:5px;"></b>
                    <input type="hidden" class="form-control" id="dates" name="dates" />
                  </div>
                </div>

                <div id="inputPromo" class="col-xs-8" style="display:none;margin-top:5px;">
                  <span><i>start up to present</i></span>
                </div>

              </div>

              <div class="form-group">
                <label for="inputPassword" class="control-label col-xs-4" style="text-align:left;">Report for:</label>
                <div class="col-xs-5">
                  <div class=" segmented-control" style="width:150px;margin-left:5px;">
                    <a id="facultyButtonDaily" href="#" class="list-group-item active">
                        Faculty
                        <input type="radio" name ="options" value ="faculty" checked/>
                      </a>
                    <a id="othersButtonDaily" href="#" class="list-group-item">
                        Others
                          <input type="radio" id="otherRadio" name ="options" value = "others"/ disabled>
                      </a>

                  </div>
                </div>
              </div>
              <hr class="style2 col-xs-offset-1 col-xs-9"><br>

              <div id="inputIDNumDaily">
                <div class="form-group">
                  <div class="form-group">
                    <label class="control-label col-xs-4" style="text-align:left; margin-left:15px;">
                            <input type="radio" name="inputs" id="inputID" value="idnumber" checked>&nbsp;&nbsp;by ID Number: </label>
                    <div class="col-xs-3">
                      <input style="width:80px" type="text" class="form-control" id="idnumber" name="idnumber" maxlength="8" onkeyup = "autocompletIdg()" autocomplete = "off"/>
                      <ul id = "id-list"></ul>
                    </div>
                  </div>
                </div>

                  <div class="form-group">
                    <label class="control-label col-xs-4" style="text-align:left; margin-left:15px;">
                            <input type="radio" name="inputs" id="inputName" value="name" >&nbsp;&nbsp;by Name: </label>
                    <div class="col-xs-3">
                      <input style="width:214px" type="text" class="form-control" id="name" name="name" placeholder="Last Name, FirstName" onkeyup = "autocompletNameg()" autocomplete = "off" readonly/>
                      <div id = "name-list"></ul>
                    </div>
                  </div>
                </div>

              </div>

              <div id="inputOthersDaily" style="display:none;">

                <div class="form-group">
                  <input type="hidden" id="department" name="department" value="All Departments" />
                  <label class="control-label col-xs-4" style="text-align:left;">Report filter:</label>
                  <div class="col-xs-5" style="width:250px">
                    <select id="collegepicker" class="selectpicker show-tick" style="text-align:left;" name="college">
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

                <div class="form-group">
                  <label class="control-label col-xs-4" style="text-align:left;"></label>
                  <div id="CCS" class="col-xs-5">
                    <select id="departmentpicker" class="selectpicker show-tick" name="ccs">
                        <option selected> All Departments</option>
                        <option> Computer Technology</option>
                        <option> Software Technology</option>
                        <option> Information Technology</option>

                      </select>
                  </div>
                  <div id="BAGCED" class="col-xs-5">
                    <select id="departmentpicker" class="selectpicker show-tick" name="bagced">
                        <option selected> All Departments</option>
                        <option> English and Applied Linguistics</option>
                        <option> Science Education</option>
                        <option> Physical Education</option>

                      </select>
                  </div>
                  <div id="COL" class="col-xs-5">
                    <select id="departmentpicker" class="selectpicker show-tick" name="col">
                        <option> Law</option>


                      </select>
                  </div>
                  <div id="CLA" class="col-xs-5">
                    <select id="departmentpicker" class="selectpicker show-tick" name="cla">
                        <option selected> All Departments</option>
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
                  <div id="COS" class="col-xs-5">
                    <select id="departmentpicker" class="selectpicker show-tick" name="cos">
                        <option selected> All Departments</option>
                        <option> Biology </option>
                        <option> Chemistry </option>
                        <option> Physics </option>
                        <option> Mathematics</option>

                      </select>
                  </div>
                  <div id="GCOE" class="col-xs-5">
                    <select id="departmentpicker" class="selectpicker show-tick" name="gcoe">
                      <option selected> All Departments</option>
                        <option> Chemical Engineering </option>
                        <option> Civil Engineering </option>
                        <option> Electronics and Communications Engineering </option>
                        <option> Industrial Engineering </option>
                        <option> Mechanical Engineering </option>
                        <option> Manufacturing Engineering and Management </option>

                      </select>
                  </div>
                  <div id="RVRCOB" class="col-xs-5">
                    <select id="departmentpicker" class="selectpicker show-tick" name="rvrcob">
                        <option selected> All Departments</option>
                        <option> Accountancy </option>
                        <option> Marketing Management </option>
                        <option> Management and Organization </option>
                        <option> Financial Management </option>
                        <option> Commercial Law </option>

                      </select>
                  </div>
                  <div id="SOE" class="col-xs-5">
                    <select id="departmentpicker" class="selectpicker show-tick" name="soe">
                        <option selected> All Departments</option>
                        <option> Economics</option>

                      </select>
                  </div>
                  <div id="All" class="col-xs-5">
                    <select id="departmentpicker" class="selectpicker show-tick" name="all">
                        <option> All Departments</option>
                      </select>
                  </div>
                </div>
              </div>
              <br>

              <div class="text-center">
                <button id="btnViewReportDaily" type="submit" class="btn btn-success col-xs-4 submit" style="margin-left:40px; margin-right:30px;font-size:14px;"> <i class="glyphicon glyphicon-th-list"></i> GENERATE </button>

                <button type="button" class="btn btn-danger col-xs-4 cancel" data-dismiss="modal" style="
                  margin-left: 20px;font-size:14px;"> <i class="glyphicon glyphicon-remove"></i> CANCEL </button>
              </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>

    <!-- EMAIL MODAL -->
    <!--<div class="modal fade" id="email-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="addaymodal-container" id="searchrecords-container">
          <form action="generatereports.php" class="form form-horizontal" method="post">
            <fieldset>
              <legend style="margin-bottom:-10px;"></legend>
              <h3><legend class="text-center"><b>EMAIL DAILY REPORTS</b></legend></h3>

              <div class="form-group">
                <label class="control-label col-xs-4" style="text-align:left;">Type:</label>
                <div class="col-xs-5">
                  <select id="email-type" class="selectpicker show-tick" data-width="155px" onchange="email()">
                        <option value ="daily-email"> Daily </option>
                        <option value = "monthly-email"> Monthly </option>
                        <option value = "term-email"> Term-End </option>
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

              </div>

              <div class="form-group">
                <label for="inputPassword" class="control-label col-xs-4" style="text-align:left;">Report for:</label>
                <div class="col-xs-5">
                  <div class="segmented-email" style="width:150px;margin-left:5px;">
                    <a id="facultyEmail" href="#" class="list-group-item active">
                        Faculty
                        <input type="radio" name ="options" value ="faculty" checked/>
                      </a>
                    <a id="othersEmail" href="#" class="list-group-item">
                        Others
                          <input type="radio" name ="options" value = "others"/>
                      </a>

                  </div>
                </div>
              </div>
              <hr class="style2 col-xs-offset-1 col-xs-9"><br>
              <div id="inputFacultyEmail">

                <div class="form-group">
                  <div class="form-group">
                    <label class="control-label col-xs-7" style="text-align:left; margin-left:15px;"><input id="allFaculty" name = "emailFacultyOption" type="radio" value="idnumber" checked>&nbsp;&nbsp;ALL FACULTY
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-group">
                    <label class="control-label col-xs-7" style="text-align:left; margin-left:15px;"><input id="selectedFaculty"name = "emailFacultyOption"  type="radio" value="idnumber">&nbsp;&nbsp;SELECTED FACULTY
                    </label>

                  </div>
                </div>

                <div class="form-group" id="to" style="display:none">
                  <label class="control-label col-xs-4" style="text-align:left;">To:</label>
                  <div class="col-xs-7">
                    <input id="input-selected" name="input-selected" class="form-control" type="text" style="width:100%;">
                  </div>
                </div>

              </div>


              <div id="inputOthersEmail" style="display:none;">

                <div class="form-group">
                  <label class="control-label col-xs-4" style="text-align:left;">Report filter:</label>
                  <div class="col-xs-5" style="width:250px">
                    <select id="college-email" class="selectpicker show-tick" style="text-align:left;" name="college">
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

                <div class="form-group">
                  <label class="control-label col-xs-4" style="text-align:left;"></label>
                  <div id="CCS-email" class="col-xs-5">
                    <select id="department-email" class="selectpicker show-tick" name="department">
                        <option selected> Computer Technology</option>
                        <option> Software Technology</option>
                        <option> Information Technology</option>

                      </select>
                  </div>
                  <div id="BAGCED-email" class="col-xs-5">
                    <select id="department-email" class="selectpicker show-tick" name="department">
                        <option selected> English and Applied Linguistics</option>
                        <option> Science Education</option>
                        <option> Physical Education</option>

                      </select>
                  </div>
                  <div id="COL-email" class="col-xs-5">
                    <select id="department-email" class="selectpicker show-tick" name="department">
                        <option selected> Law</option>


                      </select>
                  </div>
                  <div id="CLA-email" class="col-xs-5">
                    <select id="department-email" class="selectpicker show-tick" name="department">
                        <option selected> Theology and Religious Studies</option>
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
                  <div id="COS-email" class="col-xs-5">
                    <select id="department-email" class="selectpicker show-tick" name="department">
                        <option selected> Biology </option>
                        <option> Chemistry </option>
                        <option> Physics </option>
                        <option> Mathematics</option>

                      </select>
                  </div>
                  <div id="GCOE-email" class="col-xs-5">
                    <select id="department-email" class="selectpicker show-tick" name="department">
                        <option selected> Chemical Engineering </option>
                        <option> Civil Engineering </option>
                        <option> Electronics and Communications Engineering </option>
                        <option> Industrial Engineering </option>
                        <option> Mechanical Engineering </option>
                        <option> Manufacturing Engineering and Management </option>

                      </select>
                  </div>
                  <div id="RVRCOB-email" class="col-xs-5">
                    <select id="department-email" class="selectpicker show-tick" name="department">
                        <option selected> Accountancy </option>
                        <option> Marketing Management </option>
                        <option> Management and Organization </option>
                        <option> Financial Management </option>
                        <option> Commercial Law </option>

                      </select>
                  </div>
                  <div id="SOE-email" class="col-xs-5">
                    <select id="department-email" class="selectpicker show-tick" name="department">
                        <option selected> Economics</option>

                      </select>
                  </div>
                  <div id="All-email" class="col-xs-5">
                    <select id="department-email" class="selectpicker show-tick" name="department">
                        <option selected> All Departments</option>
                      </select>
                  </div>
                </div>
              </div>
              <br>


              <div class="text-center">
                <button class="submit btn btn-success col-xs-3" style="margin-left:85px; margin-right:30px;" type="submit"><i class="glyphicon glyphicon-envelope"></i> EMAIL</button> <button class="cancel btn btn-danger col-xs-3" data-dismiss="modal"
                    type="button"><i class="glyphicon glyphicon-remove"></i> CANCEL</button>
              </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>-->


  </body>


</html>
