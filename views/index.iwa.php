<?php require("template.php")?>

<?php require("partials/header.iwa.php")?>

<?php require("partials/nav.iwa.php")?>

<div class="main-content content-container">
<?php
        if(IWA\Session::has('error')){
            require("./views/partials/messages.iwa.php");
        }
?>

<h2> Upravljanje projektima </h2>

<p>Dobrodošli na stranicu IWA projekta za upravljanje projektima arhitekture stambenih objekata.</p>

<p>Za početak odaberite neku stavku iz izbornika na vrhu stranice</p>

</div>