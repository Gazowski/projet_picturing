<section class ="contener_alert" data-alert data-component='alert'>
    <?php if(isset($this->session->message)) { ?> 
    <div class="wrapper_alert">
        <div class="alert<?= (isset($this->session->class)) ? ' '. $this->session->class : '' ; ?>">
            <p><?= $this->session->message; ?></p>
            <button>Ok</button>
        </div>
    </div>
    <?php } ?>
</section>