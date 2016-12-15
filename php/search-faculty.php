<?php
    require "connector.php";

    $facultyExists = false;

    if($_GET["id"] == null) {
      if($_POST["idNumber"] != null) {
          $stmt = $conn->prepare("SELECT * FROM Faculty WHERE id = :idNumber");
          $stmt->execute(["idNumber" => $_POST["idNumber"]]);
          $facultyExists = true;
      } elseif($_POST["option"] = "name") {
          $lastName = strtok($_POST["fullName"], ", ");
          $firstName = strtok(", ");
          $stmt = $conn->prepare(
              "SELECT *
              FROM Faculty
              WHERE first_name = :firstName
                  AND last_name = :lastName;");
          $stmt->execute(["firstName" => $firstName, "lastName" => $lastName]);
          $facultyExists = true;
      } else {
          echo "<script>
              alert('Missing search details.');
              window.location.replace('../dashboard.php');
          </script>";
      }

      if($facultyExists && $stmt->rowCount() == 1) {
        if($_POST["date"] == null) {
          header("Location: faculty.php?id=".$stmt->fetch(PDO::FETCH_ASSOC)["id"]."&date=".date("Y-m-d"));
          exit;
        } else {
          header("Location: faculty.php?id=".$stmt->fetch(PDO::FETCH_ASSOC)["id"]."&date=".str_replace("/", "-", $_POST["date"]));
          exit;
        }
      } else {
          echo "<script>
                  alert('Faculty member not found.');
                  window.location.replace('../dashboard.php');
              </script>";
      }
    } else {
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
              AND Rotation.id = CheckerAccount.rotation_id
              AND date = cast(:date as date);");
      $stmt->execute(["idNumber" => $_GET["id"], "date" => $_GET["date"]]);

      $classes = getClasses($_GET["id"], date("Y-m-d"));
    }

    function getClasses($idNumber, $date) {
      require "connector.php";
      $stmt = $conn->prepare("SELECT Code, Section
                              FROM Course, CourseOffering, Term
                              WHERE faculty_id = :idNumber
                                AND course_id = course.id
                                AND Term.id = CourseOffering.term_id
                                AND :date BETWEEN Term.start AND Term.end");
      $stmt->execute(["idNumber" => $idNumber, "date" => $date]);
      $options = "";
      foreach ($stmt as $row) {
        $options = $options."<option>".$row["Code"]." - ".$row["Section"]."</option>\n";
      }

      return $options;
    }
?>
