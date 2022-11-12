<?php 
    $conn = new PDO('mysql:host=127.0.0.1:3308;dbname=cmsc121', "root", null);
    $result = $conn->query("SELECT id FROM courses");
    foreach($result as $res){
        echo $res["id"];
    }
?>