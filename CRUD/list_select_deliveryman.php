<?php
 
require('../db/db_connect.php'); 
?>  
    <div class="row mb-3">
    <label for="deliveryman" class="col-md-4 col-lg-3 col-form-label">Entregadores</label>
    <div class="col-md-8 col-lg-9">
        <select name="deliveryman" class="form-select" aria-label="Default select example">
            <?php
            $pdo = Database::connect();
            $sql = "SELECT * FROM deliveryman WHERE status = 1 ORDER BY cod_deliveryman ASC";
            $q = $pdo->prepare($sql);
            $q->execute();
            foreach($pdo->query($sql)as $row){?>
                <option value=<?=$row['cod_deliveryman']?>><?=$row['name']?></option>
            <?php } ?>
        </select> 
    </div>
    </div>