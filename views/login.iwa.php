<?php require("template.php")?>

<?php require("partials/header.iwa.php")?>

<?php require("partials/nav.iwa.php")?>

<div class="main-content content-container">
    <h2> <?= $title ?> </h2>
    <div class="flex-center">
        <div>
            <form action="/authenticate" method="post">
                <label for="uname">Korisničko ime</label>
                <input type="text" name="username" placeholder="Korisničko ime">

                <label for="pass">Lozinka</label>
                <input type="password" name="password" placeholder="Lozinka">

                <input type="submit" class="submit-button float-right" value="Prijavi se">
            </form>
        </div>
    </div>
</div>