<h2><?= $title ?></h2>
<div class="line_t"></div>
<?php $filter() ?>
<div class="table">
    <table data-component="list">
        <tr class=''>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Courriel</th>
            <th>Entprise</th>
            <th>Groupe</th>
            <th>Note</th>
            <th>Action</th>
        </tr>
        <?php foreach($membres as $membre)   
            {    
                echo "<tr id=".$membre['id']." data-row>        
                        <td>".$membre['first_name']."</td>
                        <td>".$membre['last_name']." </td>
                        <td>".$membre['email']."</td>
                        <td>".$membre['company']."</td>
                        <td>".$membre['name']."</td>
                        <td class='Stars' style='--rating: ".$membre['avg_rate'].";'></td>
                        <td><a class='button' href='index.php/member/".$membre['id']."'>Profil</a></td>                
                    </tr>";
            }      
        ?>
    </table>
</div>

