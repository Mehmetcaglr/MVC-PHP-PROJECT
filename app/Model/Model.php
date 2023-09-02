<?php

namespace App\Model;

use App\Model\Employee\Employee;
use Database\DB;
use PDO;

/**
 *
 */
class Model extends DB
{
    public $result, $cls;

    public function __construct()
    {
        parent::__construct();
        $this->table = isset($this->table) ? $this->table : get_called_class();
    }

    /**
     * @return $this
     */
    public function query()
    {
        if (isset($this->fillable) && !empty($this->fillable)) {

            $fillable = join(",", $this->fillable);

            $this->sql = "select $fillable from $this->table";

        } else {

            $this->sql = "select * from $this->table";
        }

        return $this;
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        $fileds = array_keys($data); //first_name, second_name, last_name, email, identifictaion_number, phone
        $fileds = implode(",", $fileds);
        $values = array_values($data);
        $questionMark = "";
        $questionMarks = array_map(function ($item) use ($questionMark)
        {
          return $questionMark.= "?";
        },$values);

        $questionMarks = implode("," , $questionMarks);

        $sql = "insert into $this->table ($fileds) VALUES ($questionMarks)";

        $this->pdo->prepare($sql)->execute($values);

        die;
    }

    /**
     * @param $condition
     * @return $this
     */
    public function where($field = null, $operator = null)
    {
        if (!is_null($operator) && !is_null($field)) {

            $this->sql .= " where ". $field. " = " . $operator;

        } else {

            $this->sql;

        }

        return $this;
    }

    /**
     * @return array|false
     */
    public function get()
    {
        return $this->pdo->query($this->sql)->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        $primaryKey = isset($this->primaryKey) ? $this->primaryKey : "id";
        $this->sql = "select * from $this->table where $primaryKey = $id";

        return $this->pdo->query($this->sql)->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param array $data
     * @param int $id
     * @return void
     */
    public function update(array $data, int $id): void
    {
        $item = [];

        foreach ($data as $key => $datum)
        {
            $item[] = $key . "=" . "?";
        }

        $newData = implode(', ', $item);

        $primaryKey = isset($this->primaryKey) ? $this->primaryKey : "id";

        $this->sql = "UPDATE $this->table SET $newData Where $primaryKey =  $id";

        $query = $this->pdo->prepare($this->sql)->execute(array_values($data));

    }

    /**
     * @return mixed
     */
    public function first()
    {
        return $this->pdo->query($this->sql)->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param string $model
     * @param $foreginKey
     * @param array $columns
     * @return void
     */
    public function with(string $model, $foreginKey, array $columns = [])
    {
        if (!empty($columns)){

            $relatedClassColumns = array_map(function($item){
                return $this->table.'.'.$item;
            }, $columns);

            $modelColumns = array_map(function ($item) use ($model) {
                return $model.".".$item;
            }, $columns);

            $attributes = array_merge($relatedClassColumns, $modelColumns);
            $withColumn = implode(",", $attributes);

            $this->sql = "select $withColumn $this->table";
        }

        $relation = $this->{$model}();

        $this->sql .= " inner join $model on $this->table.$relation[2] = $relation[0].$relation[1]";

        echo $this->sql;die;

    }

    public function delete($id): void
    {
        $primaryKey = isset($this->primaryKey) ? $this->primaryKey: "id";

        $this->sql = "DELETE FROM $this->table WHERE $primaryKey = $id";

        $this->pdo->query($this->sql)->execute();
    }



    /**
     * @param $related
     * @param $localKey
     * @param $frogeinKey
     * @return array
     */
    public function hasMany($related, $localKey, $frogeinKey)
    {
        $this->sql = "SELECT $this->table, $related fROM $this->table LEFT JOIN $related ON $localKey = $frogeinKey ";    // addres_id = frogeinKey

        return ["related" =>$related, "localKey" =>$localKey, "frogeinKey"=>$frogeinKey];
    }
}