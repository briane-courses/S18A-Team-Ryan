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
        $term1 = array("start" => $_POST["term1Start"], "end" => $_POST["term1End"], "term_no" => 1);
        $term2 = array("start" => $_POST["term2Start"], "end" => $_POST["term2End"], "term_no" => 2);
        $term3 = array("start" => $_POST["term3Start"], "end" => $_POST["term3End"], "term_no" => 3);
        $terms = array($term1, $term2, $term3);

        $isOverlapSelf = false;
        if (strcmp($_POST["term1Start"],  $_POST["term1End"]) >= 0) {
            $isOverlapSelf = true;
        } else if (strcmp($_POST["term2Start"],  $_POST["term2End"]) >= 0) {
            $isOverlapSelf = true;
        } else if (strcmp($_POST["term3Start"],  $_POST["term3End"]) >= 0) {
            $isOverlapSelf = true;
        } else if (strcmp($_POST["term1Start"],  $_POST["term2Start"]) >= 0 || strcmp($_POST["term1End"],  $_POST["term2Start"]) >= 0) {
            $isOverlapSelf = true;
        } else if (strcmp($_POST["term2Start"],  $_POST["term3Start"]) >= 0 || strcmp($_POST["term2End"],  $_POST["term3Start"]) >= 0) {
            $isOverlapSelf = true;
        }
        echo "isOverlapSelf: ".$isOverlapSelf;
        if (!$isOverlapSelf) {
            // Check if term dates overlap with existing terms.
            // TODO: Use term objects instead of date list.
            $termDates = array($_POST["term1Start"], $_POST["term1End"], $_POST["term2Start"], $_POST["term2End"], $_POST["term3Start"], $_POST["term3End"]);

            $stmt = $conn->prepare(
                "SELECT 1 
                FROM Term 
                WHERE :term BETWEEN start AND end");

            $i = 0;
            $isOverlapDb = false;
            while ($i < sizeof($termDates) && !$isOverlapDb) {
                $stmt->execute(["term" => $termDates[$i]]);
                if ($stmt->rowCount() > 0) {
                    $isOverlapDb = true;
                }
                $i++;
            }

            if (!$isOverlapDb) {
                // Insert academic year and terms.
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
                try {
                    $stmt = $conn->prepare(
                        "INSERT INTO Term (start, end, term_no, year_id)
                        VALUES (:start, :end, 1, :year_id)");
                    $stmt->execute(["start" => $_POST["term1Start"], "end" => $_POST["term1End"], "year_id" => $yearId]);
                } catch (PDOException $e) {
                    echo $e->getMessage()."</br>";
                }
                try {
                    $stmt = $conn->prepare(
                        "INSERT INTO Term (start, end, term_no, year_id)
                        VALUES (:start, :end, 2, :year_id)");
                    $stmt->execute(["start" => $_POST["term2Start"], "end" => $_POST["term2End"], "year_id" => $yearId]);
                } catch (PDOException $e) {
                    echo $e->getMessage()."</br>";
                }
                try {
                    $stmt = $conn->prepare(
                        "INSERT INTO Term (start, end, term_no, year_id)
                        VALUES (:start, :end, 3, :year_id)");
                    $stmt->execute(["start" => $_POST["term3Start"], "end" => $_POST["term3End"], "year_id" => $yearId]);
                } catch (PDOException $e) {
                    echo $e->getMessage()."</br>";
                }
                echo "<script>
                    window.alert('Term added successfully!');
                    window.location.replace('../dashboard.html');
                </script>";
            }
        } else {
            // New entry has overlapping terms.
            echo "<script>
                window.alert('Terms have overlapping dates');
                window.location.replace('../dashboard.html');
            </script>";
        }
    } else {
        // If academic year already exists:
        echo "<script>
            window.alert('Academic year exists.');
            window.location.replace('../dashboard.html');
        </script>";
    }
?>