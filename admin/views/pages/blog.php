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
                            <h2>بلاگ ما</h2>
                            <p>خانه<span>-</span>بلاگ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->


    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">

                        <?php
                        if(isset($data['message'])){
                            $message = $data['message'];

                            switch ($message) {
                                case 'nokay':

                                    $message = "نتیجه ای یافت نشد";
                                    $class = "text-danger";
                                    break;

                                default:
                                    break;
                            }
                            echo "<h4 style='text-align: center' class='{$class}' >{$message}</h4>";
                        }else{
                            echo "";
                        }

                        ?>


                        <?php
                      if(isset($data['searchMessage']) AND !empty($data['searchMessage'])) {
                          if (isset($data['posts']) AND $data['posts'])
                              foreach ($data['posts'] as $posts) {
                                  foreach ($posts as $post) {
                                      if ($post['confirm'] == 1 OR $post['confirm'] == 2) {

                                          ?>

                                          <article class="blog_item">
                                              <div class="blog_item_img">
                                                  <img class="card-img rounded-0"
                                                       src="<?= UPLOADURL . $post['image']; ?>" alt="">
                                                  <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $post['id'] ?>"
                                                     class="blog_item_date">
                                                      <h3><?= $post['date']; ?></h3>

                                                  </a>
                                              </div>

                                              <div class="blog_details">
                                                  <a class="d-inline-block"
                                                     href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $post['id'] ?>">
                                                      <h2><?= $post['title']; ?></h2>
                                                  </a>
                                                  <p><?= $post['content']; ?></p>
                                                  <ul class="">
                                                      <a class="disable">برچسب ها : </a>
                                                      <?php

                                                      if (!empty($data['tags']) AND $data['tags']) {
                                                          foreach ($data['tags'] as $tag) {
                                                              if ($tag['post_id'] == $post['id']) {

                                                                  ?>

                                                                  <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=tag-post&id=<?= $tag['Mytag'] ?>"><i
                                                                              class="far fa-user"></i><?= $tag['subject'] . "/" ?>
                                                                  </a>


                                                                  <?php
                                                              }
                                                          }
                                                      }


                                                      $i = 0;
                                                      if (isset($data['comments']) AND $data['comments'])
                                                          foreach ($data['comments'] as $comment) {
                                                              if ($comment['confirm'] == 2 OR $comment['confirm'] == 1) {
                                                                  if ($comment['post_id'] == $post['id']) {
                                                                      $i++;

                                                                  }
                                                              }
                                                          }

                                                      ?>

                                                      <li><a class="disable">تعداد نظرات : </a><a
                                                                  href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $post['id'] ?>"><i
                                                                      class="far fa-comments"></i><?= $i; ?></a></li>
                                                      <?php
                                                      if (isset($data['users']) AND $data['users']) {
                                                          foreach ($data['users'] AS $user) {
                                                              if ($user['id'] == $post['user_id']) {
                                                                  ?>

                                                                  <li><a class="disable">نویسنده : </a><a href="#"><i
                                                                                  class="far fa-comments"></i><?=
                                                                          $user['name'] . " " . $user['last_name']; ?>
                                                                      </a>
                                                                  </li>
                                                                  <?php
                                                              }
                                                          }
                                                      }
                                                      ?>

                                                  </ul>
                                              </div>
                                          </article>

                                          <?php

                                      }
                                  }
                              }
                      }else {
                          ?>

                          <?php

                          if (isset($data['posts']) AND $data['posts'])
                              foreach ($data['posts'] as $post) {
                                  if ($post['confirm'] == 1 OR $post['confirm'] == 2) {

                                      ?>

                                      <article class="blog_item">
                                          <div class="blog_item_img">
                                              <img class="card-img rounded-0"
                                                   src="<?= UPLOADURL . $post['image']; ?>" alt="">
                                              <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $post['id'] ?>"
                                                 class="blog_item_date">
                                                  <h3><?= $post['date']; ?></h3>

                                              </a>
                                          </div>

                                          <div class="blog_details">
                                              <a class="d-inline-block"
                                                 href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $post['id'] ?>">
                                                  <h2><?= $post['title']; ?></h2>
                                              </a>
                                              <p><?= $post['content']; ?></p>
                                              <ul class="">
                                                  <a class="disable">برچسب ها : </a>
                                                  <?php

                                                  if (!empty($data['tags']) AND $data['tags']) {
                                                      foreach ($data['tags'] as $tag) {
                                                          if ($tag['post_id'] == $post['id']) {

                                                              ?>

                                                              <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=tag-post&id=<?= $tag['Mytag'] ?>"><i
                                                                          class="far fa-user"></i><?= $tag['subject'] . "/" ?>
                                                              </a>


                                                              <?php
                                                          }
                                                      }
                                                  }


                                                  $i = 0;
                                                  if (isset($data['comments']) AND $data['comments'])
                                                      foreach ($data['comments'] as $comment) {
                                                          if ($comment['confirm'] == 2 OR $comment['confirm'] == 1) {
                                                              if ($comment['post_id'] == $post['id']) {
                                                                  $i++;

                                                              }
                                                          }
                                                      }

                                                  ?>

                                                  <li><a class="disable">تعداد نظرات : </a><a
                                                              href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $post['id'] ?>"><i
                                                                  class="far fa-comments"></i><?= $i; ?></a></li>
                                                  <?php
                                                  if (isset($data['users']) AND $data['users']) {
                                                      foreach ($data['users'] AS $user) {
                                                          if ($user['id'] == $post['user_id']) {
                                                              ?>

                                                              <li><a class="disable">نویسنده : </a><a href="#"><i
                                                                              class="far fa-comments"></i><?=
                                                                      $user['name'] . " " . $user['last_name']; ?></a>
                                                              </li>
                                                              <?php
                                                          }
                                                      }
                                                  }
                                                  ?>

                                              </ul>
                                          </div>
                                      </article>

                                      <?php

                                  }
                              }
                      }
                                   ?>


                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">۱</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">۲</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">


                            <form action="<?=PAGECONTROLLER?>pagesController.php?action=search" method="post">
                                <div class="form-group">
                                    <div class="input-group mb-3">

                                        <input name="search-text" type="text" class="form-control" placeholder='جستجوی کلمات کلیدی'
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'جستجوی کلمات کلیدی'">

                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>

                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_4"
                                        type="submit" name="search-button">جستجو</button>
                            </form>

                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">دسته بندی ها</h4>
                            <ul class="list cat-list">
                                 <?php

                                      if(!empty($data['categories']) AND $data['categories']) {
                                          foreach ($data['categories'] AS $key => $category) {
                                              $i = 0;
                                              foreach ($data['postcategories'] as $key => $catpost) {
                                                  if ($category['id'] == $catpost['cat_id']) {
                                                      $i++;
                                                  }
                                              }

                                              ?>

                                              <li>
                                                  <a href="<?= PAGECONTROLLER ?>pagesController.php?action=cat-blog&id=<?= $category['id'] ?> "
                                                     class="d-flex">
                                                      <p><?= $category['title']; ?></p>
                                                      <p>(<?= $i; ?>)</p>
                                                  </a>
                                              </li>
                                              <?php
                                          }
                                      }

                                             ?>

                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">پست های اخیر</h3>
                            <?php


                            if(isset($data['totalpost']) AND $data['totalpost'])
                            foreach ($data['totalpost'] as $postpic) {

                                ?>


                                <div class="media post_item">
                                    <img  style="width: 50px ; height: 50px;" src="<?= UPLOADURL . $postpic['image']; ?>" alt="post">
                                    <div class="media-body">
                                        <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $postpic['id'] ?>">
                                            <h3><?= $postpic['title']; ?></h3>
                                        </a>
                                        <p><?= $postpic['date']; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                                ?>
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">برچسب ها</h4>
                            <ul class="list">

                                <?php

                                  if(!empty($data['totaltag']) AND $data['totaltag'])
                                      foreach ($data['totaltag'] AS $key => $totaltag) {
                                          ?>
                                          <li>
                                              <a href="<?= PAGECONTROLLER ?>pagesController.php?action=tag-post&id=<?= $totaltag['id'] ?> "><?= $totaltag['subject']; ?></a>
                                          </li>


                                          <?php
                                      }
                                          ?>

                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">فاکتورهای اینستاگرام</h4>
                            <ul class="instagram_row flex-wrap">
                            <?php
                                if(isset($data['totalpost']) AND $data['totalpost'])
                                  foreach ($data['totalpost'] as $postpic) {
                                      ?>
                                      <li>
                                          <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $postpic['id'] ?>">
                                              <img class="img-fluid" style="height: 80px;width: 85px;border-radius: 50px" src="<?= UPLOADURL . $postpic['image'] ?>"
                                                   alt="">
                                          </a>
                                      </li>
                                      <?php
                                  }
                                      ?>

                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">خبرنامه</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'ایمیل را وارد کنید'" placeholder='ایمیل را وارد کنید' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_4"
                                        type="submit">تایید</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

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