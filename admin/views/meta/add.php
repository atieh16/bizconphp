<?php


if(isset($data['metadata']))
{
    $mymeta = $data['metadata'];
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

                            <form method="post" action="<?=("metadataController.php?action=") . ((isset($mymeta))? 'update' : 'save') ; ?>" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>کلید</label>
                                            <input name="klid" type="text" class="form-control" placeholder="کلید"
                                                   value="<?= (isset($mymeta))? $mymeta['klid'] : '' ; ?>">
                                        </div>
                                    </div>
                                </div>



                                <?php
                                if(isset($mymeta)) {
                                    ?>


                                    <input type="hidden" name="id" value="<?=$mymeta['id'];?>">

                                    <?php
                                }
                                ?>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>مقدار</label>
                                            <textarea name="value" rows="4" cols="80" class="form-control" placeholder="مقدار" value=""
                                            ><?= (isset($mymeta))? $mymeta['value'] : '' ; ?></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>داده های اضافی</label>
                                            <textarea name="meta" rows="4" cols="80" class="form-control" placeholder="" value=""
                                            ><?= (isset($mymeta))? $mymeta['meta'] : '' ; ?></textarea>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" name="<?= (isset($mymeta))? 'edit' : 'add' ; ?>" class="btn btn-info btn-fill pull-right">
                                    <?php
                                    if(isset($mymeta)) {
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