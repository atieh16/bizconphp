<?php


 include_once "baseModel.php";

  function MySearch($goal){

      $query = "SELECT * FROM categories WHERE title LIKE '".$goal."%' ";
      $result = select($query);
      return $result;
  }

 function whereCatTitle($condition){


    $query = "SELECT posts.*,categories.title as cattitle FROM `categories` INNER JOIN `posts_categories`
              ON(`categories`.`id` = `posts_categories`.`cat_id`) inner join `posts`
              ON(`posts_categories`.`post_id` = `posts`.`id`) WHERE categories.title = '$condition' ";

    $result = select($query);
    return $result;

 }

