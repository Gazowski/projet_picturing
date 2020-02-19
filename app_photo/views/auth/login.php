<div class="form">

  <div class="titre_form">
    <h1><?php echo lang('login_heading');?></h1>
  </div>

  <div class="content_form">
    <p><?php echo lang('login_subheading');?></p>

    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("auth/login");?>

      <p>
        <?php echo lang('login_identity_label', 'identity');?>
        <?php echo form_input($identity);?>
      </p>

      <p>
        <?php echo lang('login_password_label', 'password');?>
        <?php echo form_input($password);?>
      </p>

      <p>
        <?php echo lang('login_remember_label', 'remember');?>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
      </p>


      <p><?php 

        echo form_submit('submit', lang('login_submit_btn'));?></p>

    <?php echo form_close();?>

    <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
  </div>
</div>

<div class="form">
  <div class="content_form">
    Pas encore de compte ?
    <a href="<?= base_url(); ?>index.php/auth/create_user" class="button">S'enregistrer</a>
  </div>
</div>