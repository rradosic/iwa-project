<?php
namespace IWA\Controllers;

use IWA\Auth;
use IWA\Helpers;
use IWA\Session;
use IWA\View;
use IWA\Models\Project;
use IWA\Models\Role;
use IWA\Models\User;

class ProjectController
{
    public function index()
    {
        if(Auth::user()){
            $projects = Auth::user()->projects();

            if(Auth::user()->hasRole('administrator')){
                $projects = Project::all();
            }
            View::render('project/index.iwa.php', compact('projects'));
        }
        else{
            Session::write('error', "Greška! Prijavite se da biste vidjeli projekte i slali zahtjeve!");

            Helpers::redirect('/');
        }
    }

    public function create()
    {
        if(Auth::user()){
            $project = new Project();
            $moderators = User::where('tip_id', Role::MOD_ROLE);
            
            View::render('project/create.iwa.php', compact('project', 'moderators'));
        }
        else{
            Session::write('error', "Greška! Prijavite se da biste vidjeli projekte i slali zahtjeve!");

            Helpers::redirect('/');
        }
    }
}
