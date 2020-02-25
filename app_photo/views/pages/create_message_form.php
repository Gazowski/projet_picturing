<?php
/**
 * formulaire creation annonce
 * 
 *  - titre
 *  - message
 */
?>

<div class="form" data-component='form'>
      <div class="titre_form">  
            <h1><?= $page_title ?></h1>
      </div>

      <div class="content_form">
            <div id="infoMessage"><?php echo $message;?></div>


            <?php echo form_open("create_message");?>

                  <p>
                        <?php echo form_label($title['name']);?> <br />
                        <?php echo form_input($title);?>
                  </p>
               
                  <p>
                        <?php echo form_label($description['name']);?> <br />
                        <?php echo form_input($description);?>
                  </p>

                  <div class="button_container">
                        <?php echo form_submit('submit', 'envoyer');?>
                  </div>

            <?php echo form_close();?>

      </div>
</div>


