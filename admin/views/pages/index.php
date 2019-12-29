<?php

include_once  "/xampp/htdocs/bizconphp"."/inc/constants.php";
include PATHROOT . "inc/head.php";

  if(isset($_SESSION) AND !empty($_SESSION))
  {
      include_once PATHROOT . "admin/views/config/top-config-loader.php";
  }

?>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-xl-8">
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
                                <li class="nav-item ">


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
                       </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>با هدف نوآوری<br>در کسب و کار <br>هدایت می شود.</h1>
                            <p>یگانه فردی که سرنوشت از شما خواهد ساخت همانی است که خودتان تصمیم میگیرید باشید.</p>
                            <a href="#" class="btn_1">بیشتر بدانید</a>
                            <a href="https://www.youtube.com/watch?v=pBFQdxA-apI" class="popup-youtube video_popup">
                                <span><img src="<?= SITEURL ?>assets/img/icon/play.svg" alt=""></span>ویدیوی مقدمه</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-app-1 custom-animation"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_1.png" alt=""></div>
        <div class="hero-app-2 custom-animation2"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_2.png" alt=""></div>
        <div class="hero-app-5 custom-animation4"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_5.png" alt=""></div>
        <div class="hero-app-7 custom-animation2"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_7.png" alt=""></div>
        <div class="hero-app-8 custom-animation"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_8.png" alt=""></div>
    </section>
    <!-- banner part start-->

    <!-- about part start-->
    <section class="about_part">
        <div class="container">
            <div class="row align-items-center justify-content-end">
                <div class="col-md-6 col-lg-6 col-xl-5">
                    <div class="about_img">
                        <img src="<?= $data['option']['meta']; ?>" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 offset-xl-1 col-xl-6">
                    <div class="about_text">
                        <h2>ما دارای ۲۴ سال تجربه در مشاوره <br>هستیم</h2>
                        <h4>ما اغلب در ذهن رنج می بریم تا در واقعیت</h4>
                        <a href="#" class="btn_2">بیشتر بخوانید</a>
                        <p><?= $data['option']['value'];?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-app-7 custom-animation"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_1.png" alt=""></div>
        <div class="hero-app-8 custom-animation2"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_2.png" alt=""></div>
        <div class="hero-app-6 custom-animation3"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_3.png" alt=""></div>
    </section>
    <!-- about part start-->

    <!-- service_part start-->
    <section class="service_part section_padding gray_bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-8 col-xl-4">
                    <div class="single_service_text">
                        <h2>ما برای شما بهترین سرویس ها را فراهم میکنیم</h2>
                        <p>تنها کاری که باید انجام دهیم این است که درک کنیم همه مان بنا به دلیلی به این جهان آمده ایم که باید نسبت به آن
                            خود را متعهد کنیم آن گاه است که میتوانیم بر رنج های کوچک و بزرگ خود بخندیم و بدون ترس
                            پیش برویم.</p>
                        <a href="#" class="btn_2">بارگذاری بیشتر</a>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_service_part">
                        <span class="single_service_icon"><i class="flaticon-growth"></i></span>
                        <h4>فرصت شغلی</h4>
                        <p>تمرکز و فقط پرداختن به یک کار از الزامات مهم دستیابی به موفقیت های بزرگ است
                        توانایی شما برای تمرکز قاطعانه الزام شماره یک برای موفقیت است</p>
                        <a href="#" class="btn_3">بیشتر بدانید <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="single_service_part single_service_part_2">
                        <span class="single_service_icon style_icon"><i class="flaticon-wallet"></i></span>
                        <h4>رویکرد تجاری</h4>
                        <p>تمرکز و فقط پرداختن به یک کار از الزامات مهم دستیابی به موفقیت های بزرگ است
                            توانایی شما برای تمرکز قاطعانه الزام شماره یک برای موفقیت است</p>
                        <a href="#" class="btn_3 service_btn">بیشتر بدانید<i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!--::review_part start::-->
    <section class="review_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <h2>مشتریان می گویند</h2>
                        <p>نظرات خود را با ما به اشتراک بگذارید</p>
                    </div>
                </div>
            </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-xl-5">
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <?php
                                    if(isset($data['customer']) and $data['customer'])
                                        foreach ($data['customer'] as $customer) {
                                            ?>

                                            <div class="slider-thumbnails">
                                                <img  style="height: 150px; width: 150px;" src="<?= UPLOADURL . $customer['image']; ?>" alt="slideimg"
                                                     class="image">
                                            </div>

                                            <?php
                                        }
                                            ?>
                                </div>

                            </div>

                            <div class="col-lg-10">
                                <!-- MAIN SLIDES -->
                                <div class="slider">
                                  <?php
                                    if(isset($data['customer']) and $data['customer'])
                                       foreach ($data['customer'] as $customer) {
                                           ?>
                                           <div data-index="<?= $customer['id']; ?>">
                                               <div class="client_review_text text-center">
                                                   <img src="<?= SITEURL ?>assets/img/icon/quate.svg" class="quate_icon"
                                                        alt="quate">
                                                   <p><?= $customer['description']; ?></p>
                                                   <h3><?= $customer['full_name']; ?></h3>
                                                   <h5><?= $customer['job']; ?></h5>
                                               </div>
                                           </div>
                                           <?php
                                       }
                                           ?>

                                </div>
                            </div>
                        </div>
            <div class="hero-app-7 custom-animation4"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_4.png" alt=""></div>
            <div class="hero-app-3 custom-animation2"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_8.png" alt=""></div>
            <div class="hero-app-8 custom-animation"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_3.png" alt=""></div>
        </div>
    </section>

    <!--::blog_part end::-->

    <!-- portfolio_part start-->
    <section class="portfolio_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-columns">
                        <div class="card">
                            <blockquote class="blockquote mb-0">
                                <h2>بهترین مکان تمرین ما را جستجو کنید</h2>
                                <p>برای اموختن تنها یک روش وجود دارد و آن هم عمل کردن است</p>
                            </blockquote>
                        </div>
                        <?php
                        if(isset($data['project']) AND $data['project'])
                            foreach ($data['project'] AS $project) {
                                ?>
                                <div class="card">
                                    <img src="<?= UPLOADURL . $project['image']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="<?= SITEURL . CONTROLLERS;  ?>pagesController.php?action=single-project&id=<?= $project['id'] ?>">
                                            <h5 class="card-title"><?= $project['title']; ?></h5>
                                        </a>
                                        <p class="card-text"><?= $project['description']; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio_part part end-->

    <!-- our_service_part part start-->
    <section class="about_part our_service_part padding_top">
        <div class="container">
            <div class="row align-items-center justify-content-end">
                <div class="col-md-6 col-xl-5">
                    <div class="about_img">
                        <img src="<?= $data['optionS']['meta'];?>" alt="">
                    </div>
                </div>
                <div class="col-md-6 offset-xl-1 col-xl-6">
                    <div class="about_text">
                        <h2>ما خدمات مشاوره با کیفیت بالا را ارائه میکنیم</h2>
                        <h4>ما اغلب در ذهن رنج میبریم تا در واقعیت</h4>
                        <p><?= $data['optionS']['value'];?></p>
                        <a href="#" class="btn_2">بیشتر بخوانید</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-app-1 custom-animation"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_1.png" alt=""></div>
        <div class="hero-app-4 custom-animation2"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_8.png" alt=""></div>
        <div class="hero-app-8 custom-animation3"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_9.png" alt=""></div>
    </section>
    <!--::blog_part start::-->


    <!--::blog_part start::-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section_tittle text-center">
                        <h2>بروز رسانی بلاگ</h2>
                        <p>برای موفقیت ابتدا ما باید باور کنیم که میتوانیم </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                 $i = 0;
                 if(isset($data['post']) AND $data['post'])
                        foreach ($data['post'] AS $post) {
                            if($i == 3) break;
                            $i++;
                            ?>


                            <div class="col-sm-6 col-lg-4 col-xl-4">
                                <div class="single-home-blog">
                                    <div class="card">
                                        <img  src="<?= UPLOADURL . $post['image']; ?>"
                                             class="card-img-top" alt="blog">
                                        <div class="card-body">
                                      <?php

                                          if(!empty($data['tags']) AND $data['tags']) {
                                              foreach ($data['tags'] as $tag) {
                                                  if ($tag['post_id'] == $post['id']) {

                                                      ?>


                                                      <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=tag-post&id=<?= $tag['Mytag'] ?>"><?= $tag['subject'] . "/" ?></a>

                                                      <?php
                                                  }
                                              }
                                          }
                                                      ?>

                                             <span><?= $post['date']; ?></span>
                                            <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $post['id'] ?>">
                                                <h5 class="card-title"><?= $post['title']; ?></h5>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                    }
                        ?>

            </div>
        </div>
    </section>
    <!--::blog_part end::-->

    <!-- footer part start-->
    <section class="footer-area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                    <h4>محصولات برتر</h4>
                    <ul>
                        <li><a href="#">وب سایت مدیریت شده</a></li>
                        <li><a href="#">مدیریت اعتبار</a></li>
                        <li><a href="#">قدرت ابزار</a></li>
                        <li><a href="#">خدمات بازاریابی</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                    <h4>لینک های سریع</h4>
                    <ul>
                        <li><a href="#">شغل ها</a></li>
                        <li><a href="#">دارایی برند</a></li>
                        <li><a href="#">روابط سرمایه گذار</a></li>
                        <li><a href="#">شرایط استفاده از خدمات</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                    <h4>امکانات</h4>
                    <ul>
                        <li><a href="#">شغل ها</a></li>
                        <li><a href="#">دارایی برند</a></li>
                        <li><a href="#">روابط سرمایه گذار</a></li>
                        <li><a href="#">شرایط استفاده از خدمات</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                    <h4>منابع</h4>
                    <ul>
                        <li><a href="#">راهنماها</a></li>
                        <li><a href="#">پژوهش</a></li>
                        <li><a href="#">کارشناسان</a></li>
                        <li><a href="#">آژانس ها</a></li>
                    </ul>
                </div>
                <div class="col-xl-4 col-sm-8 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                    <h4>خبرنامه</h4>
                    <p>شما می توانید به ما اعتماد کنید ما فقط پیشنهادات تبلیغاتی ارسال می کنیم</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank"
                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                            method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="آدرس ایمیل شما"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'آدرس ایمیل شما '"
                                required="" type="email">
                            <button class="click-btn btn btn-default text-uppercase btn_2">تایید</button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php

  include PATHROOT . "inc/footer.php";

 ?>