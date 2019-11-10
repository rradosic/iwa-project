<?php
namespace IWA\Models;

use DateTime;

class Project extends Model {
    protected $tableName = 'projekt';
    protected $idColumn = 'projekt_id';

    public function user(){
        return User::find($this->korisnik_id);
    }

    public function moderator(){
        return User::find($this->moderator_id);
    }

    protected function castCreated(){
        $dt = new DateTime($this->datum_vrijeme_kreiranja);
        $this->datum_vrijeme_kreiranja = $dt->format('d.m.Y  H:i:s');
    }

    protected function castLocked(){
        if($this->zakljucan == 1){
            $this->zakljucan = 'Da';
        }
        else $this->zakljucan = 'Ne';
    }
}