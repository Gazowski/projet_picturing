<!-- affichage d'un membre -->  
<div class="detail_ad">
    <h3><?= $title ?></h3>
    <ul data-member = <?= $profil->id ?>>
    <?php
    unset($profil->id);
    foreach($profil as $key=>$value) { ?>
        <li><?= $key ?> : <?= $value ?></li>
    <?php } ?>
    </ul>

    <button class="button">modifier</button>
    <a href="index.php/member/delete" class="button">supprimer mon compte</a>
</div>

<a href="index.php/message/...">voir mes messages</a><br>
<a href="index.php/ad/...">voir mes annonces</a>


    
    

    
 
