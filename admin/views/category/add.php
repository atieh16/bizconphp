<?php


if(isset($data['categories']))
{
    $category = $data['categories'];
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

                            <form method="post" action="<?=("categoriesController.php?action=") . ((isset($category))? 'update' : 'save') ; ?>" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>عنوان</label>
                                            <input name="title" type="text" class="form-control" placeholder="عنوان"
                                                   value="<?= (isset($category))? $category['title'] : '' ; ?>">
                                        </div>
                                    </div>
                                </div>



                                <?php
                                if(isset($category)) {
                                    ?>

                                    <input type="hidden" name="id" value="<?=$category['id'];?>">

                                    <?php
                                }
                                ?>


                                <button type="submit" name="<?= (isset($category))? 'edit-cat' : 'add-cat' ; ?>" class="btn btn-info btn-fill pull-right">
                                    <?php
                                    if(isset($category)) {
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