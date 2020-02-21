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

<div class="form" data-component='form'>
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

      <!--  ---------------------------------------------les selects------------------------------------------------------- -->
                  <?php echo form_label($type['name']); ?>
                 
                        <div class="select_cont">                        
                        
                        
                                    <?php 
                                          $opt = ['default' => '-- choisir un type --'];
                                          foreach($type['option'] as $key=>$option)
                                                {
                                                      $opt[$option->category] = $option->category;
                                                } 
                                          echo form_dropdown($type['name'], $opt,'', 'data-js-input="type"'); 
                                    ?>
                        
                        </div>
                        <?php echo form_label($category['name']);?> 
                        <div class="select_cont">
                        
                                    <?php echo form_dropdown($category['name'],$category['option'],'','data-js-input="category"');?>
                        
                        </div>
               
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


                  <div class="button_container">
                        <?php echo form_submit('submit', 'ajouter');?>
                  </div>

            <?php echo form_close();?>

      </div>
</div>


