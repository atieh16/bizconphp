<?php

include_once  "/xampp/htdocs/bizconphp"."/inc/constants.php";
include_once PATHROOT .  "inc/head.php";
include_once PATHROOT .  "inc/header.php";


?>

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>جزئیات پروژه ها</h2>
                            <p>خانه<span>-</span>جزئیات پروژه ها</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- project_details part start -->
    <section class="project_details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="project_details_img">

                        <img src="<?= UPLOADURL . $data['project']['image']; ?>" alt="single_project">
                    </div>
                </div>
                <div class="col-lg-7 col-sm-8">
                    <div class="project_details_content">
                        <h3><?=$data['project']['title'];?></h3>
                        <p><?=$data['project']['description'];?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4">
                    <div class="project_details_widget">
                        <div class="single_project_details_widget">

                            <h5>تاریخ شروع پروژه:
                              <br><?=$data['project']['date'];?></h5>

                            <br>

                            <p>نام کارفرما: <?= $data['project']['employer'];?></p>

                            <br>

                            <h6>تاریخ پایان پروژه:
                               <br> <?=$data['project']['finish_date'];?></h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project_details part end -->

    <!-- blog_part start-->
    <section class="blog_part section_padding single_padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
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


                                    <a href="<?= PAGECONTROLLER ?>pagesController.php?action=blog"><?= $tag['subject'] . "/" ?></a>

                                    <?php
                                }
                            }
                        }
                                    ?>

                                         <span><?= $post['date']; ?></span>
                                        <a href="<?= PAGECONTROLLER ?>pagesController.php?action=blog">
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
    <!-- blog_part start-->
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