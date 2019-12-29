<?php

include VIEWROOT . "inc/head.php";
include VIEWROOT . "inc/sidebar.php";
include VIEWROOT . "inc/topbar.php";

?>
    <div class="content">

 <?php



    if(isset($data['message'])) {

        $message = $data['message'];

          switch ($message) {
               case 'okay':

                   $message = "با موفقیت انجام شد";
                   $class = "text-success";

                   break;

               case 'nokay':

                   $message = "خطایی رخ داده است";
                   $class = "text-danger";

                    break;

               case  'pass_err':

                   $message = "پسورد ها باهم برابر نیستند!!";
                   $class = "text-danger";

                    break;

               default:
                    break;
    }
    echo "<h4 class='{$class}'>{$message}</h4>";
}


        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ویرایش پروفایل</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= SITEURL . CONTROLLERS?>usersController.php?action=update-setting" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>نام</label>
                                            <input type="text" name="name" class="form-control" placeholder="نام"
                                                   value="<?= $data['user']['name'];?>" >
                                        </div>
                                    </div>

                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>نام خانوادگی</label>
                                            <input type="text" name="last_name" class="form-control" placeholder="نام خانوادگی"
                                                   value="<?= $data['user']['last_name'];?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>عکس</label>
                                            <input name="pic" type="file" class="form-control"  value="">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <img style="width: 20%" src="<?= UPLOADURL . $data['user']['image']; ?>">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12 pl-1">
                                        <div class="form-group">
                                            <label>رمز عبور(برای عدم تغییر خالی بگذارید)</label>
                                            <input type="password" name="password" class="form-control" placeholder="رمز عبور"
                                                   value="">

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 pl-1">
                                        <div class="form-group">
                                            <label>تکرار رمز عبور(برای عدم تغییر خالی بگذارید)</label>
                                            <input type="password" name="re_password" class="form-control" placeholder="تکرار رمز عبور"
                                                   value="">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 pl-1">
                                        <div class="form-group">
                                            <label>توضیحات</label>
                                            <textarea name="description" rows="4" cols="80" class="form-control" placeholder="درباره ی من" value=""
                                            ><?= $data['user']['description'];?></textarea>
                                        </div>
                                    </div>
                                </div>



                                <button type="submit" name="setting_update" class="btn btn-info btn-fill pull-right">بروز رسانی پروفایل
                                </button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
include VIEWROOT . "inc/footer.php";
?>