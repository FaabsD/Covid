<?php $this->layout('website');?>
    <h2>
        Login
    </h2>

    <form action="<?php echo url( 'login.handle' ) ?>"method="POST">
    <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" value ="<?php echo input('email') ?>"placeholder="E-mail adres">
    <?php if ( isset( $errors['email'] ) ): ?>
        <?php echo $errors['email'] ?>
    <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="wachtwoord">Wachtwoord</label>
        <input type="password" name="wachtwoord" class="form-control" id="wachtwoord">
        <?php if ( isset( $errors['wachtwoord'] ) ): ?>
            <?php echo $errors['wachtwoord'] ?>
        <?php endif; ?>
    </div>

    <butoon type="submit" class="btn btn-primary">inloggen</button>
    </form>


        <img src="<?php echo site_url('/images/Icon awesome-city.png')?>" alt="Stad illustratie">

