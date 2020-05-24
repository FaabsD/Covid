<?php $this->layout('registreer-inlog');?>
<?php $this->start('page_title')?>
    Registreren
<?php $this->stop()?>
<?php $this->start('header_content')?>
    Registreren
<?php $this->stop()?>
<?php $this->start('main_content')?>
    <form action="" method="post">
        <input type="email" name="email" placeholder="E-mail adres">
        <input type="text" name="fullname" placeholder="Volledige naam">
        <input type="text" name="username" placeholder="Gebruikersnaam">
        <input type="password" name="password" placeholder="Wachtwoord">
        <input type="submit" value="Maak account aan">
    </form>
<?php $this->stop()?>