<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="<?php echo site_url( '/css/style.css' ) ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <img src="<?php echo site_url( '/images/binoculars.png' ) ?>" alt="binoculars">
            <h2>Druktezoeker</h2>
        </div>
        <nav>
            <ul>
                <li>
                    <div class="content-active">
                        <img src="<?php echo site_url( '/images/home.png' ) ?>" alt="home">
                        Home
                    </div>
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
        </nav>
    </div>
    <main>
        <div class="header">
            <div class="searchbar">
                <form class="search" method ="post" action="<?php echo url('zoekresultaten')?>" style="max-width:200px">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <input type="text" placeholder="Zoeken.." name="search">
                </form>
            </div>
        </div>
        <div class="main-content">
            <section class="left">
                <div class="intro">
                    <h1>Welkom op Druktezoeker!</h1>
                    <p>Even snel kijken hoe druk de winkel is.. Daarvoor is deze tool bedoeld! In één oogopslag kun je
                        zien
                        of het handig is om de winkel te bezoeken, of om je uitstapje te verzetten.</p>
                </div>
                <div class="populair">
                    <h3>Populaire Winkels</h3>
                    <ol>
                        <li>NAAM</li>
                        <li>NAAM</li>
                        <li>NAAM</li>
                        <li>NAAM</li>
                        <li>NAAM</li>
                    </ol>
                </div>

            </section>
            <section class="right">
            </section>
        </div>

    </main>


</body>

</html>