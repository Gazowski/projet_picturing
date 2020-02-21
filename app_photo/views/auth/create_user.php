<div class="form">
      <div class="titre_form">
            <h1><?php echo lang('create_user_heading');?></h1>
      </div>
      
      <div class="content_form">
            <p><?php echo lang('create_user_subheading');?></p>

            <div id="infoMessage"><?php echo $message;?></div>

            <?php echo form_open("auth/create_user");?>

                  <p>
                        <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                        <?php echo form_input($first_name);?>
                  </p>

                  <p>
                        <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                        <?php echo form_input($last_name);?>
                  </p>
                  
                  <?php echo lang('create_user_group_label', 'group');?> <br />
                  
                  <div class="select_cont">
                  <?php
                        $opt = ['default' => '-- choisir un type --'];
                        foreach($group['option'] as $key=>$option)
                        {
                              $opt[$option->id] = $option->name;
                        } 
                        echo form_dropdown($group['name'], $opt,'', 'data-js-input="group"'); ?>
                  </div>
                  
                  
                  <?php
                  if($identity_column!=='email') {
                        echo '<p>';
                        echo lang('create_user_identity_label', 'identity');
                        echo '<br />';
                        echo form_error('identity');
                        echo form_input($identity);
                        echo '</p>';
                  }
                  ?>

                  <p>
                        <?php echo lang('create_user_company_label', 'company');?> <br />
                        <?php echo form_input($company);?>
                  </p>
                  
                  <p>
                        <?php echo lang('create_user_company_number_label', 'company_number');?> <br />
                        <?php echo form_input($company_number);?>
                  </p>

                  <p>
                        <?php echo lang('create_user_email_label', 'email');?> <br />
                        <?php echo form_input($email);?>
                  </p>

                  <p>
                        <?php echo lang('create_user_phone_label', 'phone');?> <br />
                        <?php echo form_input($phone);?>
                  </p>   
                  
                  <p>
                        <?php echo lang('create_user_address_label', 'address');?> <br />
                        <?php echo form_input($address);?>
                  </p>   
                  <p>
                        <?php echo lang('create_user_website_label', 'website');?> <br />
                        <?php echo form_input($website);?>
                  </p>   
                  <p>
                        <?php echo lang('create_user_social_network_label', 'social_network');?> <br />
                        <?php echo form_input($social_network);?>
                        <?php echo form_input($social_network);?>
                        <?php echo form_input($social_network);?>
                  </p>   
                  <p>
                        <?php echo lang('create_user_password_label', 'password');?> <br />
                        <?php echo form_input($password);?>
                  </p>

                  <p>
                        <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                        <?php echo form_input($password_confirm);?>
                  </p>


                  <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

            <?php echo form_close();?>
      </div>
</div>