<?php /**
     * liste des message rattachés à cette annonce
     * */ 
    //var_dump($user_id);
    //var_dump($threads);
?>

<?php if(isset($threads)) { ?>
<section class="form">
    <div class="titre_form">  
            <h1><?= $page_title ?></h1>
    </div>
    <ul class="">
        <?php foreach($threads as $row) {?>
            <li class="">
                <div class="titre_form">  
                    <h1><?= $row['subject'] ?></h1>
                </div>
                
                <p><?= $row['body'] ?></p>
                <p><?= $row['cdate'] ?></p>
                <textarea name="" id="" cols="30" rows="10"></textarea>
                <div class="">
                    <a class="button" href="index.php/message/reply">Répondre</a>
                </div>
            </li>
        <?php } ?>
    </ul>
</section>
<?php } ?>