<?php

   include_once  "/xampp/htdocs/bizconphp"."/inc/constants.php";
   include_once PATHROOT .  "inc/head.php";
   include_once PATHROOT .  "inc/header.php";

?>


    <!--::breadcrumb part start::-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>درباره ی ما</h2>
                            <p>خانه<span>-</span>درباره ی ما</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::breadcrumb part start::-->

    <!-- about part start-->
    <section class="about_part single_padding_top">
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
                        <p><?= $data['option']['value']; ?></p>
                        <a href="#" class="btn_2">بیشتر بخوانید</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-app-7 custom-animation"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_1.png" alt=""></div>
        <div class="hero-app-8 custom-animation2"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_2.png" alt=""></div>
        <div class="hero-app-6 custom-animation3"><img src="<?= SITEURL ?>assets/img/animate_icon/icon_3.png" alt=""></div>
    </section>
    <!-- about part start-->

    <!--::review_part start::-->
    <section class="review_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <h2>مشتریان می گویند</h2>
                        <p>نظرات خود را با ما به اشتراک بگذارید </p>
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
                            <img style="height: 150px; width: 150px;" src="<?= UPLOADURL . $customer['image']; ?>" alt="slideimg" class="image">
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
                                <img src="<?= SITEURL ?>assets/img/icon/quate.svg" class="quate_icon" alt="quate">
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

    <!-- our_service_part part start-->
    <section class="about_part our_service_part single_padding_top">
        <div class="container">
            <div class="row align-items-center justify-content-end">
                <div class="col-md-6 col-xl-5">
                    <div class="about_img">
                        <img src="<?= $data['optionS']['meta']; ?>" alt="">
                    </div>
                </div>
                <div class="col-md-6 offset-xl-1 col-xl-6">
                    <div class="about_text">
                        <h2>ما خدمات مشاوره با کیفیت بالا را ارائه میکنیم</h2>
                        <h4>ما اغلب در ذهن رنج میبریم تا در واقعیت</h4>
                        <p><?= $data['optionS']['value']; ?></p>
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

   include PATHROOT .  "inc/footer.php";

 ?>