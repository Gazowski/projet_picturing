<?php //var_dump($); ?>
<?php /**
     * affichage d'une annonce 
     * */ 
?>  
  <h2>SELECTION</h2>
  
  <div class="line_t"></div>
<div class="parent">
 
    
    <div class="child">
        <aside>
          <img src="<?= base_url(['photo'])?>" alt="<?= 'title'] ?>"/>
        </aside>
        <div>
          <h3><?= ['title'] ?></h3>
          <p><?= ['description'] ?></p>
          <div class="prix">
            <h3><?= ['price'] ?> CAD$</h3>
          </div>
        </div>  
    </div>
    <a class="button" href="">Soumissioner</a>
 

</div>


<?php /**
     * liste des message rattachés à cette annonce
     * */ 
?>


<section class="">
    <ul class="">
        <?php foreach($message as $row) {?>
                    <li class="">
                        <div class="">    
                            <h3><?= $row['title'] ?></h3>
                            <p><?= $row['date'] ?></p>
                            <h3><?= $row['text_message'] ?></h3>
                            <h3><?= $row['writer'] ?></h3>
                            <p><?= $row['ad'] ?></p>
                        </div>
                    </li>
        <?php } ?>

    </ul>

</section>


    
    

    
 
