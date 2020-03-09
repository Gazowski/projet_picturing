<!-- affichage d'un membre -->

<section class="form_det_member" 
        data-component='detail'  
        data-table='member'
        data-id-elt = <?= $profil->id ?> >
    <div class="titre_profil">
        <h1><?= $title ?></h1>
    </div>
    <div class="detail_ad detail_member">
        <ul>
            <li>prénom : <span id='first_name' contenteditable='false' data-editable><?= $profil->first_name ?></span></li>
            <li>nom : <span id='last_name' contenteditable='false' data-editable><?= $profil->last_name ?></span></li>
            <li>courriel : <span id='email' contenteditable='false' data-editable><?= $profil->email ?></span></li>
            <li>compagnie : <span id='company' contenteditable='false' data-editable><?= $profil->company ?></span></li>
            <li>adresse : <span id='address' contenteditable='false' data-editable><?= $profil->address ?></span></li>
            <li>groupe : <span><?= $profil->name ?></span></li>
            <li>derniere connection : <span><?= $profil->last_login ?></span></li>
            <li>inscris depuis le : <span><?= $profil->created_on ?></span></li>
            <li>Note : <span><?= $profil->avg_rate != null ? $profil->avg_rate : 'pas encore d\'évaluation' ?></span></li>
        </ul>
        <?php if(isset($member_btn)) { $member_btn(); } ?>
        <?php if(isset($supervisor_btn)) { $supervisor_btn(); } ?>
        <?php if(isset($admin_btn)) { $admin_btn(); } ?>
    </div>
</section>

    
 
