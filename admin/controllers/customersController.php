<?php
include_once "baseController.php";
include_once MODELROOT . "customerModel.php";

$rol = ['A'];
checkLogin($rol);

if(get('action'))
{
    switch (get('action')){

        case 'list':


            $customer = lists('customer-opinions');
            $data['customer'] = $customer;
            view("customer/customer-list-view" , $data);

            break;


        case 'delete':


            delete('customer-opinions' , "id = " . get('id'));

            $customer = lists('customer-opinions');
            $data['customer'] = $customer;
            view("customer/customer-list-view" , $data);

            break;


        case 'add':

            view("customer/add-customer-view");

            break;

        case 'save':



            if(post('add-cust' , true))
            {



                $data = [
                    "full_name" => $_POST['full_name'],
                    "job"=> $_POST['job'],
                    "description"=> $_POST['description']

                ];



                $target_dir = PATHROOT ."uploads/";
                $fileName = $_FILES['pic']['name'];
                $fileName = pathinfo($fileName , PATHINFO_FILENAME) .time(). "." .pathinfo($fileName ,   PATHINFO_EXTENSION);
                $fullPath = $target_dir . $fileName;





                if (!move_uploaded_file($_FILES['pic']['tmp_name'], $fullPath)) {
                    die("something wrong");
                }


                $data['image'] = $fileName;

                $result = add('customer-opinions', $data);





                $message="";
                if($result)
                {
                    $message = "ok";
                }else{

                    $message = "nokay";
                }



                $data['message'] = $message;
                view("customer/add-customer-view" , $data);


            }

            break;



        case 'edit':

            if (!get('id')) {
                header("location:customersController.php?action=list");
                die();

            }


            $customer = fetchSingle('customer-opinions' , "id = " . get('id'));


            if ($customer === false) {
                header("location:customersController.php?action=list");
                die();

            }

            $data =  [
                "customer" => $customer

            ];



            view("customer/add-customer-view" , $data);


            break;


        case 'update':

            if(post('edit-cust' , true)) {

                $data = [
                    "full_name" => $_POST['full_name'],
                    "job"=> $_POST['job'],
                    "description"=> $_POST['description']

                ];



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



                $result = update('customer-opinions',$data , post('id'));



                if($result)
                {
                    $message = 'ok';
                }else{
                    $message = 'nokay';
                }




                $customer = fetchSingle('customer-opinions' , "id = " . post('id'));



                if ($customer === false) {
                    header("location:customersController.php?action=list");
                    die();

                }


                $data = [
                    'customer' => $customer,
                    'message' => $message
                ];


                view("customer/add-customer-view" , $data);


            }



            break;


    }

}












