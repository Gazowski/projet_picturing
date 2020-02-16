<?php //var_dump($ad); ?>

<div class="parent">
        <?php foreach($ad as $row) {?>
          
          <div class="child">
                <img src="<?= base_url($row['photo'])?>" alt="<?= $row['title'] ?>"/>
                <h3><?= $row['title'] ?></h3>
                <p><?= $row['description'] ?></p>
                <div class="prix">
                  <h3><?= $row['price'] ?> CAD$</h3>
                </div>  
          </div>

        <?php } ?>
  
        </div>


    
 
