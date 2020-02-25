<?php //var_dump($); ?>
<?php /**
     * affichage d'une annonce 
     * */ 


   
?>  

<!-- ---------------------------------------------- -->  

    <div class="detail_ad">
      
      <div class="titre_image"> 
        <aside>
          <img src="<?= base_url($ad['photo'])?>" alt="<?= $ad['title'] ?>"/>
        </aside>
        <?= $ad['title'] ?></h3>
      </div>
      
      <div class="desc_prix_">
        <p><?= $ad['description'] ?></p>
        <div class="prix">
        <h3><?= $ad['price'] ?> CAD$</h3>
        <div>
          <a class="button" href="<?= base_url(); ?>index.php/message/create_message">Soumissionner</a>
        </div> 
      </div>

    </div>

<!-- ---------------------------------------------- -->    

<!-- <?php /**
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
<?php } ?> -->


    
    

    
 
