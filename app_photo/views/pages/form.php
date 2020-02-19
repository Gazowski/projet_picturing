
<h2><?= $title ?></h2>
<?php
/**
 * vue de base non utilisée
 */
    echo form_open($formaction);
    foreach($form as $input => $attribute){
        var_dump($input,$attribute);
        
        switch($input) {
            case 'text':
                echo form_label($attribute['name']);
                echo form_input($attribute);
            break;
            case 'number':
                echo form_label($attribute['name']);
                echo form_input($attribute);
            break;
            case 'password':
                echo form_label($attribute['name']);
                echo form_password($attribute);
            break;
            case 'title':
                echo form_label($attribute['name']);
                echo form_password($attribute);
            break;
            case 'description':
                echo form_label($attribute['name']);
                echo form_password($attribute);
            break;
                
            case 'description':
                echo form_label($attribute['name']);
                echo form_password($attribute);
            break;
             case 'price':
                 echo form_label($attribute['name']);
                echo form_password($attribute);
             break;
            case 'button':
                echo form_submit($attribute);
            break;
        }
    }
?>