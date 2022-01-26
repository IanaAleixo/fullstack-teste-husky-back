<?php
 
require('../db/db_connect.php');   
              
    $customer = $_POST['customers'];
    $deliveryman = $_POST['deliveryman'];
    $collect_point = $_POST['from'];
    $destination_point = $_POST['to'];
        
    if($deliveryman == "null"){
        $deliveryman = null;
    }

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO delivery (cod_delivery, cod_customer, cod_deliveryman, status, collect_point, destination_point) VALUES (?,?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array(null, $customer, $deliveryman, 1, $collect_point, $destination_point));
    Database::disconnect();
    echo"<script>  alert('Entrega adicionada.');
        window.location.replace('../deliveries.html');</script>";

?>  

