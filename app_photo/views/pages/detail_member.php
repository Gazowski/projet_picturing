<!-- affichage d'un membre -->

<section class="form_det_member" data-component='detail' data-table='member'>
    <div class="titre_profil">
        <h1><?= $title ?></h1>
    </div>
    <div class="detail_ad detail_member">
        <ul data-member = <?= $profil->id ?> >
            <li>prénom : <span id='first_name' contenteditable='false' data-editable><?= $profil->first_name ?></span></li>
            <li>nom : <span id='last_name' contenteditable='false' data-editable><?= $profil->last_name ?></span></li>
            <li>courriel : <span id='email' contenteditable='false' data-editable><?= $profil->email ?></span></li>
            <li>compagnie : <span id='company' contenteditable='false' data-editable><?= $profil->company ?></span></li>
            <li>adresse : <span id='address' contenteditable='false' data-editable><?= $profil->address ?></span></li>
            <li>groupe : <span><?= $profil->name ?></span></li>
            <li>derniere connection : <span><?= $profil->last_login ?></span></li>
            <li>inscris depuis le : <span><?= $profil->created_on ?></span></li>
        </ul>
        <div class="mod_sup">
            <button class="button" data-btn-modif>Modifier</button>
            <button class="button" data-btn-delete>Supprimer mon compte</button>
        </div>
    </div>
    
    <div class="mess_ann">
        <a href="">Voir mes messages (inactif)</a><br>
        <a href="index.php/ad/member_ads">Voir mes annonces</a>
    </div>
</section>

    
 
