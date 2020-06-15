<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Winkel toevoegen</title>
    <link rel="stylesheet" href="<?php echo site_url('/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="<?php echo site_url('/images/binoculars.png') ?>" alt="binoculars">
            <h2>Druktezoeker</h2>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="<?php echo url('home')?>">
                        <div class="content-active">
                            <img src="<?php echo site_url( '/images/home.png' ) ?>" alt="home">
                            Home
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('register')?>">
                        <div class="content">
                            <img src="<?php echo site_url( '/images/fire.png' ) ?>" alt="Registreren">
                            Registreren
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('login.form')?>">
                        <div class="content">
                            <img src="<?php echo site_url( '/images/fire.png' ) ?>" alt="Inloggen">
                            Inloggen
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('add.winkel')?>">
                        <div class="content">
                            <img src="<?php echo site_url( '/images/fire.png' ) ?>" alt="Toevoegen">
                            Toevoegen
                        </div>
                    </a>
                </li>
            </ul>
    </div>
    <main>
        <div class="header">
            <div class="searchbar">
                <form class="search" method="post" action="<?php echo url('zoekresultaten') ?>" style="max-width:200px">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <input type="text" placeholder="Zoeken.." name="search">
                </form>
            </div>
        </div>
        <div class="content">
            <section class="left">
                <div class="intro">
                    <h1>Winkel toevoegen</h1>
                    <p>Staat uw winkel er niet tussen? Via het formulier kunt u deze zelf toevoegen.</p>
                </div>
                <div class="populair">
                    <?php if (!isset($_SESSION['user_id'])) : ?>
                        <h3><?php echo 'Je bent niet ingelogd' ?></h3>
                    <?php elseif (isset($succes)) : ?>
                        <h3><?php echo $succes ?></h3>
                        <a href="<?php echo url('home') ?>">Terug naar Homepage</a>
                    <?php else : ?>
                        <form class="add" action="<?php echo url('handle.winkel') ?>" method="post">
                            <label for="winkelnaam">Winkel:</label>
                            <input type="text" name="winkelnaam" placeholder="bijv. Dekamarkt"><br>
                            <label for="adres">Adres:</label>
                            <input type="text" name="adres" placeholder="bijv. Drielse Wetering 48"><br>
                            <label for="plaats">Plaats:</label>
                            <input type="text" name="plaats" placeholder="bijv. Zaandam"><br>
                            <label for="drukte">Drukte</label>
                            <select name="drukte">
                                <option value="Niet druk">Niet druk</option>
                                <option value="Druk">Druk</option>
                                <option value="Heel druk">Heel druk</option>
                            </select><br>
                            <input type="submit" value="Voeg toe">
                        </form>
                    <?php endif ?>

                </div>

            </section>
            <section class="right">
            </section>
        </div>

    </main>


</body>

</html>