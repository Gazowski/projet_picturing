<section class="filter">
    <label for="filter">filter:</label>

    <select name="filter" id="filter">
        <option value="">--choisie une option--</option>
        <?php foreach($filter as $key=>$f) { ?>
            <option value = <?= $key ?>><?= $f ?></option>
        <?php } ?>
    </select>
</section>