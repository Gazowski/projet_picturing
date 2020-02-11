<p>je suis dans la page Annonces</p>
<?php foreach($announcement as $ad) { ?>
    <ul>
        <li><?= $ad['title'] ?></li>
    </ul>
<?php } ?>