<?php
 
require('../db/db_connect.php');   
if($_POST){
              
    $cod_customer = $_POST['customar-name'];
    $collect_point = $_POST['from'];
    $destination_point = $_POST['to'];

    if($_POST['deliveryman']){
        $cod_deliveryman = $_POST['deliveryman'];
    }else $cod_deliveryman = null;

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO delivery (cod_delivery, cod_customer, cod_deliveryman, status, collect_point, destination_point) VALUES (?,?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->execute(array(null, $cod_customer, $cod_deliveryman, 1, $collect_point, $destination_point));
    Database::disconnect();
    echo"<script>  alert('Entrega adicionada.');
        window.location.replace('../index.html');</script>";
}

?>  

