<?php
    if (empty($title)) $title="IWA Projekt";
    if (empty($description)) $description="Projekt za kolegij IWA 2019/2020";
?>
<!doctype html>
<html>
    <head>
        <title><?= $title ?></title>
        <meta name="description" content="<?= $description ?>"/>
        <link rel="stylesheet" href="static/style.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <?= $content ?>
        </div>
    </body>
</html>