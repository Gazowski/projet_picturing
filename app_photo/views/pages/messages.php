<?php /**
     * liste des message rattachés à cette annonce
     * */ 
    var_dump($this->user_id);
    var_dump($this->threads);
?>

<?php if(isset($this->threads)) { ?>
<section class="form">
    <div class="titre_form">  
            <h1><?= $page_title ?></h1>
    </div>
    <ul class="">
        <?php foreach($this->threads as $row) {?>
            <li class="">
                <div class="titre_form">  
                    <h1><?= $row['subject'] ?></h1>
                </div>
                
                <p><?= $row['body'] ?></p>
                <p><?= $row['cdate'] ?></p>
                
                <div class="">
                    <a class="button" href="">Répondre</a>
                </div>
            </li>
        <?php } ?>
    </ul>
</section>
<?php } ?>