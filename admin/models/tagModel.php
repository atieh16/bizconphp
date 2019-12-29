<?php

 include_once "baseModel.php";

  function TagDetail($mycondition = "")
  {
      $condition = "";

      if(!empty($mycondition)){
          $condition = " WHERE " . $mycondition;
      }

      $query = "SELECT posts_tags.tag_id,posts_tags.post_id,tags.id as Mytag,tags.subject,posts.title,posts.image,posts.content,posts.date
                ,posts.confirm,posts.id,posts.user_id
                FROM `posts_tags` INNER JOIN `tags` ON(`posts_tags`.`tag_id` = `tags`.`id`)INNER 
                JOIN `posts` ON(`posts_tags`.`post_id`  = `posts` .`id`)
                $condition";
      $result = select($query);
      return $result;
  }



