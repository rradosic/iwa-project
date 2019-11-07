<?php
namespace IWA\Models;

use IWA\DB;
use \PDO;

class Model
{
    protected $tableName;
    protected $idColumn;

    public function __construct()
    {
        $values = DB::executeQuery(
            "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ?;",
            array($this->tableName)
        );

        $values->fetchAll();

        foreach ($values as $key => $value) {
            $this->{$value['COLUMN_NAME']} = null;
        }
    }

    public static function find($id)
    {
        $model = new static();
        $row = DB::executeQuery('SELECT * FROM '.$model->getTableName().' WHERE '.$model->getIdColumn().'=?;', array($id));
        $row = $row->fetch(PDO::FETCH_ASSOC);

        foreach ($row as $key => $value) {
            $model->{$key} = $value;
        }
        return $model;
    }

    public static function where($attribute, $value)
    {
        $model = new static();
        $rows = DB::executeQuery('SELECT * FROM '.$model->getTableName().' WHERE '.$attribute.'=?;', array($value));

        $collection = [];

        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            foreach ($row as $key => $value) {
                $model->{$key} = $value;
            }
            array_push($collection, $model);
            $model = new static();
        }
        
        return $collection;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function getIdColumn()
    {
        return $this->idColumn;
    }
}
