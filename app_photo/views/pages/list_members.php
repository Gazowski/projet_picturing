<div >
    <table data-component="list">
        <tr class=''>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Courriel</th>
            <th>Entprise</th>
            <th>Groupe</th>
            <th>Action</th>
        </tr>
        <?php foreach($membres as $membre)   
            {    
                echo "<tr id=".$membre['id']."class ='' data-active=".$membre['active'].">        
                        <td>".$membre['first_name']."</td>
                        <td>".$membre['last_name']." </td>
                        <td>".$membre['email']."</td>
                        <td>".$membre['company']."</td>
                        <td>".$membre['name']."</td>
                        <td><a href='' class='button'></a></td>                
                    </tr>";
            }      
        ?>
    </table>
</div>

