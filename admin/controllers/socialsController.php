<?php
include_once "baseController.php";
include_once MODELROOT . "socialModel.php";


$rol = ['A'];
checkLogin($rol);

if(get('action'))
{
    switch (get('action')){

        case 'list':


            $social = lists('socials');
            $data['social'] = $social;
            view("social/social-list-view" , $data);

            break;


        case 'delete':


            delete('socials' , "id = " . get('id'));

            $social = lists('socials');
            $data['social'] = $social;
            view("social/social-list-view" , $data);

            break;


        case 'add':

            view("social/add-social-view" );

            break;

        case 'save':



            if(post('add-social' , true))
            {



                $data = [
                    "title" => $_POST['title'],
                    "icon"=> $_POST['icon'],
                    "link"=> $_POST['link']

                ];



                $result = add('socials', $data);




                $message="";
                if($result)
                {
                    $message = "ok";
                }else{

                    $message = "nokay";
                }


                //load view with data
                $data['message'] = $message;
                view("social/add-social-view" , $data);


            }

            break;



        case 'edit':

            if (!get('id')) {
                header("location:socialsController.php?action=list");
                die();

            }


            $social = fetchSingle('socials' , "id = " . get('id'));


            if ($social === false) {
                header("location:socialsController.php?action=list");
                die();

            }

            $data =  [
                "social" => $social

            ];



            view("social/add-social-view" , $data);


            break;


        case 'update':

            if(post('edit-social' , true)) {

                $data = [
                    "title" => $_POST['title'],
                    "icon"=> $_POST['icon'],
                    "link"=> $_POST['link']

                ];



                $result = update('socials',$data , post('id'));



                if($result)
                {
                    $message = 'ok';
                }else{
                    $message = 'nokay';
                }




                $social = fetchSingle('socials' , "id = " . post('id'));



                if ($social === false) {
                    header("location:socialsController.php?action=list");
                    die();

                }


                $data = [
                    'social' => $social,
                    'message' => $message

                ];


                view("social/add-social-view" , $data);


            }



            break;


    }

}












