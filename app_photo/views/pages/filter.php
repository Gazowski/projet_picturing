<!-- <section class="filter">
    <label for="filter">filter:</label>

    <select name="filter" id="filter">
        <option value="">--choisie une option--</option>
        <?php foreach($filter as $key=>$f) { ?>
            <option value = <?= $key ?>><?= $f ?></option>
        <?php } ?>
    </select>
</section> -->
<div class="filter">

    <div class="select">
        <select name="filter" id="filter">
            <option value="">Filtrer les annonces</option>  
            <?php foreach($filter as $key=>$f) { ?>
                <option value = <?= $key ?>><?= $f ?></option>
            <?php } ?>
        </select>
    </div>
    
    <div class="button">
        <a href="<?= base_url(); ?>index.php/create_ad"> Ajouter une annonce</a>
    </div>
    
</div>

