<?php
    use IWA\Session;
?>

<?php if(Session::has('error')){ ?>
<div class="error">
    <p><b><?= IWA\Session::pull('error') ?></b></p>
</div>
<?php } ?>

<?php if(Session::has('success')){ ?>
<div class="success">
    <p><b><?= IWA\Session::pull('success') ?></b></p>
</div>
<?php } ?>