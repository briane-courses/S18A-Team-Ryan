<?php

	include "connector.php";

    echo "Data:</br>".$_POST["dailydate"]."</br>";
    
    echo "<script>
                window.location.replace('../generatemonthly-all.html');
            </script>";

?>