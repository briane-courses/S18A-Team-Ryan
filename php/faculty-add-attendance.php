<?php
  require "connector.php";

  $stmt = $conn->prepare("SELECT id
    FROM CourseOffering
    WHERE faculty_id = :idNumber
      AND section = :section");
  $stmt->execute(["idNumber" => $_POST["idNumber"], "section" => $_POST["section"]]);
  $courseoffering_id = $stmt->fetch(PDO::FETCH_ASSOC)["id"];

  $stmt = $conn->prepare("INSERT INTO Attendance (courseoffering_id, status_id, remarks, date, time_set)
    VALUES (:courseoffering_id)");
  $stmt->execute(["courseoffering_id" => $courseoffering_id]);
?>
