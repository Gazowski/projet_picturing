<!-- affichage d'un membre -->
<section class="form_det_member" 
        data-component='detail'  
        data-table='member'
        data-id-elt = <?= $profil->id ?> 
        data-banish = <?= $profil->is_banish ?>>
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
            <li>site web : <span><?= $profil->website?><span></li>
            <li>médias sociaux :
                <ul><?php foreach($profil->social_network as $s_n) { ?>
                    <li><a href='https://<?= $s_n ?>'><?= $s_n ?></a></li>
                <?php } ?></ul>
            </li>
            <li>Note : <span class='Stars' style='--rating:<?= $profil->avg_rate; ?>'></span></li>
        </ul>
        <div class="btn_ban_upgarde">
            <?php if(isset($member_btn)) { $member_btn(); } ?>
            <?php if(isset($supervisor_btn)) { $supervisor_btn(); } ?>
            <?php if(isset($admin_btn)) { $admin_btn(); } ?>
        </div>
    </div>
</section>

    
 
