<?php
/**
 * formulaire creation annonce
 * 
 *  - titre
 *  - message
 */
//var_dump($_SERVER);
//var_dump($data);
?>

<div class="form" data-component='form'>
      <div class="titre_form">  
            <h1><?= $page_title ?></h1>
      </div>

      <div class="content_form">
            <div id="infoMessage"><?php echo $message_error;?></div>

            <div class="">  
                  <h2><?= $subject ?></h2>
            </div>

            <?php echo form_open("message/create_message");?>

                  <div>
                        <?php echo form_label($body['name']);?> <br>
                        <?php echo form_textarea($body);?>
                  </div>
                  
                  <div class="button_container">
                        <?php echo form_submit('submit', 'envoyer');?>
                  </div>

            <?php echo form_close();?>

      </div>
</div>


