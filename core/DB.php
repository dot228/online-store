<?php

namespace core;

class DB
{
    protected $pdo;
    public function  __construct($hostname,$login,$password,$database)
    {
    $this->pdo = new \PDO("mysql: host={$hostname};dbname={$database}",$login,$password);
    }

    public function SelectValuesAt($table, $fields = "*", $where = null, $limit=null, $offset=null)
    {
        $fieldsStr = "*";
        if(is_string($fields))
            $fieldsStr = $fields;
        if(is_array($fields))
            $fieldsStr = implode(",", $fields);

        $sql = "SELECT {$fieldsStr} FROM {$table}";




        if(is_array($where) && count($where) > 0) {

            $whereArr = [];
            foreach ($where as $key => $value) {
                $whereArr [] = "{$key} = ?";
            }
            $whereStr = implode(" AND ", $whereArr);

            $sql .= ' WHERE '.$whereStr;
        }
        else if (is_string($where) && !empty($where)){
            $sql .= ' WHERE '.$where;
        }


        if(!empty($limit))
        {
            $sql .= " LIMIT {$limit}";

            if(!empty($offset))
                $sql .= ", {$offset}";
        }


        $stmt = $this->pdo->prepare($sql);
        if(is_array($where) && count($where) > 0)
            $stmt->execute(array_values($where));
        else
            $stmt->execute();


        $result = $stmt->fetchAll();

        return $result;
    }


    public function Run($query, $data=null){
        $stmt = $this->pdo->prepare($query);
        if(empty($data))
            $stmt->execute();
        else
            $stmt->execute($data);



        return $stmt->fetchAll();
    }



    public function SELECT_FROM($table, $fields = "*"){

        $fieldsStr = "*";
        if(is_string($fields))
            $fieldsStr = $fields;
        if(is_array($fields))
            $fieldsStr = implode(",", $fields);

        $sql = "SELECT {$fieldsStr} FROM {$table}";
        return $sql;
    }



    public function WHERE($where = null){
        $sql = "";
        if(is_array($where) && count($where) > 0) {

            $whereArr = [];
            foreach ($where as $key => $value) {
                $whereArr [] = "{$key} = {$value}";
            }
            $whereStr = implode(" AND ", $whereArr);
            $sql = ' WHERE '.$whereStr;
        }
        else if (is_string($where) && !empty($where)){
            $sql = ' WHERE '.$where;
        }

        return $sql;
    }


    /** Приймає ["orderBy" => "ASC"] or["orderBy" => "ASC"]
     * @param $orderBy
     * @return void
     */
    public function ORDERBY($orderBy = null){
        $sql = "";
        if(is_array($orderBy))
        {
            $orderByParts = [];
            foreach ($orderBy as $key => $value) {
                $orderByParts [] = "{$key} {$value}";
            }
            $sql .= " ORDER BY ".implode(", ", $orderByParts);
        }
        return $sql;
    }

    public function LIMIT($limit=null, $offset=null){
        $sql = "";
        if(!empty($limit))
        {
            $sql .= " LIMIT {$limit}";

            if(!empty($offset))
                $sql .= ", {$offset}";
        }

        return $sql;
    }



    public function insert($tableName, $newRowArray) {
        $conditions = [];
        foreach ($newRowArray as $key => $value) {
            $conditions[] = "{$key} = :{$key}";
        }
        $conditionsString = implode(' AND ', $conditions);

        $query = $this->pdo->prepare("SELECT COUNT(*) FROM {$tableName} WHERE {$conditionsString}");
        $query->execute($newRowArray);
        $existingRow = $query->fetchColumn();

        if ($existingRow > 0) {
            // Якщо запис вже існує, не виконуємо вставку
            return;
        }

        $fieldsArray = array_keys($newRowArray);
        $fieldsListString = implode(', ', $fieldsArray);
        $paramsArray = [];
        foreach ($newRowArray as $key => $value) {
            $paramsArray[":$key"] = $value;
        }
        $paramsListString = implode(', ', array_keys($paramsArray));

        $res = $this->pdo->prepare("INSERT INTO {$tableName} ($fieldsListString) VALUES($paramsListString)");
        $res->execute($paramsArray);
    }



    public function DELETE($table, $where){
        $sql = "DELETE FROM {$table} ";
        $sql .= $this->WHERE($where);

        if(is_string($where))
            return $this->Run($sql);
        else if(is_array($where))
            return $this->Run($sql, array_values($where));
    }




    public function UPDATE($tableName, $newValuesArray, $conditionArray) {
        $setParts = [];
        $paramsArray = [];
        foreach($newValuesArray as $key => $value) {
            $setParts[] = "{$key} = :set{$key}";
            $paramsArray[":set{$key}"] = $value;
        }
        $setPartString = implode(',', $setParts);

        $whereParts = [];
        foreach($conditionArray as $key => $value) {
            $whereParts[] = "{$key} = :where{$key}";
            $paramsArray[":where{$key}"] = $value;
        }
        $wherePartString = "WHERE ".implode(' AND ', $whereParts);
        $res = $this->pdo->prepare("UPDATE {$tableName} SET {$setPartString} {$wherePartString}");
        $res->execute($paramsArray);
    }
}