<?php
 
require('../db/db_connect.php'); 
if($_POST){
    $deliveryman = $_POST['deliveryman'];
   
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE delivery SET deliveryman=? WHERE cod_delivery = 'algo' ";
    $q = $pdo->prepare($sql);
    $q->execute(array($deliveryman));
    Database::disconnect();
    echo"<script>  alert('Entregador atribuído.');
        window.location.replace('../deliveries.html);</script>";

}

?>  

