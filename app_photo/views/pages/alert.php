<section data-alert>
    <?php if(isset($this->session->message['text'])) { ?> 
    <div class="alert<?= (isset($this->session->message['class'])) ? ' '.$this->session->message['class'] : '' ; ?>">
        <?= $this->session->message['text']; ?>
    </div>
    <?php } ?>
</section>