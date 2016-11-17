<?php
    include "connector.php";

    $facultyExists = false;

    if($_POST["idNumber"] != null) {
        $stmt = $conn->prepare("SELECT * FROM Faculty WHERE id = :idNumber");
        $stmt->execute(["idNumber" => $_POST["idNumber"]]);
        $facultyExists = true;
    } elseif($_POST["name"] != null) {
        $stmt = $conn->prepare("SELECT * FROM Faculty WHERE first_name = :first_name AND last_name = :last_name;");
        $stmt->execute(["first_name" => $_POST["first_name"], "last_name" => $POST_["last_name"]]);
        $facultyExists = true;
    } else {
        echo "<script>
            alert('Missing search details.');
            window.location.replace('../dashboard.html');
        </script>";
    }

    if($facultyExists && $stmt->rowCount() == 1){
        header("Location: faculty.php?id=".$_POST["idNumber"]);
        exit;
    } else {
        echo "<script>
                alert('Faculty member not found.');
                window.location.replace('../dashboard.html');
            </script>";
    }
?>