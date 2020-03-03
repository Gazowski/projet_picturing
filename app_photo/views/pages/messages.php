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
                    <p><?= $row['writer'] ?></p>
                    <h3><?= $row['subject'] ?></h3>
                    <p><?= $row['date'] ?></p>
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
<?php } ?>