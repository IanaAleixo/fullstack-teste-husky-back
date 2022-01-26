<?php
 
require('../db/db_connect.php'); 
    $status = $_POST['status'];
   
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE delivery SET status=? WHERE cod_delivery = ? ";
    $q = $pdo->prepare($sql);
    $q->execute(array($status, $_GET['cod']));
    Database::disconnect();
    echo"<script>  alert('Status atualizado');
                     window.location.replace('../deliveries.html');</script>";

?>  

