<?php


 include_once "baseModel.php";

  function CommentDetail($mycondition = ""){

      $condition = "";

      if(!empty($mycondition)){
          $condition = " WHERE " . $mycondition;
      }

      $query = "SELECT comments.*,comments.date,users.name,users.last_name,users.role,posts.title,posts.image
                FROM `comments` INNER JOIN `users` ON(`comments`.`user_id` = `users`.`id`)
                INNER JOIN `posts` ON (`comments`.`post_id` = `posts`.`id`)
                $condition";
      $result = select($query);
      return $result;

  }


