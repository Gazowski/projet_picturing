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
            <div id="infoMessage"><?php echo $message_error;?></div>

            <div class="">  
                  <h2><?= $ad['title'] ?></h2>
            </div>

            <!-- intégrer au formulaire -->
            <p>Owner : <?= $ad['owner'] ?></p>
            <p>From : <?= $profil->first_name ?> <?= $profil->last_name ?></p>

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


