
<section class="form" data-component='form'>
    <div class="titre_form">  
        <h1><?= $title ?></h1>
    </div>
    <div class="content_form">
        <div id="infoMessage"><?= $message;?></div>
            <?= form_open_multipart('ad/upload_photo');?>
            <?php for($i = 0 ; $i < $nb_photo; $i++){ ?>
                Photo <?= $i+1 ?>
                <input type="file" name="photo<?= $i+1 ?>" size="20" />
                <br />
                <?php } ?>
            <input class='button' type="submit" value="Téléverser" />
        </form>
    <div>
</section>