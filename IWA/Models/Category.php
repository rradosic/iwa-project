<?php
namespace IWA\Models;

use IWA\DB;

class Category extends Model {
    protected $tableName = 'kategorija';
    protected $idColumn = 'kategorija_id';

    public function castRequired(){
        if($this->obavezna == 1){
            $this->obavezna = 'Da';
        }
        else $this->obavezna = 'Ne';
    }

    public function projectCount(){
        $result = DB::executeQuery('SELECT COUNT(DISTINCT projekt_id) FROM stavke_projekta WHERE kategorija_id = ?', array($this->kategorija_id));

        return $result->fetch()[0];
    }
}