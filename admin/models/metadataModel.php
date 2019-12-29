<?php


 include_once "baseModel.php";

function getOption($optionName){

    $option = fetchSingle('meta_datas' , "klid = '$optionName'");
    return $option;
}


