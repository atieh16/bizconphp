<?php
include_once  "/xampp/htdocs/bizconphp"."/inc/constants.php";
include_once PATHROOT . "admin/controllers/baseController.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>پنل مدیریت سایت</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="<?= ADMINASSETS;   ?>css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= ADMINASSETS;   ?>css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <link href="<?= ADMINASSETS;   ?>css/style.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->



    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <!-- select2 categories choose  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />


    <!-- tag input -->
    <link href="<?= ADMINASSETS;   ?>css/typeahead.css" rel="stylesheet" />
    <link href="<?= ADMINASSETS;   ?>css/bootstrap-tagsinput.css" rel="stylesheet" />



    <script src="<?= ADMINASSETS;   ?>js/core/jquery.3.2.1.min.js" type="text/javascript"></script>

    <!-- tinymce-->

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>

    <style>
        .special
        {
            display: inline-block;
        }
        button.special
        {
            float: left;
            margin-left: 49%;
            padding: 2px 6px;
            font-size: 14px;

        }
    </style>

</head>
<body>
    <div class="wrapper">