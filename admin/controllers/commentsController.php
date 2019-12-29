<?php
include_once "baseController.php";
include_once MODELROOT . "commentModel.php";



$rol = ['A' ,'U' ];
checkLogin($rol);

if(get('action'))
{
    switch (get('action')){

        case 'list':


            if(session('rol') == 'A') {

                $comments = CommentDetail();

            }else if (session('rol') == 'U') {


                $comments = CommentDetail('comments.user_id = '.$_SESSION['id']);
            }

            $data['comment'] = $comments;
            view("comment/list", $data);

            break;



        case 'delete':


            delete('comments' , "id = " . get('id'));

            if(session('rol') == 'A') {

                $comments = CommentDetail();

            }else if (session('rol') == 'U')
            {
                $comments = CommentDetail('comments.user_id = '.$_SESSION['id']);
            }
            $data['comment'] = $comments;
            view("comment/list" , $data);

            break;


        case 'add':


            if(post('add-comment' , true))
            {

                $Myid = $_POST['id'];
                $data = [
                    "comment" => $_POST['comment'],
                    "user_id" => $_SESSION['id'],
                    "post_id" => $Myid

                ];

                if(session('rol') == 'A')
                {
                    $data['confirm'] = '2';
                }


                $result = add('comments', $data);


               /* $message="";
                if($result)
                {
                    $message = "ok";
                }else{

                    $message = "nokay";
                }

                $data['message'] = $message;
               */

                header("location:". PAGECONTROLLER."pagesController.php?action=single-post&id=".$Myid);
                die();
            }

            break;


        case 'edit':

            if (!get('id')) {
                header("location:commentsController.php?action=list");
                die();

            }

            $comments = fetchSingle( "comments","id = " . get('id'));
            if ($comments === false) {
                header("location:commentsController.php?action=list");
                die();

            }

            $data =  [
                "comment" => $comments

            ];

            view("comment/add" , $data);

            break;




        case 'update':

            if(post('edit-comment' , true)) {

                $data = [
                    "comment" => $_POST['comment']
                ];

                if(session('rol') == 'A')
                {
                    $data['confirm'] = '2';

                }else if (session('rol') == 'U')
                {
                    $data['confirm'] = '0';
                }

                $result = update('comments',$data , post('id'));


                if($result)
                {
                    $message = 'ok';
                }else{
                    $message = 'nokay';
                }


                $comments = fetchSingle('comments' , "id = " . post('id'));

                if ($comments === false) {
                    header("location:commentsController.php?action=list");
                    die();

                }


                $data = [
                    'comment' => $comments,
                    'message' => $message
                ];

                view("comment/add" , $data);
            }

            break;


        case 'confirm':

            $data['confirm'] = '1';
            update('comments',$data , get('id'));
            $comments = CommentDetail();
            $data = [
                'comment' => $comments
            ];
            view("comment/list" , $data);
            break;


    }

}












