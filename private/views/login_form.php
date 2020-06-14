<?php $this->layout('registreer-inlog'); ?>
<?php $this->start('page_title') ?>
Inloggen
<?php $this->stop() ?>
<?php $this->start('header_content'); ?>
<h2>
    Login
</h2>
<?php $this->stop(); ?>
<?php $this->start('aside_content') ?>
<img src="<?php echo site_url('/images/Icon awesome-city.png') ?>" alt="Stad illustratie">
<?php $this->stop(); ?>
<?php $this->start('main_content') ?>
<form action="<?php echo url('login.handle') ?>" method="POST">
    <div class="form-group">
        <input type="email" name="email" value="<?php echo input('email') ?>" placeholder="E-mail adres">
        <?php if (isset($errors['email'])) : ?>
            <?php echo $errors['email'] ?>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <input type="password" name="wachtwoord" class="form-control" id="wachtwoord" placeholder="Wachtwoord">
        <?php if (isset($errors['wachtwoord'])) : ?>
            <?php echo $errors['wachtwoord'] ?>
        <?php endif; ?>
    </div>

    <input type="submit" class="btn btn-primary" value="inloggen">
</form>
<?php $this->stop() ?>