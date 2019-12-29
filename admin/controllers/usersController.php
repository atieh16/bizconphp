<?php

include_once "baseController.php";
include_once MODELROOT . "userModel.php";



if(get('action'))
{
    switch (get('action')){

        case 'dashboard':

             $rol = ['A' ,'U' ];
             checkLogin($rol);
             view('user/dashboard');


            break;



        case 'list':

            $rol = ['A'];
            checkLogin($rol);
            $data = UsersList();
            view('userlist/list' , $data);

            break;


        case 'delete':

            $rol = ['A'];
            checkLogin($rol);
            delete('users', 'id ='.get('id'));
            $data = UsersList();
            view('userlist/list' , $data);



            break;



        case 'setting':

               $rol = ['A' ,'U' ];
               checkLogin($rol);
              $user = fetchSingle('users', "id = " . $_SESSION['id']);

              if ($user === false) {
                  header("location: usersController.php?action=dashboard");
                  die();

              }

              $data = [
                  "user" => $user
              ];

              view("user/setting", $data);


            break;


        case 'update-setting':

            $rol = ['A' ,'U' ];
            checkLogin($rol);

            if(post('setting_update' , true)) {


                $data = [
                    "name" => $_POST['name'],
                    "last_name" => $_POST['last_name'],
                    "description" => $_POST['description']
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




                if (((post('password') AND !post('re_password')) || (!post('password') AND post('re_password'))) || post('password') !== post('re_password')) {


                    $user = fetchSingle('users', "id = " . $_SESSION['id']);
                    $data = [
                        "user" => $user,
                        "message" => "nokay"
                    ];


                  view("user/setting", $data);



                } elseif (post('password') AND post('re_password') AND post('password') === post('re_password')) {
                    $data['password'] = md5(SALT . post('password'));

                }


                $result = update('users', $data, $_SESSION['id']);


                if ($result) {
                    $message = "okay";
                } else {
                    $message = "nokay";
                }


                $user = fetchSingle('users', "id = " . $_SESSION['id']);


                if ($user === false) {

                    header("location:usersController.php?action=setting");
                    die();

                }


                $data = [
                    "user" => $user,
                    "message" => $message
                ];


                view("user/setting", $data);

            }

            break;

        case 'login':


                $email = $_POST['email'];
                $password = $_POST['password'];
                $password = md5(SALT . $password);


                $result = fetchSingle('users', " email = '{$email}'");




                if ($result AND !empty($result)) {



                    if ($password == $result['password']) {



                        $_SESSION['id'] = $result['id'];
                        $_SESSION['name'] = $result['name'];
                        $_SESSION['lastName'] = $result['last_name'];
                        $_SESSION['rol'] = $result['role'];


                      //  header("Location: " . SITEURL . CONTROLLERS . "usersController.php?action=dashboard");
                        header("Location: " . SITEURL . CONTROLLERS . "pagesController.php?action=index");
                        die();

                    }

                }


           header("location: " . SITEURL . CONTROLLERS . "pagesController.php?action=index");

            break;

        case 'register':



            $data = [
                 "name" => $_POST['name'],
                 "last_name" => $_POST['last_name'],
                 "phone_number" => $_POST['phone_number'],
                 "email" => $_POST['email'],
                 "password" => md5(SALT . $_POST['password']),
                 "role" => "U",
                 "image" => "image29.jpg",

            ];


             $result = add('users',$data );


              if ($result)
              {
                  echo"ok";

              }else{

                  echo "nokay";
              }
              die();


            break;


        case 'logout':

                $_SESSION = [];
                header("location:http://localhost/bizconphp/index.php");
                die();


            break;

    }


}












