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

<h2><?= $title ?></h2>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("pages/create_ad_form");?>

      <p>
            <?php echo form_label($title['name']);?> <br />
            <?php echo form_input($title);?>
      </p>

      

      <ul>
            <?php 
                  foreach ($types as $type)
                  {
            ?>
                        <li><?php echo $type->name; ?>
                        <?php
                              if(!empty($type->subs)) 
                                    { 
                                          echo '<ul>';
                                                foreach ($type->subs as $sub)  {
                                                      echo '<li>' . $sub->name . '</li>';
                                                }
                                          echo '</ul>';
                                    }
                        ?>
                        </li>
                        <?php
                  }
                        ?>
      </ul>

      <p>
            <?php echo form_label($category['name']);?> <br />
            <?php echo form_input($category);?>
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

    


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

<?php echo form_close();?>



