<?php $this->layout('registreer-inlog'); ?>
<?php $this->start('page_title') ?>
Bedankt
<?php $this->stop() ?>
<?php $this->start('header_content') ?>
<h2>Bedankt Voor je Registratie</h2>
<?php $this->stop() ?>
<?php $this->start('aside_content') ?>
<img src="<?php echo site_url("/images/calligraphy-thanks.jpg")?>" alt="">
<?php $this->stop() ?>
<?php $this->start('main_content') ?>
Check je E-mail om je account te bevestigen<br>
<br>
<a href="<?php echo url('home')?>">Ga terug naar startpagina</a>
<?php $this->stop() ?>