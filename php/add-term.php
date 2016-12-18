<?php
	
    include "connector.php";

    $termNum = str_replace("Term", "", $_POST["termNo"]);
   
    $startY = substr($_POST["academic_year"], 4, 5);
    $endY = substr($_POST["academic_year"], 10, 13);
    if($termNum == 3){
    	(int) $startY+=1;
    	(int) $endY+=1;
		$_POST["termNo"] =0;
		try {
			$sql = "INSERT INTO AcademicYear(name) VALUES ('A.Y. ".$startY."-".$endY."')";
        	        	echo $sql;

        	$stmt = $conn->prepare($sql);
        	$stmt->execute();
        } catch (PDOException $e) {
        	echo $e->getMessage();
        }
	}
	$dates = isset($_POST["dates"]) ? $_POST["dates"] : false;
    $dates = explode(".", $dates);
   	$sql = "SELECT * FROM facultyattendancetracker.term	WHERE '".$dates[0]."' < end;";
	$stmt = $conn->prepare($sql);
	$stmt->execute(); 
	$result = $stmt->execute();
	
	$_POST["termNo"] +=1;

	$isConflictingTerm = $stmt->rowCount() > 0;
	if(!$isConflictingTerm)
	{
		$sql = "INSERT INTO Term(start, end, term_no, year_id)
                VALUES ('".$dates[0]."', '".$dates[1]."', ".$_POST["termNo"].", ".$_POST["academic_year_id"].")";
					
		try {
			$stmt = $conn->prepare($sql);
			$stmt->execute();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		echo "<script>
            window.alert('Successfully added a term!');
            window.location.replace('dashboard.php');

        </script>";
	}else if($isConflictingTerm){
		echo "<script>
            window.alert('Change the date! It has a conflict with a previous term');
            window.location.replace('dashboard.php');

        </script>";
	}
?>