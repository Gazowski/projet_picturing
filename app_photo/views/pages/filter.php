<label for="filter">filter:</label>

<select name="filter" id="filter">
    <option value="">--choisie une option--</option>
    <?php foreach($filter as $f) { ?>
        <option value = <?= $filter[$f] ?>><?= $f ?></option>
    <?php } ?>
</select>