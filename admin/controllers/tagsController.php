<?php
include_once "baseController.php";
include_once MODELROOT . "tagModel.php";


$rol = ['A'];
checkLogin($rol);


if(get('action'))
{
    switch (get('action')){

        case 'list':


            $tags = lists('tags');
            $data['tag'] = $tags;
            view("tag/list" , $data);

            break;


        case 'delete':


            delete('tags',"id = " . get('id'));
            $tags = lists('tags');
            $data['tag'] = $tags;
            view("tag/list" , $data);

            break;


        case 'add':

            //load view
            view("tag/add");

            break;

        case 'save':



            if(post('add-tag' , true))
            {



                $data = [
                    "subject" => $_POST['title'],
                ];



                $result = add('tags',$data);

                $message="";
                if($result)
                {
                    $message = "ok";
                }else{

                    $message = "nokay";
                }


                //load view with data
                $data['message'] = $message;
                view("tag/add" , $data);


            }

            break;



        case 'edit':

            if (!get('id')) {
                header("location:tagsController.php?action=list");
                die();

            }


            $tags = fetchSingle('tags',"id = " . get('id'));


            if ($tags === false) {
                header("location:tagsController.php?action=list");
                die();

            }

            $data =  [
                "tag" => $tags
            ];
            //load view
            view("tag/add" , $data);


            break;


        case 'update':

            if(post('edit-tag' , true)) {

                $data = [
                    "subject" => $_POST['title']

                ];





                $result = update('tags',$data , post('id'));




                if($result)
                {
                    $message = 'ok';
                }else{
                    $message = 'nokay';
                }




                $tags = fetchSingle('tags',"id = " . post('id'));

                if ($tags === false) {
                    header("location:tagsController.php?action=list");
                    die();

                }


                $data = [
                    'tag' => $tags,
                    'message' => $message
                ];
                view("tag/add" , $data);

            }



            break;


    }

}












