<?php
  require "connector.php";

  $stmt = $conn->prepare("INSERT INTO Attendance ()");
  $stmt->execute(["idNumber" => $_POST["idNumber"]]);
?>
