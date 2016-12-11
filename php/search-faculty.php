<?php
    include "connector.php";

    $facultyExists = false;

    if($_POST["idNumber"] != null) {
        $stmt = $conn->prepare("SELECT * FROM Faculty WHERE id = :idNumber");
        $stmt->execute(["idNumber" => $_POST["idNumber"]]);
        $facultyExists = true;
    } elseif($_POST["option"] = "name") {
        $stmt = $conn->prepare(
            "SELECT *
            FROM Faculty
            WHERE first_name = :firstName
                AND last_name = :lastName;");
        $stmt->execute(["firstName" => $_POST["firstName"], "lastName" => $_POST["lastName"]]);
        $facultyExists = true;
    } else {
        echo "<script>
            alert('Missing search details.');
            window.location.replace('../dashboard.html');
        </script>";
    }

    if($facultyExists && $stmt->rowCount() == 1) {
        header("Location: faculty.php?id=".$stmt->fetch(PDO::FETCH_ASSOC)["id"]."&date=".date("Y-m-d H:i:s"));
        exit;
    } else {
        echo "<script>
                alert('Faculty member not found.');
                window.location.replace('../dashboard.html');
            </script>";
    }
?>
