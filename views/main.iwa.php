<?php
    if (empty($title)) $title="IWA Projekt";
    if (empty($description)) $description="Projekt za kolegij IWA 2019/2020";
?>
<!doctype html>
<html>
    <head>
        <title><?= $title ?></title>
        <meta name="description" content="<?= $description ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes" ,="" target-densitydpi="device-dpi">
        <link rel="stylesheet" href="static/style.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    </head>
    <body>
        <div class="container">
            <?= $content ?>
        </div>
    </body>
</html>