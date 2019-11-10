<?php

use IWA\Auth;
use IWA\Session;

require("./views/template.php")?>

<?php require("./views/partials/header.iwa.php")?>

<?php require("./views/partials/nav.iwa.php")?>

<div class="main-content content-container">
    
    <h2> Moji zahtjevi</h2>
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
                    <th>Korisnik</th>
                    <th>Moderator</th>
                    <th>Vrijeme stvaranja</th>
                    <?php if(Auth::user() && (Auth::user()->hasRole('voditelj') || Auth::user()->hasRole('administrator') )) : ?>
                        <th>Zaključan</th>
                    <?php endif ?>
                </thead>
                <tbody>
                    <?php foreach ($projects as $key=>$project) : ?>
                        <tr>
                            <td><?= $project->naziv ?></td>
                            <td><?= $project->user()->fullName() ?></td>
                            <td><?= $project->moderator()->fullName() ?></td>
                            <td><?= $project->datum_vrijeme_kreiranja ?></td>

                            <?php if(Auth::user() && (Auth::user()->hasRole('voditelj') || Auth::user()->hasRole('administrator'))) : ?>
                                <td><?= $project->zakljucan ?></td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>


        </div>
    </div>
    <div class="flex-center">
    <?php if(Auth::user()) : ?>
        <a href="/projects/create" class="button-primary margin-top">Dodaj novi</a>
    <?php endif ?>
    </div>
</div>