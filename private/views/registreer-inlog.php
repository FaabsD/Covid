<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo site_url('/css/style.css')?>">
    <title><?php echo $this->section('page_title');?></title>
</head>
<body>
    <nav>
        <h1>DRUKTEZOEKER</h1>
    </nav>
    <header>
        <?php echo $this->section('header_content');?>
    </header>
    <main>
        <?php echo $this->section('main_content');?>
    </main>  
</body>
</html>