<?php
include_once "baseController.php";
include_once MODELROOT . "categoryModel.php";


$role = ['A'];
checkLogin($role);


if(get('action'))
{
    switch (get('action')){

        case 'list':


            $categories = lists('categories');
            $data['categories'] = $categories;
            view("category/list" , $data);

            break;


        case 'delete':


            delete('categories',"id = " . get('id'));
            $categories = lists('categories');
            $data['categories'] = $categories;
            view("category/list" , $data);

            break;


        case 'add':

            //load view
            view("category/add");

            break;

        case 'save':



            if(post('add-cat' , true))
            {



                $data = [
                    "title" => $_POST['title'],
                ];



                $result = add('categories',$data);

                $message="";
                if($result)
                {
                    $message = "ok";
                }else{

                    $message = "nokay";
                }


                //load view with data
                $data['message'] = $message;
                view("category/add" , $data);


            }

            break;



        case 'edit':

            if (!get('id')) {
                header("location:categoriesController.php?action=list");
                die();

            }


            $category = fetchSingle('categories',"id = " . get('id'));


            if ($category === false) {
                header("location:categoriesController.php?action=list");
                die();

            }

            $data =  [
                "categories" => $category
            ];
            //load view
            view("category/add" , $data);


            break;


        case 'update':

            if(post('edit-cat' , true)) {

                $data = [
                    "title" => $_POST['title']

                ];





                $result = update('categories',$data , post('id'));




                if($result)
                {
                    $message = 'ok';
                }else{
                    $message = 'nokay';
                }




                $category = fetchSingle('categories',"id = " . post('id'));

                if ($category === false) {
                    header("location:categoriesController.php?action=list");
                    die();

                }


                $data = [
                    'categories' => $category,
                    'message' => $message
                ];
                view("category/add" , $data);

            }



            break;


    }

}












