<?php
 
require('../db/db_connect.php'); 
        $customer = $_POST['customers'];
        $deliveryman = $_POST['deliveryman'];
        $status = $_POST['status'];
        $collect_point = $_POST['from'];
        $destination_point = $_POST['to'];
        
        if($deliveryman == "null"){
                $deliveryman = null;
        }
        
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE delivery SET cod_customer=?, cod_deliveryman=?, status=?, collect_point=?, destination_point=? WHERE cod_delivery = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($customer, $deliveryman, $status, $collect_point, $destination_point, $_GET['cod']));
        Database::disconnect();

        echo"<script>  alert('Entrega editada');
                     window.location.replace('../deliveries.html');</script>";
?>  

