<div>
    <p>
    <?php foreach($breadcrumbs as $page => $href) { ?>
        <a href='<?= $href ?>'> <?= $page ?></a> / 
    <?php } ?>
    </p>
</div>