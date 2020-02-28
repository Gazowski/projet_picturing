<?php //var_dump($value); ?>
<section class="table">
<!--  <h2>Liste des membres</h2> -->

    <table>
    <tr>
    <?php
        foreach($table[0] as $key => $value)        
             { 
    ?>
             <th><?=$key?></th>            
    <?php 
             }
    ?>
    </tr>
   
    <?php

        foreach($table as $row) { ?>
            <tr class =''>
            <?php foreach($row as $value) {
                //var_dump($value);
    ?>
                 
                        <td><?= $value ?></td> 

                                                               
                        
        
       
        <?php   } ?>
      
        </tr>
        <?php }?>

    </table>
</section>