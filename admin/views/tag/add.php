<?php


if(isset($data['tag']))
{
    $tag = $data['tag'];

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

                            <form method="post" action="<?=("tagsController.php?action=") . ((isset($tag))? 'update' : 'save') ; ?>" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>عنوان</label>
                                            <input name="title" type="text" class="form-control" placeholder="عنوان"
                                                   value="<?= (isset($tag))? $tag['subject'] : '' ; ?>">
                                        </div>
                                    </div>
                                </div>



                                <?php
                                if(isset($tag)) {
                                    ?>

                                    <input type="hidden" name="id" value="<?=$tag['id'];?>">

                                    <?php
                                }
                                ?>


                                <button type="submit" name="<?= (isset($tag))? 'edit-tag' : 'add-tag' ; ?>" class="btn btn-info btn-fill pull-right">
                                    <?php
                                    if(isset($tag)){
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