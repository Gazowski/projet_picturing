<!-- affichage d'un membre -->
<section data-component='detail'>
    <div class="detail_ad" >
        <h3><?= $title ?></h3>
        <ul data-member = <?= $profil->id ?> >
            <li>prénom : <span id='first_name' data-editable><?= $profil->first_name ?></span></li>
            <li>nom : <span id='last_name' data-editable><?= $profil->last_name ?></span></li>
            <li>courriel : <span id='email' data-editable><?= $profil->email ?></span></li>
            <li>compagnie : <span id='company' data-editable><?= $profil->company ?></span></li>
            <li>adresse : <span id='address' data-editable><?= $profil->address ?></span></li>
            <li>groupe : <span><?= $profil->name ?></span></li>
            <li>derniere connection : <span><?= $profil->last_login ?></span></li>
            <li>inscris depuis le : <span><?= $profil->created_on ?></span></li>
        </ul>

        <button class="button" data-btn-modif>modifier</button>
        <a href="index.php/member/delete" class="button">supprimer mon compte</a>
    </div>

    <a href="index.php/message/...">voir mes messages</a><br>
    <a href="index.php/ad/...">voir mes annonces</a>
</section>

    
 
