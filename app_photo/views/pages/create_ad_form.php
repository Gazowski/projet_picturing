<?php
/**
 * formulaire creation annonce
 * 
 *  - titre
 *  - category
 *  - type
 *  - description
 *  - prix
 *  - photo
 *  - location
 */
?>

<div class="form">
      <div class="titre_form">  
            <h1><?= $page_title ?></h1>
      </div>

      <div class="content_form">
            <div id="infoMessage"><?php echo $message;?></div>

      <?php echo form_open("create_ad");?>

            <p>
                  <?php echo form_label($title['name']);?> <br />
                  <?php echo form_input($title);?>
            </p>

      
    <p>
      <?php echo form_label($type['name']); ?>
      <?php 
      $opt = ['default' => '-- choisir un type --'];
      foreach($type['option'] as $key=>$option)
        {
            $opt[$option->category] = $option->category;
        } 
        echo form_dropdown($type['name'], $opt,'', 'data-js-input="type"'); ?>
    </p>

      <p>
            <?php echo form_label($category['name']);?> <br />
            <?php echo form_dropdown($category['name'],$category['option'],'','data-js-input="category"');?>
      </p>

            <p>
                  <?php echo form_label($description['name']);?> <br />
                  <?php echo form_input($description);?>
            </p>
      

            <p>
                  <?php echo form_label($price['name']);?> <br />
                  <?php echo form_input($price);?>
            </p>

            <p>
                  <?php echo form_label($photo['name']);?> <br />
                  <?php echo form_input($photo);?>
            </p>

            <p>
                  <?php echo form_label($location['name']);?> <br />
                  <?php echo form_input($location);?>
            </p>  


            <p><?php echo form_submit('submit', 'ajouter');?></p>

      <?php echo form_close();?>

      </div>
</div>


