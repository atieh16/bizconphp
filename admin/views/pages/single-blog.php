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
                            <h2>برگزیده های بلاگ</h2>
                            <p>خانه<span>-</span>برگزیده های بلاگ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">

                     <img  style="width: 100%;height: 100%" class="img-fluid" src="<?= UPLOADURL . $data['posts']['image'];?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?= $data['posts']['title'];?>
                     </h2>
                     <ul class=" mt-3 mb-4">
                         <a class="disable">برچسب ها : </a>
                         <?php
                         if(!empty($data['tags']) AND $data['tags'])
                             foreach ($data['tags'] AS $tag){
                         ?>

                        <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=tag-post&id=<?= $tag['Mytag'] ?>#"><i class="far fa-user"></i><?=$tag['subject']." /";?> </a>
                         <?php
                         }
                         $i = 0;
                         if(!empty($data['comment']) AND $data['comment']) {
                             foreach ($data['comment'] AS $comment) {
                                 $i++;
                             }
                         }
                         ?>
                        <li><a class="disable">تعداد نظرات : </a><a href="#"><i class="far fa-comments"></i><?=$i;?></a></li>

                     </ul>
                     <p class="excert">
                      <?= $data['posts']['content'];?>
                     </p>
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">

                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="far fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                     </ul>
                  </div>
                  <div class="navigation-area">
                     <div class="row">
                         <?php
                         $i = 0;
                         if(!empty($data['tpost']) AND $data['tpost']) {
                             foreach ($data['tpost'] AS $tpost) {
                                 $i++;
                                 if ($i == 3) break;

                                 ?>


                                 <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">

                                     <div class="thumb">
                                         <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $tpost['id'] ?>">
                                             <img  class="img-fluid" src="<?= UPLOADURL . $tpost['image']; ?>" alt="">
                                         </a>
                                     </div>
                                     <div class="arrow">
                                         <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $tpost['id'] ?>">
                                             <span class="lnr text-white ti-arrow-left"></span>
                                         </a>
                                     </div>
                                     <div class="detials">
                                         <?php
                                         if ($i == 1) {
                                             ?>
                                             <p>پست قبلی</p>
                                             <?php
                                         } else if ($i == 2) {
                                             ?>
                                             <p>پست بعدی</p>
                                             <?php
                                         }
                                         ?>
                                         <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $tpost['id'] ?>">
                                             <h4><?= $tpost['title']; ?></h4>
                                         </a>
                                     </div>
                                 </div>

                                 <?php
                             }
                         }
                         ?>
                     </div>
                  </div>
               </div>
               <div class="blog-author">
                  <div class="media align-items-center">
                 <?php
                     if(!empty($data['user']) AND $data['user']) {
                      foreach ($data['user'] AS $user)
                   ?>

                     <img src="<?= UPLOADURL . $user['Myimage']; ?>" alt="">
                     <div class="media-body">

                              <a href="#">
                                  <h4><?=$user['name']." ".$user['last_name'];?></h4>
                              </a>
                              <p><?=$user['description'];?></p>

                     </div>
                         <?php
                     }
                 ?>
                  </div>
               </div>
               <div class="comments-area">

                 <?php
                    if(isset($data['comment']) AND $data['comment'])
                      foreach ($data['comment'] AS $comment) {
                          if ($comment['confirm'] == 1 OR $comment['confirm'] == 2) {
                              ?>
                              <div class="comment-list">
                                  <div class="single-comment justify-content-between d-flex">
                                      <div class="user justify-content-between d-flex">
                              <?php
                              if(!empty($data['totaluser']) AND $data['totaluser']) {
                                  foreach ($data['totaluser'] as $totaluser) {
                                      if ($totaluser['id'] == $comment['user_id']) {

                                          ?>
                                          <div class="thumb">
                                              <img src=" <?= UPLOADURL . $totaluser['image']; ?>" alt="">
                                          </div>
                                          <div class="desc">
                                              <p class="comment">
                                                  <?= $comment['comment']; ?>
                                              </p>
                                              <div class="d-flex justify-content-between">
                                                  <div class="d-flex align-items-center">
                                                      <h5>
                                                       <a href="#"><?= $totaluser['name'] . " " . $totaluser['last_name']; ?></a>
                                                      </h5>
                                                      <p class="date"><?= $comment['date'] ?></p>
                                                  </div>
                                                  <div class="reply-btn">
                                                      <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                                                  </div>
                                              </div>
                                              <?php
                                              }
                                              }
                                              }
                                              ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <?php
                          }
                      }
                          ?>
               </div>


               <div class="comment-form">
                  <h4>پاسخ بگذارید</h4>
                  <form class="form-contact comment_form"  method="post" action="<?=PAGECONTROLLER?>commentsController.php?action=add" id="commentForm">
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="نوشتن نظر"></textarea>
                           </div>
                        </div>


                         <input type="hidden" name="id" value="<?=$data['posts']['id']?>">


                     </div>
                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1" name="add-comment">ارسال پیام</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">

                      <?php
                      if(isset($data['message'])){
                          $message = $data['message'];

                          switch ($message) {
                              case 'nokay':
                                  $message = "خطایی رخ داده است";
                                  $class = "text-danger";
                                  break;

                              default:
                                  break;
                          }
                          echo "<h4 class='{$class}' >{$message}</h4>";
                      }
                      ?>

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
                                     <a href="<?= PAGECONTROLLER ?>pagesController.php?action=cat-blog&id=<?= $category['id'] ?> " class="d-flex">
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
                      if(isset($data['tpost']) and $data['tpost'])
                          foreach ($data['tpost'] as $tpost) {
                              ?>

                              <div class="media post_item">
                                  <img  style="height: 50px;width: 50px" src="<?= UPLOADURL . $tpost['image']; ?>" alt="post">
                                  <div class="media-body">
                                      <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $tpost['id'] ?>">
                                          <h3><?= $tpost['title']; ?></h3>
                                      </a>
                                      <p><?= $tpost['date'] ?></p>
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
                                     <a href="<?= PAGECONTROLLER ?>pagesController.php?action=tag-post&id=<?= $totaltag['id'] ?>">
                                         <?= $totaltag['subject']; ?>
                                     </a>
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
                            if(isset($data['tpost']) and $data['tpost'])
                                foreach ($data['tpost'] as $tpost) {
                                    ?>
                                    <li>
                                        <a href="<?= SITEURL . CONTROLLERS; ?>pagesController.php?action=single-post&id=<?= $tpost['id'] ?>">
                                            <img class="img-fluid" style="height: 80px;width: 85px;border-radius: 50px" src="<?= UPLOADURL . $tpost['image']; ?>" alt="">
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
                        <button class="button rounded-0 primary-bg text-white w-100 btn_4" type="submit">تایید</button>
                     </form>
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================Blog Area end =================-->

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