<?php
include VIEWROOT . "inc/head.php";
include VIEWROOT . "inc/sidebar.php";
include VIEWROOT . "inc/topbar.php";


 ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="col-md-5 pull-right">
                                <h4 class="card-title"> جدول با شناور</h4>
                                <p class="card-category">در اینجا یک زیرنویس برای این جدول است</p>
                            </div>



                               <!-- My form -->
                                <form method="post" action="<?=PAGECONTROLLER?>postsController.php?action=list" enctype="multipart/form-data">
                                    <div class="row special">
                                        <div class="col-md-2 pr-1">
                                            <div class="form-group">

                                                <select class="js-example-basic-single" name="cat[]">

                                                    <?php
                                                    if(isset($data['categories']) and $data['categories'])
                                                        foreach ($data['categories'] as $category) {
                                                            ?>
                                                            <option value="<?= $category['id']; ?>"
                                                            ><?= $category['title']; ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row special">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">

                                                <select class="js-example-basic-single" name="confirm[]" >

                                                    <option value="1">تایید شده</option>
                                                    <option value="0">تایید نشده</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" name="search" class="btn btn-info btn-fill pull-right special">
                                      جستجو
                                    </button>
                                    <div class="clearfix"></div>
                                </form>



                            <div class="pull-left col-md-5 text-left">
                                <a class="btn btn-primary" href="<?= SITEURL . CONTROLLERS ?>postsController.php?action=add"><i class="nc-icon nc-simple-add"></i> افزودن</a>
                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                   <thead>
                                   <th>عنوان</th>
                                   <th>توضیحات</th>
                                   <th>عکس</th>
                                   <th>تاریخ</th>
                          <?php
                          if(session('rol') == 'A') {
                                    ?>
                                    <th>نام نویسنده مطلب</th>
                                    <th>نام خانوادگی نویسنده مطلب</th>
                                    <th>تاییدیه</th>
                                    <?php
                         }
                                    ?>

                                </thead>
                                <tbody>

                                <?php


                                if(isset($data['post']) AND $data['post'] AND count($data['post'])>0)
                                    foreach ($data['post'] AS $post) {
                                        ?>
                                        <tr class="<?php

                                              if($post['confirm'] == 1)
                                                  echo "bg-success";
                                              else if($post['confirm'] == 2)
                                                  echo "bg-light";
                                              else echo "bg-danger";

                                        ?>">
                                                <td><?= $post['title']; ?></td>
                                                <td><?= $post['content']; ?></td>
                                                <td style="width: 40%;"><img style="width: 20%;" src="<?=  SITEURL . "uploads/" .  $post['image']; ?>"></td>
                                                <td><?= $post['date']; ?></td>
                                    <?php
                                       if(session('rol') == 'A') {
                                                ?>
                                                <td><?= $post['name']; ?></td>
                                                <td><?= $post['last_name']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($post['role'] == 'U') {
                                                        echo $post['confirm'];
                                                    }
                                                    ?>
                                                </td>

                                                     <?php

                                               }
                                           ?>

                                            <td>
                                                <?php
                                                if($post['user_id'] == $_SESSION['id']) {
                                                    ?>

                                                    <a href="postsController.php?action=edit&id=<?= $post['id'] ?>"><i
                                                                class="nc-icon nc-ruler-pencil"></i></a>
                                                    <?php
                                                }
                                                ?>
                                                <a href="postsController.php?action=delete&id=<?= $post['id'] ?>"><i
                                                            class="nc-icon nc-button-power"></i></a>

                                                <?php
                                                   if(session('rol') == 'A' AND $post['user_id'] !== $_SESSION['id']) {

                                                           ?>

                                                           <a href="postsController.php?action=confirm&id=<?= $post['id'] ?>"><i
                                                                       class="nc-icon nc-check-2"></i></a>
                                                           <?php

                                                   }
                                                ?>

                                            </td>


                                                 <?php
                                             }

                                                 ?>
                                        </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
  </script>



<?php
include VIEWROOT . "inc/footer.php";

?>