<?php 
require('../db/db_connect.php'); 

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT COUNT(*) FROM deliveryman";
    $res = $pdo->query($sql);
    $count = $res->fetchColumn();
    Database::disconnect();

?>  
<h6><?=$count?></h6>