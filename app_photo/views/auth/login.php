<div class="form">

  <div class="titre_form">
    <h1><?php echo lang('login_heading');?></h1>
  </div>

  <div class="content_form">
    <p><?php echo lang('login_subheading');?></p>

    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("auth/login");?>

      <div>
        <?php echo lang('login_identity_label', 'identity');?><br>
        <?php echo form_input($identity);?>
      </div>

      <div>
        <?php echo lang('login_password_label', 'password');?><br>
        <?php echo form_input($password);?>
      </div>

      <div>
        <?php echo lang('login_remember_label', 'remember');?>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
      </div>


      <?php 

        echo form_submit('submit', lang('login_submit_btn'));?>

    <?php echo form_close();?>

    <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
  </div>
</div>