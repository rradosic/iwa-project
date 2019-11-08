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
}
