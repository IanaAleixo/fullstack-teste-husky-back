<?php

require('../db/db_connect.php'); 
?>
<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">Entregadores</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $pdo = Database::connect();
    $sql = "SELECT * FROM deliveryman ORDER BY cod_deliveryman ASC";
    $q = $pdo->prepare($sql);
    $q->execute();
    foreach($pdo->query($sql)as $row){?>
        <tr>
          <td>
            <b>Código: </b><?php echo $row['cod_deliveryman']?><br>
            <b>Nome: </b><?php echo $row['name']?><br>
            <?php if($row['status'] == 1){ ?>
                <b>Status: </b><span class="badge bg-success">Livre</span><br>
            <?php } else{?>
                <b>Status: </b><span class="badge bg-warning">Ocupado</span><br>
           <?php } ?>
          </td>
        </tr>
        <?php 
    }  
    Database::disconnect();
    ?>
    </tbody>
</table>

