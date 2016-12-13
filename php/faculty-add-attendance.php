<?php
  require "connector.php";

  $stmt = $conn->prepare("SELECT id
    FROM CourseOffering
    WHERE faculty_id = :idNumber
      AND section = :section");
  $stmt->execute(["idNumber" => $_POST["idNumber"], "section" => $_POST["section"]]);
  $courseoffering_id = $stmt->fetch(PDO::FETCH_ASSOC)["id"];

  $stmt = $conn->prepare("SELECT id
    FROM AttendanceStatus
    WHERE code = :code");
  $stmt->execute(["code" => $_POST["code"]]);
  $status_id = $stmt->fetch(PDO::FETCH_ASSOC)["id"];

  $stmt = $conn->prepare("INSERT INTO Attendance (courseoffering_id, status_id, remarks, date, time_set)
    VALUES (:courseoffering_id, :status_id, :remarks, :date, :time_set)");
  $stmt->execute(["courseoffering_id" => $courseoffering_id, "status_id" => $status_id, "remarks" -> $_POST["remarks"], "date" => $_POST["date"], "time_set" =>date("Y-m-d")]);
?>
