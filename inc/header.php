<?php

  include_once  "/xampp/htdocs/bizconphp"."/inc/constants.php";
  if(isset($_SESSION) AND !empty($_SESSION))
  {
    include_once PATHROOT . "admin/views/config/top-config-loader.php";
  }


?>
<!--::header part start::-->
<header class="main_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"> <img src="<?= SITEURL ?>assets/img/logo.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-end"
                         id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?= PAGECONTROLLER ?>pagesController.php?action=index">خانه </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= PAGECONTROLLER ?>pagesController.php?action=about">درباره</a>
                            </li>


                            <li class="nav-item">
                                    <a class="dropdown-item" href="<?= PAGECONTROLLER ?>pagesController.php?action=blog">بلاگ</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    صفحه
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?= PAGECONTROLLER ?>pagesController.php?action=project">پروژه</a>
                                    <a class="dropdown-item" href="<?= PAGECONTROLLER ?>pagesController.php?action=service">سرویس ها</a>
                                    <a class="dropdown-item" href="<?= PAGECONTROLLER ?>pagesController.php?action=elements">المان ها</a>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="<?= PAGECONTROLLER ?>pagesController.php?action=contact">تماس</a>
                            </li>


                            <?php

                            if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {

                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="<?=PAGECONTROLLER?>usersController.php?action=dashboard">
                                            ورود به پنل <?=  $_SESSION['name'] . " " . $_SESSION['lastName']; ?></a>
                                        <a class="dropdown-item" href="<?=PAGECONTROLLER?>usersController.php?action=logout">خروج</a>
                                    </div>
                                </li>
                                <?php
                            }else if(!isset($_SESSION['id']) OR empty($_SESSION['id'])) {
                                ?>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#signup" data-toggle="modal"
                                       data-target=".bs-modal-sm">ثبت نام/ورود</a>
                                </li>
                                <?php
                            }
                            ?>


                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->