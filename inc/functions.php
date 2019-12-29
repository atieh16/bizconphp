<?php



 function message ($result , $path , $params = [] , $message = "")
 {
     if(empty($message))
     {
       if($result)
       {
           $message = 'ok';
       }
       else
       {
           $message = 'nokay';
       }
     }

     $location = "location:{$path}?";
     foreach ($params AS $key => $param)
     {
         $location .=$key . "=" . $param ."&";
     }

     $location .= "message=" . $message;
     header($location);
     die();
 }


 function get ($key , $empty = false)
 {

    if($empty == true AND isset($_GET[$key]) AND !empty($_GET[$key]))
    {
        return true;
    }

     if(isset($_GET[$key]) AND $empty == false) {
         return $_GET[$key];
     }
     return false;
 }



 function post ($key , $empty = false)
 {


     if($empty == true AND isset($_POST[$key])){

         return true;
     }


     if(isset($_POST[$key]) AND $empty == false AND !empty($_POST[$key])) {
         return $_POST[$key];
     }

     return false;
 }

 function view($path , $data = [])
 {
    $path .= ".php";
    include_once VIEWROOT . $path;
 }

 function checkLogin($role = [])
 {

    if(!isset($_SESSION['id']) OR !in_array($_SESSION['rol'] , $role)){
        header("location: http://localhost/bizconphp/admin/controllers/usersController.php?action=dashboard");
        die();
    }

 }


function session ($key , $empty = false)
{

    if($empty == true AND isset($_SESSION[$key])){

        return true;
    }


    if(isset($_SESSION[$key]) AND $empty == false AND !empty($_SESSION[$key])) {
        return $_SESSION[$key];
    }

    return false;
}


