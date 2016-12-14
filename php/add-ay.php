<?php
    include "connector.php";

    
    // Check if academic year exists.
    $stmt = $conn->prepare(
        "SELECT 1
        FROM AcademicYear
        WHERE name = :academic_year");
    $stmt->execute(["academic_year" => $_POST["academic_year"]]);
    $isExistingYear = $stmt->rowCount() > 0;

    // TODO: Check if terms to be added overlap.

    if (!$isExistingYear) {
   

            
                try {
                    $stmt = $conn->prepare(
                        "INSERT INTO AcademicYear(name)
                        VALUES (:academic_year)");
                    $stmt->execute(["academic_year" => $_POST["academic_year"]]);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                // Get the id of newly added academic year.
                try {   
                    $stmt = $conn->prepare(
                        "SELECT id
                        FROM AcademicYear
                        WHERE name = :academic_year");
                    $stmt->execute(["academic_year" => $_POST["academic_year"]]);
                    $row = $stmt->fetch(PDO::FETCH_NUM);
                    $yearId = $row[0];
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
              

    } else {
        // If academic year already exists:
        echo "<script>
            window.alert('Academic year exists.');
        </script>";
    }
     echo "<script>
            window.location.replace('../dashboard.html');
        </script>";
?>