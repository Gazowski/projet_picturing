<?php /**
     * liste des message rattachés à cette annonce
     * */ 
    //var_dump($user_id);
    //var_dump($threads);
?>

<?php if(isset($threads)) { ?>
<section class="form" data-component='thread'>
    <div class="titre_form">  
            <h1><?= $page_title ?></h1>
    </div>
    <ul class="">
        <?php foreach($threads as $row) {?>
            <li class="" data-thread="<?= $row['id'] ?>">
                <div class="titre_form">  
                    <h1><?= $row['subject'] ?></h1>
                </div>
                
                <!-- <p><?= $row['body'] ?></p>
                <p><?= $row['cdate'] ?></p> -->
                

                <!-- <div class="">
                    <a class="button" href="">Répondre</a>
                </div> -->

                <div data-conversation></div>
            </li>
        <?php } ?>
    </ul>
</section>
<?php } ?>

