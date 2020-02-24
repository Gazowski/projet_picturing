<section class ="contener_alert" data-alert>
    <?php if(isset($this->session->message['text'])) { ?> 
    <div class="wrapper_alert">
        <div class="alert<?= (isset($this->session->message['class'])) ? ' '.$this->session->message['class'] : '' ; ?>">
            <?= $this->session->message['text']; ?>
        </div>
    </div>
    <?php } ?>
</section>