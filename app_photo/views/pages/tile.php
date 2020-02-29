<section>   
  <h2 data-title><?= $title ?></h2>  
  <div class="line_t"></div>
  <div class="parent" data-component="Ad">
  <?php if($create_ad) { ?>
      <a href='index.php/ad/create_ad' class='child create_ad'>
        <div>
          <h3>ajouter une annonce</h3>
          <h3><i class="fas fa-plus-circle"></i></h3>
        </div>
      </a>  
    <?php } ?>
    <?php foreach($ad as $row) {
      $unactive = $row['active'] == 0 ? ' unactive' : ''?>      
      <div class="child<?= $unactive ?>" data-js-tile=<?= $row['id_ad'] ?>>
            <img src="<?= base_url($row['photo'])?>" alt="<?= $row['title'] ?>"/>
            <h3><?= $row['title'] ?></h3>
            <p><?= $row['description'] ?></p>
            <div class="prix">
              <h3><?= $row['price'] ?> CAD$</h3>
            </div>  
      </div>
    <?php } ?>
  </div>
</section>


    
 
