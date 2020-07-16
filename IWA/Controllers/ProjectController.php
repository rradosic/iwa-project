<?php
namespace IWA\Controllers;

use IWA\Auth;
use IWA\Helpers;
use IWA\Models\Category;
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
            elseif(Auth::user()->hasRole('korisnik') || Auth::user()->hasRole('voditelj')){
                $projects = Auth::user()->projects();
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
            $categories = Category::all();
            View::render('project/create.iwa.php', compact('project', 'moderators'));
        }
        else{
            Session::write('error', "Greška! Prijavite se da biste vidjeli projekte i slali zahtjeve!");

            Helpers::redirect('/');
        }
    }

    public function store()
    {
        $request = $_REQUEST;
        
        Project::create([
            'projekt_id' =>6,
            'moderator_id'=>$request['moderator'],
            'korisnik_id'=>Auth::user()->korisnik_id,
            'datum_vrijeme_kreiranja'=> date('Y-m-d H:i:s'),
            'naziv'=>$request['name'],
            'opis'=>$request['name'],
            'zakljucan'=>0,
        ]);

        Session::write('success', "Zahtjev uspješno spremljen!");

        Helpers::redirect('/projects');
        
    }

    public function edit()
    {
        $request = $_REQUEST;
        $project = Project::find($request['id']);
        $categories = Category::all();
        $moderators = User::where('tip_id', Role::MOD_ROLE);
        $categories = Helpers::pluck($categories, 'naziv', 'kategorija_id');

        View::render('project/edit.iwa.php', compact('project', 'categories', 'moderators'));
        
    }

    public function update()
    {
        $request = $_REQUEST;
        Helpers::dd($request);
        $project = Project::find($request['id']);
        $categories = Category::all();
        $moderators = User::where('tip_id', Role::MOD_ROLE);
        $categories = Helpers::pluck($categories, 'naziv', 'kategorija_id');

        View::render('project/edit.iwa.php', compact('project', 'categories', 'moderators'));
        
    }
}

