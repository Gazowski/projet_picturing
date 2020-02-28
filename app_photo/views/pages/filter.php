<!-- <section class="filter">
    <label for="filter">filter:</label>

    <select name="filter" id="filter">
        <option value="">--choisie une option--</option>
        <?php foreach($filter as $key=>$f) { ?>
            <option value = <?= $key ?>><?= $f ?></option>
        <?php } ?>
    </select>
</section> -->
<div class="filter" data-component='filter'>
    <div class="select_cont">
        <select name="filter" id="filter">
            <option value="">Filtre</option>  
            <?php foreach($filter as $key=>$f) { ?>
                <option value = <?= $key ?>><?= $f ?></option>
            <?php } ?>
        </select>
    </div>
    
</div>

