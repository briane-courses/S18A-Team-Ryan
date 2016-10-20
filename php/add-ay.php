<?php
    include "connector.php";

    echo "Data:</br>".$_POST["academic_year"]."</br>";
    echo "Term1:</br>".$_POST["term1Start"]." - ".$_POST["term1End"]."</br>";
    echo "Term2:</br>".$_POST["term2Start"]." - ".$_POST["term2End"]."</br>";
    echo "Term3:</br>".$_POST["term3Start"]." - ".$_POST["term3End"]."</br>";

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

        // Check if term dates overlap with existing terms.
        // TODO: Use term objects instead of date list.
        $termDates = array($_POST["term1Start"], $_POST["term1End"], $_POST["term2Start"], $_POST["term2End"], $_POST["term3Start"], $_POST["term3End"]);

        $stmt = $conn->prepare(
            "SELECT 1 
            FROM Term 
            WHERE :term BETWEEN start AND end");

        $i = 0;
        $isOverlap = false;
        while ($i < sizeof($termDates) && !$isOverlap) {
            $stmt->execute(["term" => $termDates[$i]]);
            if ($stmt->rowCount() > 0) {
                $isOverlap = true;
            }
            $i++;
        }

        if (!$isOverlap) {
            // Insert academic year and terms.
            try {
                $stmt = $conn->prepare(
                    "INSERT INTO AcademicYear(name)
                    VALUES (':academic_year')");
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
                    VALUES (':start, :end, 1, :year_id')");
                $stmt->execute(["start" => $_POST["term1Start"], "end" => $_POST["term1End"], "year_id" => $yearId]);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            try {
                $stmt = $conn->prepare(
                    "INSERT INTO Term (start, end, term_no, year_id)
                    VALUES (':start, :end, 2, :year_id')");
                $stmt->execute(["start" => $_POST["term2Start"], "end" => $_POST["term2End"], "year_id" => $yearId]);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            try {
                $stmt = $conn->prepare(
                    "INSERT INTO Term (start, end, term_no, year_id)
                    VALUES (':start, :end, 3, :year_id')");
                $stmt->execute(["start" => $_POST["term3Start"], "end" => $_POST["term3End"], "year_id" => $yearId]);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    } else {
        // If academic year already exists:
        echo "<script>
            window.alert('Academic year exists.');
        <\script>";
    }
?>