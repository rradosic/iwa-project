<?php require("template.php")?>

<?php require("partials/header.iwa.php")?>

<?php require("partials/nav.iwa.php")?>

<div class="main-content content-container">
<?php
        if(IWA\Session::has('error')){
            require("./views/partials/error.iwa.php");
        }
    ?>
</div>