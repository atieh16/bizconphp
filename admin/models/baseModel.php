<?php

$connection = "";

function connectDB()
{

    include PATHROOT . "inc/config.php";

    $connection = mysqli_connect($serveName , $userName , $password , $dbName);
    $connection->set_charset("utf8");


    // TODO check if connection is ok

    if(!$connection){

        die("connection failed :" . mysqli_connect_error());

    }
    return $connection;
}

function execDb($query)
{
    global $connection;
    $connection = connectDB();
    $result = mysqli_query($connection, $query);


    if($result)
    {
        return $result;
    }

    echo mysqli_error($connection);die();
}
function select($query , $single = false)
{

    $result = execDb($query);
    if(!$result || mysqli_num_rows($result) <= 0)
    {
        return false;
    }

    if($single !== false)
    {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }



    $rows = [];
    while($row = mysqli_fetch_assoc($result))
    {
        $rows [] = $row;
    }


    return $rows;

}
function insertQueryBuilder($data , $table)
{

    $query = "INSERT INTO `$table` (";
    foreach ($data AS $columnName => $value){
        $query .= $columnName . ",";
    }

    $query = rtrim($query , ",");
    $query .= " ) VALUES (";

    foreach ($data AS $columnName => $value){
        $query .= "'" . $value . "' ," ;
    }
    $query = substr($query , 0 , -1);
    $query .= " ) ";

    return $query;

}


 function updateQueryBuilder($data , $table , $conditionData )
{

    $query = "UPDATE `$table` SET ";
    foreach ($data AS $columnName => $value){
        $query .= $columnName .  " = '" .  $value . "' ,";

    }
    $query = substr($query , 0 , -1);
    $query .= "WHERE ";

    foreach ($conditionData AS $key => $value){
        $query .= $key . " = " . $value . " AND ";
    }

    $query = rtrim($query , "AND ");



    return $query;

}

function lists($table , $teampCondition = ""){

    $condition = "";
    if(!empty($teampCondition)){
        $condition = " WHERE " . $teampCondition;
    }

    $projects = select("SELECT * FROM `" . $table .  "` $condition ");
    return $projects;
}

function fetchSingle($table , $teampCondition = ""){

    $condition = "";
    if(!empty($teampCondition)){
        $condition = " WHERE " . $teampCondition;
    }

    $projects = select("SELECT * FROM `" . $table .  "` $condition " , true);
    return $projects;

}

function delete($table ,  $condition = ""){


    execDb("DELETE FROM `" . $table .  "` WHERE " . $condition );

}
function add($table , $data){



    $query = insertQueryBuilder($data , $table);
    $result = execDb($query);
    return $result;
}

function update($table , $data , $id){


    $query = updateQueryBuilder($data , $table , ['id' => $id ]);
    $result = execDb($query);
    return $result;
}

function lastId()
{

    global $connection;
    return mysqli_insert_id($connection);

}



