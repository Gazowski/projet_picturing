<div class="alert<?= (isset ($this->session->message['class'])) ? ' '.$this->session->message['class'] : '' ; ?>">
    <?= $this->session->message['text']; ?>
</div>