<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
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
                    <div class="content-active">
                        <img src="<?php echo site_url('/images/home.png') ?>" alt="home">
                        Home
                    </div>
                </li>
                <li>
                    <div class="content">
                        <img src="<?php echo site_url('/images/fire.png') ?>" alt="favorieten">
                        Favorieten
                    </div>
                </li>
                <li>
                    <div class="content">
                        <img src="<?php echo site_url('/images/verified.png') ?>" alt="overons">
                        Over Ons
                    </div>
                </li>
            </ul>
        </nav>
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
                    <h1>Hoe druk is het?</h1>
                    <p>Hier kun je aangeven hoe druk het is in de winkel.</p>
                </div>
                <div class="populair">
                    <h3>Drukte bij: </h3>
                    <!-- geef een formulier mits doorvewezen vanaf resultaten pagina -->
                    <?php if (isset($winkel)) : ?>
                        <form action="<?php echo url('drukte.handle') ?>" method="post">
                            <legend><?php foreach ($winkel as $gegevens) {
                                        echo $gegevens['winkelnaam'] . ' ' . $gegevens['adres'] . ' ' . $gegevens['plaats'];
                                    } ?></legend>
                            <input type="hidden" name="id" value="<?php echo $gegevens['id'] ?>">
                            <select name="drukte" id="">
                                <option value="Niet druk">Niet druk</option>
                                <option value="Druk">Druk</option>
                                <option value="Heel druk">Heel druk</option>
                            </select>
                            <input type="submit" value="Wijzig">
                        </form>
                        <!-- geef een bevestiging als de drukte is aangepast -->
                        <?php elseif (isset($bevestiging)) : ?>
                            <?php echo $bevestiging ?>
                            <br><a href="<?php echo url('home') ?>">Ga terug naar Homepage</a>
                        <!-- niet doorverwezen geef een melding -->
                        <?php else : ?>
                            <?php echo 'Er is geen winkel geselecteerd' ?>
                        <?php endif ?>
                </div>

            </section>
            <section class="right">
                <h1>hoi</h1>
            </section>
        </div>

    </main>


</body>

</html>