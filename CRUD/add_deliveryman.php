<?php
 
require('../db/db_connect.php'); 
if($_POST){
    $deliveryman = $_POST['deliveryman'];
   
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE delivery SET cod_deliveryman=? WHERE cod_delivery = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($deliveryman, $_GET['cod']));
    Database::disconnect();
    echo"<script>  alert('Entregador atribuído');
        window.location.replace('../deliveries.html');</script>";

}

?>  

