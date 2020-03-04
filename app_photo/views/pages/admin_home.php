<section class = "text_tab">
    <h2><?=$title?></h2>
    <h3>Membres à activer</h3>
    <?php if(!$unactive_member) { ?>
        <p>Tous les membres sont actifs.</p>
    <?php } else { ?> 
        <div class="table">
            <table data-component="list">
                <tr class=''>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Courriel</th>
                    <th>Entreprise</th>
                    <th>Groupe</th>
                    <th>Action</th>
                </tr>
                <?php foreach($unactive_member as $member) { ?>    
                    <tr id="<?= $member['id'] ?>" data-row = 'member'>        
                        <td><?= $member['first_name'] ?></td>
                        <td><?= $member['last_name'] ?></td>
                        <td><?= $member['email'] ?></td>
                        <td><?= $member['company'] ?></td>
                        <td><?= $member['name'] ?></td>
                        <td><button class='button' data-active="<?= $member['active'] ?>">Activer</button></td>                
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } ?>
    <h3>Annonce à valider</h3>
    <?php if(!$unactive_ad) { ?>
        <p>Toutes les annonces ont été validées.</p>
    <?php } else { ?> 
        <div class="table">
            <table data-component="list">
                <tr class=''>
                    <th>titre</th>
                    <th>type</th>
                    <th>Fournisseur</th>
                    <th>prix</th>
                    <th>Action</th>
                </tr>
                <?php foreach($unactive_ad as $ad) { ?>    
                    <tr id="<?= $ad['id_ad'] ?>" data-row = 'ad'>        
                        <td><?= $ad['title'] ?></td>
                        <td><?= $ad['name'] ?></td>
                        <td><?= $ad['first_name'] . ' ' . $ad['last_name'] ?></td>
                        <td><?= $ad['price'] ?>$</td>
                        <td><button class='button' data-active="<?= $ad['ad_active'] ?>"></button></td>                
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } ?>
</section>


