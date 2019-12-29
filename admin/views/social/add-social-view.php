<?php


 if(isset($data['social']))
 {
    $social = $data['social'];

 }


include VIEWROOT . "inc/head.php";
include VIEWROOT . "inc/sidebar.php";
include VIEWROOT . "inc/topbar.php";

?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">


                        <?php



                        if(isset($data['message'])){

                            $message = $data['message'];

                            switch ($message) {
                                case 'ok':

                                    $message = "با موفقیت انجام شد";
                                    $class = "text-success";

                                    break;

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

                        <div class="card-header">
                            <h4 class="card-title">ویرایش پروفایل</h4>
                        </div>
                        <div class="card-body">

                            <form method="post" action="<?=("socialsController.php?action=") . ((isset($social))? 'update' : 'save') ; ?>" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>عنوان</label>
                                            <input name="title" type="text" class="form-control" placeholder="عنوان"
                                                   value="<?= (isset($social))? $social['title'] : '' ; ?>">
                                        </div>
                                    </div>
                                </div>



                                <?php
                                if(isset($social)){

                                    ?>


                                    <input type="hidden" name="id" value="<?= $social['id']; ?>">



                                    <?php
                                }
                                ?>



                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>آیکون</label>
                                            <input name="icon" type="text" class="form-control" placeholder="آیکون"
                                                   value="<?= (isset($social))? htmlentities($social['icon']) : '' ; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>لینک</label>
                                            <input name="link" type="text" class="form-control" placeholder="لینک"
                                                   value="<?= (isset($social))? $social['link'] : '' ; ?>">
                                        </div>
                                    </div>
                                </div>



                                <button type="submit" name="<?= (isset($social))? 'edit-social' : 'add-social' ; ?>" class="btn btn-info btn-fill pull-right">
                                    <?php
                                    if(isset($social)) {
                                        ?>
                                        ویرایش
                                        <?php
                                    }else {
                                        ?>
                                        افزودن
                                        <?php
                                    }
                                    ?>
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


