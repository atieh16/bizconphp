<?php
include_once "baseController.php";
include_once MODELROOT . "postModel.php";
include_once MODELROOT . "categoryModel.php";



$rol = ['A' ,'U' ];
checkLogin($rol);

if(get('action'))
{
    switch (get('action')){

        case 'list':


            $condition = " 1 = 1 ";
            if(session('rol') == 'U')
                $condition .= " AND  user_id = " . session('id') ;

            if(isset($_POST['cat']) AND $_POST['cat'] != -1)
                $condition .= " AND cat_id = " . $_POST['cat'];

            if(isset($_POST['confirm']) AND $_POST['confirm'] != -1)
                $condition .= " AND confirm = " . $_POST['cat'];

            PostDetailMine($condition);







           if(session('rol') == 'A') {

               $posts = PostDetail();


           }
           else if (session('rol') == 'U') {

                $posts = lists('posts' ,'user_id = '.$_SESSION['id']);

           }

            if(post('search' , true)){

                $confirm = $_POST['confirm'];
                $cat = $_POST['cat'];
                $cat = fetchSingle('categories', 'id=' . $cat[0]);

                  if( $confirm[0] == 1)
                {
                    $posts = SubList($cat['title'],1);

                }else if ($confirm[0] == 0)
                {
                    $posts = SubList($cat['title'],0);
                }
            }

            $cat = lists('categories');
            $data= [
               'post' => $posts,
               'categories' => $cat,

            ];
            view("post/post-list-view", $data);

            break;



        case 'delete':


            delete('posts' , "id = " . get('id'));

            if(session('rol') == 'A') {

                $posts = PostDetail();

            }else if (session('rol') == 'U')
            {
                $posts = lists('posts' ,'user_id = '.$_SESSION['id']);
            }
            $cat = lists('categories');
            $data= [
                'post' => $posts,
                'categories' => $cat,

            ];
            view("post/post-list-view" , $data);

            break;





        case 'add':


            $categories = lists('categories');
            $tags = lists('tags');
            $data = [
                'categories' => $categories,
                 'tags' =>$tags
            ];

            view("post/add-post-view" ,$data);

            break;



        case 'save':



            if(post('add-post' , true))
            {



                $data = [
                    "title" => $_POST['title'],
                    "content"=> $_POST['content'],
                    "user_id" => $_SESSION['id']

                ];

                if(session('rol') == 'A')
                {
                    $data['confirm'] = '2';
                }



                $target_dir = PATHROOT ."uploads/";
                $fileName = $_FILES['pic']['name'];
                $fileName = pathinfo($fileName , PATHINFO_FILENAME) .time(). "." .pathinfo($fileName ,   PATHINFO_EXTENSION);
                $fullPath = $target_dir . $fileName;





                if (!move_uploaded_file($_FILES['pic']['tmp_name'], $fullPath)) {
                    die("something wrong");
                }


                $data['image'] = $fileName;

                $result = add('posts', $data);





                $MyPostId = lastId();
                $data = [
                    'post_id' => $MyPostId
                ];


                foreach ($_POST['categories'] as $key => $value)
                {

                    $data['cat_id'] = $value;
                    add('posts_categories' , $data);
                }


                $data = [
                    'post_id' => $MyPostId
                ];

                foreach ($_POST['tags'] as $key => $value)
                {

                    $data['tag_id'] = $value;
                    add('posts_tags' , $data);
                }




                $message="";
                if($result)
                {
                    $message = "ok";
                }else{

                    $message = "nokay";
                }


                $categories = lists('categories');
                $tags = lists('tags');
                $data = [
                    'categories' => $categories,
                    'tags' => $tags,
                    'message' => $message
                ];

                view("post/add-post-view" , $data);


            }

            break;



        case 'edit':

            if (!get('id')) {
                header("location:postsController.php?action=list");
                die();

            }


            $post = fetchSingle('posts' , "id = " . get('id'));


            if ($post === false) {
                header("location:postsController.php?action=list");
                die();

            }
            $categories = lists('categories');
            $postsCategories = lists('posts_categories' , " post_id = " . get('id'));
            $tags = lists('tags');
            $poststags = lists('posts_tags' , " post_id = " . get('id'));
            $data =  [
                "post" => $post,
                "categories" =>$categories,
                "posts_categories" => $postsCategories,
                "tags" => $tags,
                "poststags" => $poststags
            ];



            view("post/add-post-view" , $data);


            break;


        case 'update':

            if(post('edit-post' , true)) {

                $data = [
                    "title" => $_POST['title'],
                    "content"=> $_POST['content']

                ];

                if(session('rol') == 'A')
                {
                    $data['confirm'] = '2';

                }else if (session('rol') == 'U')
                {
                    $data['confirm'] = '0';
                }

                if(isset($_FILES['pic']) AND !empty($_FILES['pic']['name'])) {

                    $target_dir = PATHROOT ."uploads/";
                    $fileName = $_FILES['pic']['name'];
                    $fileName = pathinfo($fileName, PATHINFO_FILENAME) . time() . "." . pathinfo($fileName, PATHINFO_EXTENSION);
                    $fullPath = $target_dir . $fileName;

                    if (!move_uploaded_file($_FILES['pic']['tmp_name'], $fullPath)) {
                        die("something wrong");
                    }

                    $data['image'] = $fileName;

                }



                $result = update('posts',$data , post('id'));


                $data = [
                    "post_id" => post('id')
                ];

                delete("posts_categories" , "post_id = " . post('id') );

                foreach ($_POST['categories'] as $key => $value)
                {
                    $data['cat_id'] = $value;
                    add('posts_categories' , $data);
                }



                $data = [
                    "post_id" => post('id')
                ];

                delete("posts_tags" , "post_id = " . post('id') );

                foreach ($_POST['tags'] as $key => $value)
                {
                    $data['tag_id'] = $value;
                    add('posts_tags' , $data);
                }





                if($result)
                {
                    $message = 'ok';
                }else{
                    $message = 'nokay';
                }



                $post = fetchSingle('posts' , "id = " . post('id'));



                if ($post === false) {
                    header("location:postsController.php?action=list");
                    die();

                }

                $categories = lists('categories');
                $postsCategories = lists('posts_categories' , " post_id = " . post('id'));
                $tags = lists('tags');
                $poststags = lists('posts_tags' , " post_id = " . post('id'));
                $data = [
                    'post' => $post,
                    'message' => $message,
                    'categories' => $categories,
                    "posts_categories" => $postsCategories,
                    "tags" => $tags,
                    "poststags" =>$poststags
                ];


                view("post/add-post-view" , $data);


            }



            break;



        case 'confirm':

            $data['confirm'] = '1';
            update('posts',$data , get('id'));
            $post = PostDetail();
            $cat = lists('categories');
            $data = [

                'post' => $post,
                'categories' => $cat,
            ];
            view("post/post-list-view" , $data);

            break;


    }

}












