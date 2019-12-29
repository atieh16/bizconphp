<?php


 include_once "baseModel.php";

function whereCatId($mycondition = ""){

    $condition = "";

    if(!empty($mycondition)){
        $condition = " WHERE " . $mycondition;
    }


    $query = "SELECT posts.*,users.name,users.last_name FROM `posts` INNER JOIN `posts_categories` ON 
                   (`posts`.`id` = `posts_categories`.`post_id`)  INNER JOIN 
                    `users` ON (`posts`.`user_id` = `users`.`id`)
                     $condition";

    $posts = select($query);
    return $posts;

}



 function PostDetail($mycondition = ""){

     $condition = "";
     if(!empty($mycondition)){
         $condition = " WHERE " . $mycondition;
     }

      $query = "SELECT posts.*,
                users.name,users.last_name,users.role,users.description,users.image as Myimage
                FROM `posts` INNER JOIN `users` ON(`posts`.`user_id` = `users`.`id`)
                 $condition";


     $result = select($query);
     return $result;

 }

function PostDetailMine($mycondition = ""){

    $condition = "";
    if(!empty($mycondition)){
        $condition = " WHERE " . $mycondition;
    }

    $query = "SELECT posts.*,
                users.name,users.last_name,users.role,users.description,users.image as Myimage
                FROM `posts` INNER JOIN `users` ON(`posts`.`user_id` = `users`.`id`)
                 $condition";


    $result = select($query);
    return $result;

}



function SubList($title="",$Agree = "",$userId = -1){



    $query = "SELECT posts.*,users.name,users.last_name,users.role
              FROM `categories` INNER JOIN `posts_categories`
              ON(`categories`.`id` = `posts_categories`.`cat_id`) inner join `posts`
              ON(`posts_categories`.`post_id` = `posts`.`id`)INNER JOIN `users`
              ON(`posts`.`user_id` = `users`.`id`)";

    if($title !== "")
    {
        $query.= "WHERE categories.title= '$title'";
    }else if($title == "")
    {
        $query.= "WHERE 1=1 ";
    }

    if($Agree === 0)
    {
        $query .= "AND posts.confirm = '0'";

    }else if($Agree === 1)
    {
        $query .= "AND posts.confirm = '1'";
    }
    if($userId !== -1){
        $query .= "AND posts.user_id = '$userId'";
    }

    $result = select($query);

    return $result;

}


