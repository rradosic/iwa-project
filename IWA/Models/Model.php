<?php
namespace IWA\Models;

use IWA\DB;
use \PDO;

class Model
{
    protected $tableName;
    protected $idColumn;

    public function __construct($fields = null)
    {
        if(!$fields){
            $values = DB::executeQuery(
                "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ?;",
                array($this->tableName)
            );
    
            $values->fetchAll();
    
            foreach ($values as $key => $value) {
                $this->{$value['COLUMN_NAME']} = null;
            }
        }
        else{
            foreach ($fields as $key => $value) {
                $this->{$key} = $value;
            }

            $this->callCasts();
        }
        
    }

    public static function find($id)
    {
        $model = new static();
        $row = DB::executeQuery('SELECT * FROM '.$model->getTableName().' WHERE '.$model->getIdColumn().'=?;', array($id));
        $row = $row->fetch(PDO::FETCH_ASSOC);

        $model = new static($row);

        return $model;
    }

    public static function where($attribute, $value)
    {
        $model = new static();
        $rows = DB::executeQuery('SELECT * FROM '.$model->getTableName().' WHERE '.$attribute.'=?;', array($value));

        return self::addRowsToCollection($rows);
    }

    public static function all()
    {
        $model = new static();
        $rows = DB::executeQuery('SELECT * FROM '.$model->getTableName());

        return self::addRowsToCollection($rows);
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function getIdColumn()
    {
        return $this->idColumn;
    }

    private function callCasts(){
        $methods = get_class_methods($this);
        $castMethods = preg_grep("/(^cast)/", $methods);

        foreach ($castMethods as $key => $value) {
            $this->{$value}();
        }
    }

    public static function addRowsToCollection($rows){
        $collection = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            $model = new static($row);

            array_push($collection, $model);
        }
        
        return $collection;
    }
}
