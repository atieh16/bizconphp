<?php
include_once "baseController.php";
include_once MODELROOT . "pageModel.php";
include_once MODELROOT . "socialModel.php";
include_once MODELROOT . "postModel.php";
include_once MODELROOT . "metadataModel.php";
include_once MODELROOT . "commentModel.php";
include_once MODELROOT . "tagModel.php";
include_once MODELROOT . "userModel.php";



if(get('action'))
{


    $socials = social();

    switch (get('action')){


        case 'index':

             $option = getOption('کلید1');
             $options = getOption('کلید2');
             $customer = lists('customer-opinions');
             $posts = lists('posts');
             $project = lists('projects');
             $tags = TagDetail();

             $data = [

                 'option' => $option,
                 'customer' => $customer,
                 'optionS' => $options,
                 'post' => $posts,
                 'project'=>$project,
                 'tags' => $tags,
                 'socials' => $socials

                 ];

            view('pages/index' , $data);

         break;

        case 'blog':

            $posts = PostDetail();
            $categoeis = lists('categories');
            $comments = lists('comments');
            $totalposts = lists('posts');
            $tags = TagDetail();
            $postcategories = lists('posts_categories');
            $users = lists('users');
            $totaltag = lists('tags');



            $data = [
                'posts' => $posts ,
                'categories' => $categoeis,
                'comments' => $comments,
                'totalpost' => $totalposts,
                'tags' => $tags,
                'postcategories' => $postcategories,
                'users' => $users,
                'totaltag' => $totaltag,
                'socials' => $socials
            ];

            view("pages/blog" , $data);

        break;


        case 'tag-post':


            if(!get('id') || !is_numeric(get('id')) )
            {
                header("location: pagesController.php?action=blog");
                die();

            }

            $posts = TagDetail('tag_id ='.get('id'));
            $categoeis = lists('categories');
            $comments = lists('comments');
            $totalposts = lists('posts');
            $tags = TagDetail();
            $postcategories = lists('posts_categories');
            $users = lists('users');
            $totaltag = lists('tags');


            $data = [
                'posts' => $posts ,
                'categories' => $categoeis,
                'comments' => $comments,
                'totalpost' => $totalposts,
                'tags' => $tags,
                'postcategories' => $postcategories,
                'users' => $users,
                'totaltag' => $totaltag,
                'socials' => $socials
            ];

            view("pages/blog" , $data);




            break;




        case 'cat-blog':


            if(!get('id') || !is_numeric(get('id')) )
            {
                header("location: pagesController.php?action=blog");
                die();

            }


            $posts = whereCatId('posts_categories.cat_id =' . get('id'));
            $categoeis = lists('categories');
            $comments = lists('comments');
            $totalposts = lists('posts');
            $tags = TagDetail();
            $postcategories = lists('posts_categories');
            $users = lists('users');
            $totaltag = lists('tags');


            $data = [
                'posts' => $posts ,
                'categories' => $categoeis,
                'comments' => $comments,
                'totalpost' => $totalposts,
                'tags' => $tags,
                'postcategories' => $postcategories,
                'users' => $users,
                'totaltag' => $totaltag,
                'socials' => $socials
            ];


            view("pages/blog" , $data);

            break;



        case 'single-post':


            if(!get('id') || !is_numeric(get('id')) )
            {
                header("location: pagesController.php?action=blog");
                die();

            }

           $posts = fetchSingle('posts' , 'id = ' . get('id'));
           $tags = TagDetail('posts.id='.get('id'));
           $comment = lists('comments','post_id ='.get('id') );
           $user = PostDetail('posts.id='.get('id'));
           $totaluser = lists('users');
           $postcategories = lists('posts_categories');
           $Tpost = lists('posts');
           $categoeis = lists('categories');
           $totaltag = lists('tags');


               $data = [

                   'posts' => $posts,
                   'tags' => $tags,
                   'comment' => $comment,
                   'user' => $user,
                   'totaluser' => $totaluser,
                   'postcategories' => $postcategories,
                   'tpost' => $Tpost,
                   'categories' => $categoeis,
                   'totaltag' => $totaltag,
                   'socials' => $socials

               ];


            // baraye zamani ke id namotabar mizanad
            if(!$posts){
                header("location: pagesController.php?action=blog");
            }

            view("pages/single-blog" , $data);

            break;




        case 'about':

            $option = getOption('کلید3');
            $options = getOption('کلید4');
            $customer = lists('customer-opinions');
            $data = [

                'option' => $option,
                'customer' => $customer,
                'optionS' => $options,
                'socials' => $socials
            ];
            view("pages/about" , $data);

            break;


        case 'contact':

            $data = [
                'socials' => $socials
            ];
            view("pages/contact" , $data);

            break;


        case 'elements':

            $option1 = getOption('کلید7');
            $option2 = getOption('کلید8');
            $option3 = getOption('کلید9');
            $option4 = getOption('کلید10');
            $option5 = getOption('کلید11');

            $data = [

                'option1' => $option1,
                'option2' => $option2,
                'option3' => $option3,
                'option4' => $option4,
                'option5' => $option5,
                'socials' => $socials
            ];
            view("pages/elements" , $data);

            break;



        case 'project':

            $project = lists('projects');
            $customer = lists('customer-opinions');


            $data = [

                'project' => $project,
                'customer' => $customer,
                'socials' => $socials
            ];
            view("pages/project" , $data);

            break;





        case 'single-project':


            if(!get('id') || !is_numeric(get('id')) )
            {
                header("location: pagesController.php?action=project");
                die();

            }

            $project = fetchSingle('projects' ,'id='.get('id'));
            $posts = lists('posts');
            $tags = TagDetail();
            $data = [
                'project' => $project,
                'post' => $posts,
                'tags' => $tags,
                'socials' => $socials
            ];

            if(!$project){
                header("location: pagesController.php?action=project");
            }

            view("pages/single-project" , $data);

            break;




        case 'service':

            $customer = lists('customer-opinions');
            $data = [
                'customer' => $customer,
                'socials' => $socials
            ];
            view("pages/service" , $data);

            break;




        case 'search':

            if(post('search-button', 'true')) {

                $categoeis = lists('categories');
                $comments = lists('comments');
                $totalposts = lists('posts');
                $tags = TagDetail();
                $postcategories = lists('posts_categories');
                $users = lists('users');
                $totaltag = lists('tags');
                $Alarm ='searchMessage';

                $data = [

                    'searchMessage' => $Alarm,
                    'categories' => $categoeis,
                    'comments' => $comments,
                    'totalpost' => $totalposts,
                    'tags' => $tags,
                    'postcategories' => $postcategories,
                    'users' => $users,
                    'totaltag' => $totaltag,
                    'socials' => $socials
                ];



                $search = $_POST['search-text'];
                $search = substr($search, 0, 2);
                $result = MySearch($search);

                if (!empty($result) AND $result) {
                    $natije = [];

                  for ($i = 0 ; $i < count($result) ; $i++) {
                          $natije[$i] = whereCatTitle($result[$i]['title']);

                  }


                   $data['posts'] = $natije;
                   view("pages/blog", $data);

                } else {


                    $categoeis = lists('categories');
                    $comments = lists('comments');
                    $totalposts = lists('posts');
                    $tags = TagDetail();
                    $postcategories = lists('posts_categories');
                    $users = lists('users');
                    $totaltag = lists('tags');
                    $message = 'nokay';

                    $data = [

                        'categories' => $categoeis,
                        'comments' => $comments,
                        'totalpost' => $totalposts,
                        'tags' => $tags,
                        'postcategories' => $postcategories,
                        'users' => $users,
                        'totaltag' => $totaltag,
                        'message' =>$message,
                        'socials' => $socials
                    ];

                    view("pages/blog", $data);
                }

                break;

            }
    }


}












