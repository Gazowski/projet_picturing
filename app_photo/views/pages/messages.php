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
    <article class="msg">
        <?php foreach($threads as $row) {?>
            <div class="" data-thread="<?= $row['thread_id'] ?>">
                <div class="titre_form" data-msg>  
                    <h1><?= $ad['title'] ?></h1>
                </div>
              
                <div class="convers" data-conversation></div>
                
            </div>
        <?php } ?>
    </article>
</section>
<?php } ?>

