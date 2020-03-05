<?php
  $photos = explode(',',$ad['photo']);
  $secondary_photos = array_slice($photos,1);
  $owner_name = $ad['first_name'];
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
  
  
  
  <div class="soumission display_none" data-btn-bid>
      <a class="button" href="<?= base_url(); ?>index.php/message/create_message">Soumissionner <b><?= $ad['first_name'] ?> <?= $ad['last_name'] ?></b></a>
  </div>
  
  <!-- Affichages des boutons modifier/supprimer ----------------->
  <div class="display_none modif_supp" data-btn-owner>
    <button class="button" data-btn-modif>modifier</button>
    <button class="button" data-btn-delete>supprimer</button>
  </div>  
  <!-- Fin Affichages des boutons modifier/supprimer ----------------->
  
  <!-- Affichages champs de notation et boutons noter ----------------->
  <div class="display_none rating" data-rating>
    <input type='range' 
            name='note' 
            class="notation"
            min='0' max='10'
            step='1'
            value='5' 
            data-note>
    <button class="button"
            data-btn-noter>Noter <b><?= $ad['first_name'] ?> <?= $ad['last_name'] ?></b></button>
  </div> 
  <!--Fin Affichages champs de notation et boutons noter ----------------->

</div>



<!-- ---------------------------------------------- -->    

<?php /**
     * liste des message rattachés à cette annonce
     * */ 
?>

<?php if(isset($message)) { ?>
<section class="">
    <ul class="">
        <?php foreach($message as $row) {?>
            <li class="">
                <div class="">    
                    <h3><?= $row['title'] ?></h3>
                    <p><?= $row['date'] ?></p>
                    <p><?= $row['text_message'] ?></p>
                    <p><?= $row['writer'] ?></p>
                    <p><?= $row['ad'] ?></p>
                </div>
            </li>
        <?php } ?>
    </ul>
</section>
<?php } ?>


    
    

    
 
