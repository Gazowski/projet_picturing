<?php //var_dump($value); ?>
<section>
<!--  <h2>Liste des membres</h2> -->

    <table>
    <tr>
    <?php
        foreach($table[0] as $key => $value)
            
             { 
    ?>
             <th><?=$key?></th>
                  <!--   <th>Prénom</th>
                    <th>Nom</th>
                    <th>Nom Entreprise</th>
                    <th>Numéro Entreprise</th>
                    <th>Adresse</th>
                    <th>Télephone</th>
                    <th>Courriel</th>
                    <th>Lien site WEb</th>
                    <th>Lien Réseaux Sociaux</th>
                    <th>Role</th>
                    <th>Profil Forunisseur</th>
                    <th>Statut</th>
                    <th>Date Inscription</th>
                    <th>Date Validation</th>
                    <th>Approuvé Par</th>  -->
               
    <?php 
             }
    ?>
     </tr>

     
        
    <?php
    //var_dump($table);
        foreach($table as $row) { ?>
            <tr class =''>
            <?php foreach($row as $value) {
                //var_dump($value);
    ?>
                 
                        <td><?= $value ?></td> 

                                                               
                        
        
       
        <?php   } ?>
      
        </tr>;
        <?php }?>

    </table>
</section>