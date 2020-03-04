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
        <?php var_dump($membres); foreach($membres as $membre)   
            {    
                echo "<tr id=".$membre['id']." data-row>        
                        <td>".$membre['first_name']."</td>
                        <td>".$membre['last_name']." </td>
                        <td>".$membre['email']."</td>
                        <td>".$membre['company']."</td>
                        <td>".$membre['name']."</td>
                        <td>".$membre['rating']."</td>
                        <td><button class='button' data-active=".$membre['active']."></button></td>                
                    </tr>";
            }      
        ?>
    </table>
</div>

