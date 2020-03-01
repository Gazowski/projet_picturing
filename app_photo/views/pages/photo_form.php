<section class="form" data-component='form'>
    <div class="titre_form">  
        <h1><?= $title ?></h1>
    </div>
    <div class="content_form">
        <div id="infoMessage"><?php echo $message;?></div>
        <?php echo form_open_multipart('ad/upload_photo');?>
            <input type="file" name="photo" size="20" />
            <br /><br />
            <div class='button_container'>
                <input type="submit" value="Téléverser" />
            </div>
        </form>
    <div>
</section>