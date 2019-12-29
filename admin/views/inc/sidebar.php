<?php
include_once PATHROOT . "admin/views/config/top-config-loader.php";
?>
<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        تیم خلاق
                    </a>
                </div>
                <ul class="nav">

                        <li class="nav-item active">
                            <a class="nav-link"
                               href="<?= SITEURL . CONTROLLERS ?>usersController.php?action=dashboard">
                                <i class="nc-icon nc-chart-pie-35"></i>
                                <p>داشبورد</p>
                            </a>
                        </li>


                       <li>
                            <a class="nav-link" href="<?= SITEURL . CONTROLLERS ?>postsController.php?action=list">
                                 <i class="nc-icon nc-single-copy-04"></i>
                                 <p>مطالب</p>
                           </a>
                       </li>



                      <li>
                          <a class="nav-link" href="<?= SITEURL . CONTROLLERS ?>commentsController.php?action=list">
                              <i class="nc-icon nc-notes"></i>
                            <p>نظرات</p>
                          </a>
                      </li>


                        <li>
                            <a class="nav-link" href="<?= SITEURL . CONTROLLERS ?>usersController.php?action=setting">
                                <i class="nc-icon nc-settings-gear-64"></i>
                                <p>تنظیمات</p>
                            </a>
                        </li>




                      <?php
                            if(session('rol') == 'A') {
                        ?>



                        <li>
                            <a class="nav-link" href="<?= SITEURL . CONTROLLERS ?>projectsController.php?action=list">
                                <i class="nc-icon nc-single-copy-04"></i>
                                <p>لیست پروژه ها</p>
                            </a>
                        </li>

                        <li>
                            <a class="nav-link" href="<?= SITEURL . CONTROLLERS ?>categoriesController.php?action=list">
                                <i class="nc-icon nc-bullet-list-67"></i>
                                <p>لیست دسته بندی ها</p>
                            </a>
                        </li>

                      <li>
                           <a class="nav-link" href="<?= SITEURL . CONTROLLERS ?>tagsController.php?action=list">
                               <i class="nc-icon nc-attach-87"></i>
                               <p>لیست تگ ها</p>
                           </a>
                      </li>


                        <li>
                            <a class="nav-link" href="<?= SITEURL . CONTROLLERS ?>customersController.php?action=list">
                                <i class="nc-icon nc-badge"></i>
                                <p>لیست نظرات مشتریان</p>
                            </a>
                        </li>


                        <li>
                            <a class="nav-link" href="<?= SITEURL . CONTROLLERS ?>socialsController.php?action=list">
                                <i class="nc-icon nc-apple"></i>
                                <p>لیست شبکه های اجتماعی</p>
                            </a>
                        </li>

                        <li>
                            <a class="nav-link" href="<?= SITEURL . CONTROLLERS ?>metadataController.php?action=list">
                                <i class="nc-icon nc-credit-card"></i>
                                <p>لیست متفرقه</p>
                            </a>
                        </li>



                        <li>
                            <a class="nav-link" href="<?= SITEURL . CONTROLLERS ?>usersController.php?action=list">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>لیست کاربران سایت </p>
                            </a>
                        </li>





                        <?php
                    }
                    ?>

                </ul>
            </div>
        </div>