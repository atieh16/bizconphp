<?php
include_once "baseController.php";
include_once MODELROOT . "metadataModel.php";


$rol = ['A'];
checkLogin($rol);

if(get('action'))
{
    switch (get('action')){

        case 'list':


            $metadata = lists('meta_datas');
            $data['metadata'] = $metadata;
            view("meta/list" , $data);

            break;


        case 'delete':


            delete('meta_datas' , "id = " . get('id'));

            $metadata = lists('meta_datas');
            $data['metadata'] = $metadata;
            view("meta/list" , $data);

            break;


        case 'add':

            view("meta/add");

            break;

        case 'save':



            if(post('add' , true))
            {



                $data = [
                    "klid" => $_POST['klid'],
                    "value"=> $_POST['value'],
                    "meta"=> $_POST['meta']

                ];





                $result = add('meta_datas', $data);



                $message="";
                if($result)
                {
                    $message = "ok";
                }else{

                    $message = "nokay";
                }



                $data['message'] = $message;
                view("meta/add" , $data);


            }

            break;



        case 'edit':

            if (!get('id')) {
                header("location:metadataController.php?action=list");
                die();

            }


            $metadata = fetchSingle('meta_datas' , "id = " . get('id'));


            if ($metadata === false) {
                header("location:metadataController.php?action=list");
                die();

            }

            $data =  [
                "metadata" => $metadata

            ];



            view("meta/add" , $data);


            break;


        case 'update':

            if(post('edit' , true)) {

                $data = [
                    "klid" => $_POST['klid'],
                    "value"=> $_POST['value'],
                    "meta"=> $_POST['meta']

                ];





                $result = update('meta_datas',$data , post('id'));



                if($result)
                {
                    $message = 'ok';
                }else{
                    $message = 'nokay';
                }




                $metadata = fetchSingle('meta_datas' , "id = " . post('id'));



                if ($metadata === false) {
                    header("location:metadataController.php?action=list");
                    die();

                }


                $data = [
                    'metadata' => $metadata,
                    'message' => $message,

                ];


                view("meta/add" , $data);


            }



            break;


    }

}












