<?php

use IWA\Auth;
use IWA\Session;

require("./views/template.php")?>

<?php require("./views/partials/header.iwa.php")?>

<?php require("./views/partials/nav.iwa.php")?>

<div class="main-content content-container">
    
    <h2> Unos zahtjeva</h2>
    <?php
        if(Session::has('error')){
            require("./views/partials/error.iwa.php");
        }
    ?>
    <div class="">
        <div>
            <form action="/projects/store" method="POST">
                <?php require("partials/form.iwa.php")?>
            </form>
           
        </div>
    </div>
    
</div>