<?php

 include_once "baseModel.php";

 function UsersList(){

     $query = "SELECT * FROM `users` WHERE NOT(role = 'A') ";
     $result = select($query);
     return $result;

 }

