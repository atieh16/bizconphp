<?php
include_once "baseController.php";
include_once MODELROOT . "projectModel.php";

$rol = ['A'];
checkLogin($rol);

if(get('action'))
{
    switch (get('action')){

        case 'list':


            $projects = lists('projects');
            $data['project'] = $projects;
            view("project/project-list-view" , $data);

            break;


        case 'delete':


            delete('projects',  "id = " . get('id'));
            $projects = lists('projects');
            $data['project'] = $projects;
            view("project/project-list-view" , $data);

            break;


        case 'add':

            //load view
            view("project/add-project-view");

            break;

        case 'save':



            if(post('add-project' , true))
            {



               $data = [
                       "title" => $_POST['title'],
                       "employer"=> $_POST['employer'],
                       "description"=> $_POST['description'],
                       "finish_date"=> $_POST['date']
               ];



                $target_dir = PATHROOT ."uploads/";
                $fileName = $_FILES['pic']['name'];



                $fileName = pathinfo($fileName , PATHINFO_FILENAME) .time(). "." .pathinfo($fileName ,   PATHINFO_EXTENSION);
                $fullPath = $target_dir . $fileName;





                if (!move_uploaded_file($_FILES['pic']['tmp_name'], $fullPath)) {
                    die("something wrong");
                }


                 $data['image'] = $fileName;

                 $result = add('projects' , $data);

                $message="";
                if($result)
                {
                    $message = "ok";
                }else{

                    $message = "nokay";
                }


                //load view with data
                $data['message'] = $message;
                view("project/add-project-view" , $data);


            }

            break;



        case 'edit':

            if (!get('id')) {
                header("location:projectsController.php?action=list");
                die();

            }


            $project = fetchSingle('projects',"id = " . get('id'));


            if ($project === false) {
                header("location:projectsController.php?action=list");
                die();

            }

            $data =  [
                "project" => $project
            ];
            //load view
            view("project/add-project-view" , $data);


            break;


        case 'update':

            if(post('edit-project' , true)) {

                $data = [
                    "title" => $_POST['title'] ,
                    "employer" => $_POST['employer'],
                    "description" => $_POST['description'],
                    "finish_date" => $_POST['date']
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



                $result = update('projects', $data , post('id'));




                if($result)
                {
                    $message = 'ok';
                }else{
                    $message = 'nokay';
                }





                  $project = fetchSingle('projects',"id =" . post('id'));


                if ($project === false) {
                    header("location:projectsController.php?action=list");
                    die();

                }


                $data = [
                    'project' => $project,
                    'message' => $message
                ];
                view("project/add-project-view" , $data);

            }



            break;


    }

}












