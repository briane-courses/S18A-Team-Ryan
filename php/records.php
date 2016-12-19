<?php
	include "connector.php";
	$option = isset($_POST["option"]) ? $_POST["option"] : false;
	if($option =="ADD")
	{
		$id = isset($_POST["faculty_id"]) ? $_POST["faculty_id"] : false;
		$date = isset($_POST["dailydate"]) ? $_POST["dailydate"] : false;
		$checker = isset($_POST["checker"]) ? $_POST["checker"] : false;
		$class = isset($_POST["class"]) ? $_POST["class"] : false;
		$remarks = isset($_POST["remarks"]) ? $_POST["remarks"] : false;
		$time = isset($_POST["time"]) ? $_POST["time"] : false;


		if($remarks == 'LA')
			$codes = 1;
		else if($remarks == 'ED')
			$codes = 4;
		else if($remarks == 'CF' || $remarks == 'PM' || $remarks == 'SI' || $remarks == 'XX')
			$codes = 2;
		else
			$codes = 3;
		$sql= "ALTER TABLE ATTENDANCE AUTO_INCREMENT=1;";
		echo $sql;
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
		$sql= "INSERT INTO `attendance`
				(
				`courseoffering_id`,
				`status_id`,
				`remarks`,
				`date`,
				`time_set`)
				VALUES
				(
				".$class.",
				".$codes.",
				'".$remarks."',
				'".$date."',
				".$time.");";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		echo "<script> alert('Record has been added.') </script>;";

		header("Location: faculty.php?id=".$id
		."&date=".$date);
		exit;
	}
	else if($option =="EDIT")
	{
		$id = isset($_POST["faculty_id"]) ? $_POST["faculty_id"] : false;
		$date = isset($_POST["dailydate"]) ? $_POST["dailydate"] : false;
		$checker = isset($_POST["checker"]) ? $_POST["checker"] : false;
		$class = isset($_POST["class"]) ? $_POST["class"] : false;
		$remarks = isset($_POST["remarks"]) ? $_POST["remarks"] : false;
		$time = isset($_POST["time"]) ? $_POST["time"] : false;


		if($remarks == 'LA')
			$codes = 1;
		else if($remarks == 'ED')
			$codes = 4;
		else if($remarks == 'CF' || $remarks == 'PM' || $remarks == 'SI' || $remarks == 'XX')
			$codes = 2;
		else
			$codes = 3;
		
		$sql= "UPDATE `attendance`
				SET
				`id` = ".$id.",
				`courseoffering_id` = ".$class.",
				`status_id` = ".$codes.",
				`remarks` = '".$remarks."',
				`date` = ".$date.",
				`time_set` = ".$time."
				WHERE `id` = ".$id.";";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		echo "<script> alert('Record has been added.') </script>;";

		header("Location: faculty.php?id=".$id
		."&date=".$date);
		exit;
	}
	else if($option == "DELETE")
	{
		$sql= "DELETE FROM `facultyattendancetracker`.`attendance`
WHERE <{where_expression}>;";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		echo "<script> alert('Record has been added.') </script>;";

		header("Location: faculty.php?id=".$id
		."&date=".$date);
		exit;
	}
	



?>


