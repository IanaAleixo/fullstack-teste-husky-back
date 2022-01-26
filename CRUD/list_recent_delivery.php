<?php

require('../db/db_connect.php'); 
?>
<table class="table table-borderless datatable">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Cliente</th>
            <th scope="col">Entregador</th>
            <th scope="col">Ponto de coleta</th>
            <th scope="col">Ponto de destino</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $pdo = Database::connect();
    $sql = "SELECT * FROM delivery ORDER BY cod_delivery DESC LIMIT 5";
    $q = $pdo->prepare($sql);
    $q->execute();
    foreach($pdo->query($sql)as $row){?>
        <tr>
            <th scope="row"><?php echo $row['cod_delivery']?></th>

            <?php $c_sql = "SELECT name FROM customer WHERE cod_customer = ?";
            $q = $pdo->prepare($c_sql);
            $q->execute(array($row['cod_customer']));
            $customer= $q->fetch(PDO::FETCH_ASSOC);?>
            <td><?php echo $customer['name']?></td>

            <?php if($row['cod_deliveryman'] == null){?>
                <td>Não atribuído</td>
            <?php } else{ 
                $deliveryman_sql = "SELECT name FROM deliveryman WHERE cod_deliveryman = ?";
                $q = $pdo->prepare($deliveryman_sql);
                $q->execute(array($row['cod_deliveryman']));
                $deliveryman= $q->fetch(PDO::FETCH_ASSOC);?>
                <td><?php echo $deliveryman['name']?></td>
            <?php } ?>

            <td><?php echo $row['collect_point']?></td>
            <td><?php echo $row['destination_point']?></td
            >
            <?php if($row['status'] == 1){?>
                <td><span class="badge bg-warning">Novo</span></td>
            <?php } elseif($row['status'] == 2){?>
                <td><span class="badge bg-warning" style="background-color: blue !important;">Entregando</span></td>
            <?php } elseif($row['status'] == 3){?>
                <td><span class="badge bg-success">Finalizado</span></td>
            <?php } else{?>
                <td><span class="badge bg-danger">Cancelada</span></td>
            <?php } ?>
          </td>
        </tr>
        <?php 
    }  
    Database::disconnect();
    ?>
    </tbody>
</table>

