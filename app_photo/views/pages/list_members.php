<div'>
    <div >
        <table>
            <tr class=''>

                <th>Prénom</th>
                <th>Nom</th>
                <th>Courriel</th>
                <th>Entprise</th>
                <th>Téléphone</th>
                <th>Groupe</th>
            </tr>
            <?php

   foreach($data as $row)
   
      {
    
         echo "<tr class =''>
        
                  <td>".$row->first_name."</td>
                  <td>".$row->last_ame." $</td>
                  <td>".$row->email."</td>
                  <td>".$row->phone."</td>
                  <td>".$row->social_network."</td>
                  <td>".$row->group_id."</td>
                 
                 </tr>";
              
      }
      
?>
            <tr class=''>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

           

            <tr class=''>
                <td>
                    <a href="">
                        <button class="button" type="button">Activer</button>
                    </a>
                </td>
            </tr>


            </tr>

        </table>
    </div>
</div>

