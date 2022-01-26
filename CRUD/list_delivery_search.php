<?php

require('../db/db_connect.php'); 
$word = $_POST["word"];
?>
<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">Entregas</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $pdo = Database::connect();
    $sql = "SELECT * FROM delivery WHERE cod_delivery like ?";
    $q = $pdo->prepare($sql);
    $q->execute(array("%$word%"));
    foreach($pdo->query($sql)as $row){?>
        <tr>
          <td>
            <b>Código: </b><?php echo $row['cod_delivery']?><br>

            <?php $c_sql = "SELECT name FROM customer WHERE cod_customer = ?";
            $q = $pdo->prepare($c_sql);
            $q->execute(array($row['cod_customer']));
            $customer= $q->fetch(PDO::FETCH_ASSOC);?>
            <b>Cliente: </b><?php echo $customer['name']?><br>

            <?php if($row['cod_deliveryman'] == null){?>
                <b>Entregador: </b><?php echo "Não atribuído"?><br>
            <?php } else {
                $deliveryman_sql = "SELECT name FROM deliveryman WHERE cod_deliveryman = ?";
                $q = $pdo->prepare($deliveryman_sql);
                $q->execute(array($row['cod_deliveryman']));
                $deliveryman= $q->fetch(PDO::FETCH_ASSOC);?>
                <b>Entregador: </b><?php echo $deliveryman['name']?><br>
            <?php } ?>

            <b>Ponto de coleta: </b><?php echo $row['collect_point']?><br>
            <b>Ponto de destino: </b><?php echo $row['destination_point']?><br
            >
            <?php if($row['status'] == 1){?>
                <b>Status: </b><span class="badge bg-warning">Novo</span><br>
            <?php } elseif($row['status'] == 2){?>
                <b>Status: </b><span class="badge bg-warning" style="background-color: blue !important;">Entregando</span><br>
            <?php } elseif($row['status'] == 3){?>
                <b>Status: </b><span class="badge bg-success">Finalizado</span><br>
            <?php } else{?>
                <b>Status: </b><span class="badge bg-danger">Cancelada</span><br>
            <?php } ?>
            <br>
            <button type="button" class="btn btn-secondary" onclick="location.href='edit-delivery.html?cod=<?=$row['cod_delivery']?>'"><i class="ri-edit-2-fill"></i> Editar</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='alt-status.html?cod=<?=$row['cod_delivery']?>'"><i class="ri-edit-2-fill"></i> Alterar status</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='add-deliveryman.html?cod=<?=$row['cod_delivery']?>'"><i class="bi bi-box-arrow-in-right"></i> Atribuir entregador</button>
          </td>
        </tr>
        <?php 
    }  
    Database::disconnect();
    ?>
    </tbody>
</table>

