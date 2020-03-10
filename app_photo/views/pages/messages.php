<?php /**
     * liste des message rattachés à cette annonce
     * */ 
    // var_dump($ads);
    // if(isset($threads)){
    //     foreach($threads as $row) {
    //             var_dump($row['thread_id']);
    //     }
    // }

    // if(isset($ads)){
    //     foreach($ads as $ad) {
    //             var_dump($ad['title']);
    //     }
    // }
    //var_dump($threads);
?>

<?php if(isset($threads)) { ?>
<section class="form" data-component='thread'>
    <div class="titre_form">  
            <h1><?= $page_title ?></h1>
    </div>
    <article class="msg">

        <?php $i=0; foreach($threads as $row) { ?>
            <div class="" data-thread="<?= $row['thread_id'] ?>">
                <div class="titre_form" data-msg>
                            <h1><?= $ads[$i]['title'] ?></h1>
                </div>
              
                <div class="convers" data-conversation></div>
                
            </div>
        <?php $i++; } ?>
    </article>
</section>
<?php } ?>

