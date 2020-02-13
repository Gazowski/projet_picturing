<section>
    <h2>Liste des membres</h2>

    <table>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>

        <?php

            foreach($membre as $row)
            
                {
                    
                      echo "<tr class =''>
                            
                                <td>".$row->first_name."</td>
                                <td>".$row->last_name."</td>
                                                               
                            </tr>";
                }
      

        ?>
    </table>
</section>