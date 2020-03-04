<?php /**
     * liste des message rattachés à cette annonce
     * */ 
    var_dump($_SESSION);
?>

<!-- <?php //if(isset($message)) { ?> -->
<section class="form">
<div class="titre_form">  
            <h1><?= $page_title ?></h1>
      </div>
    <ul class="">
        <?php foreach($msg as $row) {?>
            <li class="">
                <div class="">    
                    <p><?= $row['sender_id'] ?></p>
                    <h3><?= $row['subject'] ?></h3>
                    <p><?= $row['body'] ?></p>
                    <p><?= $row['text_message'] ?></p>
                </div>
                  <?php foreach($message as $row) {?>
                    <li class="">
                        <div class="">    
                            <p><?= $row['writer'] ?></p>
                            <h3><?= $row['subject'] ?></h3>
                            <p><?= $row['date'] ?></p>
                            <p><?= $row['text_message'] ?></p>
                        </div>
                    </li>
                  <?php } ?>
              </ul>
            </li>
        <?php } ?>
    </ul>
</section>
<!-- <?php //} ?> -->