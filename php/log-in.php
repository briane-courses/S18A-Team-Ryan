<?php
    include "connector.php";

    echo $_POST["username"]."pass:".$_POST["password"];
    $username = isset($_POST["username"]) ? $_POST["username"] : false;
    $password = isset($_POST["password"]) ? $_POST["password"] : false;

    $stmt = $conn->prepare("SELECT * FROM LeadAccount WHERE user_name = :user_name AND password = :password");
    $stmt->execute(["user_name" => $username, "password" => $password]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "</br>Hello ".$row["user_name"];
?>