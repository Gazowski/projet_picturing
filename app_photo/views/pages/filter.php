
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

