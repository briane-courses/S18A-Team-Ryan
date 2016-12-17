<?php
    include "connector.php";

    echo $_POST["username"]."pass:".$_POST["password"];
    $username = isset($_POST["username"]) ? $_POST["username"] : false;
    $password = isset($_POST["password"]) ? $_POST["password"] : false;

    $stmt = $conn->prepare("SELECT * FROM LeadAccount WHERE user_name = :user_name AND password = :password");
    $stmt->execute(["user_name" => $username, "password" => $password]);
    if($stmt->rowCount() == 1){
        echo "<script>
                alert('Logged in as a Admin');
                window.location.replace('dashboard.php');
            </script>";
    } else {
        
        echo "<script>
                alert('Incorrect username or password');
                window.location.replace('../index.html');
            </script>";
        
    }
?>