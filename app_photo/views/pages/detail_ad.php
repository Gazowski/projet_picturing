<div class="detail_ad" 
      data-component='detail' 
      data-table='ad'
      data-user='<?= isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0 ;?>'
      data-owner='<?= $ad['owner']?>'>
  <div class="titre_img_desc_prix">
    <div class="img_titre">
      <div>
        <img src="<?= base_url($ad['photo'])?>" alt="<?= $ad['title'] ?>"/>
      </div>
      <div>
        <h3 id='title' 
            contentEditable='false' 
            data-editable><?= $ad['title'] ?></h3>
      </div>
    </div>
    
    <div class="desc_prix">
      <div>
        <h3>Description</h3>
        <p id='description' 
            contentEditable='false' 
            data-editable><?= $ad['description'] ?></p> 
      </div>
      
    </div>
    
  </div>
  <div class="prix">
    <h3 ><span id='price' 
                data-editable 
                contentEditable='false'><?= $ad['price'] ?></span> CAD$</h3> 
  </div>
  <div class="soumission display_none" data-btn-bid>
      <a class="button" href="<?= base_url(); ?>index.php/message/create_message">Soumissionner</a>
  </div>
  <div class="display_none" data-btn-owner>
    <button class="button" data-btn-modif>modifier</button>
    <a href="index.php/ad/delete" class="button">supprimer</a>
  </div>  


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


    
    

    
 
