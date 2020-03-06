<?php
  $photos = explode(',',$ad['photo']);
  $secondary_photos = array_slice($photos,1);
  $owner_name = $ad['first_name'];
  //var_dump($threads);
?>
<div class="detail_ad" 
      data-component='detail' 
      data-table='ad'
      data-user='<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0 ;?>'
      data-owner='<?= $ad['owner']?>'>
  <div class="titre_img_desc_prix">
    <div class="img_titre">
      <div>
        <img src="<?= base_url($photos[0])?>" alt="<?= $ad['title'] ?>"/>
      </div>
      <div>
        <h2 id='title' 
            contentEditable='false' 
            data-editable><?= $ad['title'] ?></h2>
      </div>
    </div>
    <div class="line"></div>  
    <div class="desc_prix">
      <div>
        <h3>Description</h3>
        <p id='description' 
            contentEditable='false' 
            data-editable><?= $ad['description'] ?></p> 
      </div>      
    </div>
  
  </div>
  
  <!-- Affichages des photos secondaire ----------------->
  <div class="secondary_photos">
      <?php foreach($secondary_photos as $p) { ?>
        <img src="<?= base_url($p)?>" alt="<?= $ad['title'] ?>"/>
      <?php } ?>
  </div>
  <!-- Fin affichages des photos secondaire ------------->
  
  <div class="prix">
    <h3 ><span id='price' 
                data-editable 
                contentEditable='false'><?= $ad['price'] ?></span> CAD$</h3> 
  </div>
  
  <p>Auteur : <b><?= $ad['first_name'] ?> <?= $ad['last_name'] ?></b></p>
  
  <div class="soumission display_none" data-btn-bid>
      <a class="button" href="<?= base_url(); ?>index.php/message/create_message">Soumissionner</a>
  </div>
  
  <!-- Affichages des boutons modifier/supprimer ----------------->
  <div class="display_none modif_supp" data-btn-owner>
    <button class="button" data-btn-modif>modifier</button>
    <button class="button" data-btn-delete>supprimer</button>
  </div>  
  <!-- Fin Affichages des boutons modifier/supprimer ----------------->
  
  <!-- Affichages champs de notation et boutons noter ----------------->
  
  <div class="display_none rating" data-rating>
    <h4>Évaluer l'auteur</h4>
    <div class="rating">
      <span data-star='5'>☆</span><span data-star='4'>☆</span><span data-star='3'>☆</span><span data-star='2'>☆</span><span data-star='1'>☆</span>
    </div>
  </div> 
  <!--Fin Affichages champs de notation et boutons noter ----------------->

</div>