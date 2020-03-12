<section class="breadcrumbs">
    <p>
    <?php 
    if(isset($breadcrumbs)){
        foreach($breadcrumbs as $page => $href) { ?>
            <a href=<?= $href ?>> <?= $page ?></a>
        <?php }
    } ?>
    </p>
</section>