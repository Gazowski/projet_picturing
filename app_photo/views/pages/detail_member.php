<!-- affichage d'un membre -->
<section class="form_det_member" data-component='detail'>
    <div class="detail_ad detail_ad_member">
        <h3><?= $title ?></h3>
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
           
            <div class="button">
                <a href="index.php/member/delete" class="button">Supprimer mon compte</a>
            </div>
        </div>
    </div>
    
    <div class="mess_ann">
        <a href="index.php/message/...">Voir mes messages</a><br>
        <a href="index.php/ad/...">Voir mes annonces</a>
    </div>
</section>

    
 
