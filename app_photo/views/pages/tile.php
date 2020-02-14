<?php //var_dump($ad); ?>

<div class="parent">
        <?php foreach($ad as $row) {?>
          
          <div class="grid-child">
                <img src="<?= base_url($row['photo'])?>" alt="<?= $row['title'] ?>"/>
                <h3><?= $row['title'] ?></h3>
                <p><?= $row['description'] ?></p>
                <h3><?= $row['price'] ?> $</h3>
          </div>

        <?php } ?>
  
        </div>
    
 
