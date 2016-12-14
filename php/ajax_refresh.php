<?php
    include "connector.php";

    $keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : false;
    $id = isset($_POST["id"]) ? $_POST["id"] : false;

    if(!$id)
    {
      echo"a";
        $keyword = '%'.$keyword.'%';

        $sql = "SELECT * FROM faculty WHERE first_name LIKE (:keyword) OR last_name LIKE (:keyword) LIMIT 0, 5";
        $query = $conn->prepare($sql);
        $query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $query->execute();
        $list = $query->fetchAll();
        foreach ($list as $rs) {
          // put in bold the written text
          $name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['last_name'].', '.$rs['first_name']);
          // add new option
            echo '<li onclick="set_itemName(\''.str_replace("'", "\'", $rs['last_name'].', '.$rs['first_name']).'\')">'.$name.'</li>';
        }

    }
    else
    {
        $id = '%'.$id.'%';

        $sql = "SELECT * FROM faculty WHERE id LIKE (:id) LIMIT 0, 5";
        $query = $conn->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $list = $query->fetchAll();
        foreach ($list as $rs) {
          // put in bold the written text
          $idname = str_replace($_POST['id'], '<b>'.$_POST['id'].'</b>', $rs['id']);
          // add new option
            echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['id']).'\')">'.$idname.'</li>';
        }

    }
    

?>