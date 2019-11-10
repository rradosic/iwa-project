<?php
namespace IWA\Models;

use IWA\DB;
use IWA\Traits\RoleTrait;

class User extends Model
{
    use RoleTrait;
    
    protected $tableName = 'korisnik';
    protected $idColumn = 'korisnik_id';

    public function fullName(){
        return $this->ime.' '.$this->prezime;
    }

    public function projects(){
        $rows = DB::executeQuery("SELECT * FROM projekt WHERE korisnik_id=? OR moderator_id=? ORDER BY datum_vrijeme_kreiranja DESC;", array($this->korisnik_id, $this->korisnik_id));

        return Project::addRowsToCollection($rows);
    }
}
