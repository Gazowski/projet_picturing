<?php //var_dump($); ?>
<!-- affichage d'un membre -->  
<div class="detail_ad">
    <h3><?= $title ?></h3>

    <?php var_dump($profil) ?>

    <ul data-id='<?= $profil['id']?>'>
    <?php 
    unset($profil['id']);
    foreach($profil as $key => $value) { ?>
        <li><?= $key ?> : <?= $value ?></li>
    <?php } ?>
    </ul>


</div>


    
    

    
 
