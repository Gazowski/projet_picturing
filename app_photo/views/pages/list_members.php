<div data-component='ListePanier'>
    <div data-js-table-panier>
        <table>
            <tr class='produit-panier'>

                <th>Produit</th>
                <th>Prix</th>
                <th>Quantitè</th>
                <th>Total Prix</th>
            </tr>
            <?php

   foreach($data as $row)
   
      {
    
         echo "<tr class =''>
        
                  <td>".$row->name."</td>
                  <td>".$row->prix." $</td>
                  <td>".$row->quantite."</td>
                  <td>".$totalPrixProduit."</td>
                 </tr>";
              
      }
      
?>
            <tr class='produit-panier'>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            <tr class='produit-panier'>
                <td>
                    <p class="total" data-js-total>Grand Total = <?= $grandTotal ?></p>
                </td>
            </tr>

            <tr class='produit-panier'>
                <td>
                    <a href="index.php?Produits&action=afficheFormulaire">
                        <button type="button" data-js-btnform>Confirmer</button>
                    </a>
                </td>
            </tr>


            </tr>

        </table>
    </div>
</div>

<a href="index.php?">
    <p data-js-btnform>Retour à l'accueil</p>
</a>