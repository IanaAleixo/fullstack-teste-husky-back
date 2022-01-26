<?php

require('../db/db_connect.php'); 
?>
<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">Clientes</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $pdo = Database::connect();
    $sql = "SELECT * FROM customer ORDER BY cod_customer ASC";
    $q = $pdo->prepare($sql);
    $q->execute();
    foreach($pdo->query($sql)as $row){?>
        <tr>
          <td>
            <b>Código: </b><?php echo $row['cod_customer']?><br>
            <b>Nome: </b><?php echo $row['name']?><br>
          </td>
        </tr>
        <?php 
    }  
    Database::disconnect();
    ?>
    </tbody>
</table>

