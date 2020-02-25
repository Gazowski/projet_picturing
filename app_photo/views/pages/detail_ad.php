<?php //var_dump($); ?>
<?php /**
     * affichage d'une annonce 
     * */ 


   
?>  

<!-- ---------------------------------------------- -->  
<div class="detail_ad">
  <div class="titre_img_desc_prix">
    <div class="img_titre">
      <div>
        <img src="<?= base_url($ad['photo'])?>" alt="<?= $ad['title'] ?>"/>
      </div>
      <div>
        <h3><?= $ad['title'] ?></h3>
      </div>
    </div>
    
    <div class="desc_prix">
      <div>
        <p><?= $ad['description'] ?></p> 
      </div>
      <div class="prix">
        <h3><?= $ad['price'] ?> CAD$</h3> 
      </div>
    </div>
    
  </div>
</div>
<div class="soumission">
  <a class="button" href="<?= base_url(); ?>index.php/message/create_message">Soumissionner</a>
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


    
    

    
 
