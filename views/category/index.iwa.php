<?php

use IWA\Auth;
use IWA\Session;

require("./views/template.php")?>

<?php require("./views/partials/header.iwa.php")?>

<?php require("./views/partials/nav.iwa.php")?>

<div class="main-content content-container">
    
    <h2> <?= $title ?> </h2>
    <?php
        if(Session::has('error')){
            require("./views/partials/error.iwa.php");
        }
    ?>
    <div class="flex-center">
        <div>
            <table>
                <thead>
                    <th>Naziv</th>
                    <th>Opis</th>
                    <?php if(Auth::user() && Auth::user()->hasRole('administrator')) : ?>
                    <th>Obavezna</th>
                    <?php endif ?>
                    <th>Broj projekata</th>
                </thead>
                <tbody>
                    <?php foreach ($categories as $key=>$category) : ?>
                        <tr>
                            <td><?= $category->naziv ?></td>
                            <td><?= $category->opis ?></td>
                            <?php if(Auth::user() && Auth::user()->hasRole('administrator')) : ?>
                                <td><?= $category->obavezna ?></td>
                            <?php endif ?>
                            <td><?= $category->projectCount() ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>