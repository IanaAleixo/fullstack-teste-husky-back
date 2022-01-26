<?php
 
require('../db/db_connect.php'); 
?>  
    <div class="row mb-3">
    <label for="customers" class="col-md-4 col-lg-3 col-form-label">Clientes</label>
    <div class="col-md-8 col-lg-9">
        <select name="customers" class="form-select" aria-label="Default select example">
            <option selected>Selecione</option>
            <?php
            $pdo = Database::connect();
            $sql = "SELECT * FROM customer ORDER BY cod_customer ASC";
            $q = $pdo->prepare($sql);
            $q->execute();
            foreach($pdo->query($sql)as $row){?>
                <option value=<?=$row['cod_customer']?>><?=$row['name']?></option>
            <?php } ?>
        </select> 
    </div>
    </div>
    <div class="row mb-3">
    <label for="deliveryman" class="col-md-4 col-lg-3 col-form-label">Entregadores</label>
    <div class="col-md-8 col-lg-9">
        <select name="deliveryman" class="form-select" aria-label="Default select example">
            <option value="null" selected>Nenhum</option>
            <?php
            $pdo = Database::connect();
            $sql = "SELECT * FROM deliveryman ORDER BY cod_deliveryman ASC";
            $q = $pdo->prepare($sql);
            $q->execute();
            foreach($pdo->query($sql)as $row){?>
                <option value=<?=$row['cod_deliveryman']?>><?=$row['name']?></option>
            <?php } ?>
        </select> 
    </div>
    </div>