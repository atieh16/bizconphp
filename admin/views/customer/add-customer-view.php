<?php


 if(isset($data['customer']))
 {
    $customer = $data['customer'];

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

                            <form method="post" action="<?=("customersController.php?action=") . ((isset($customer))? 'update' : 'save') ; ?>" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>نام</label>
                                            <input name="full_name" type="text" class="form-control" placeholder="نام"
                                                   value="<?= (isset($customer))? $customer['full_name'] : '' ; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>سمت</label>
                                            <input name="job" type="text" class="form-control" placeholder="سمت"
                                                   value="<?= (isset($customer))? $customer['job'] : '' ; ?>">
                                        </div>
                                    </div>
                                </div>



                                <?php
                                if(isset($customer)) {
                                    ?>

                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <img style="width: 50%" src="<?= UPLOADURL . $customer['image']; ?>">
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" value="<?=$customer['id'];?>">

                                    <?php
                                }
                                ?>


                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>عکس</label>
                                            <input name="pic" type="file" class="form-control"  value="">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>توضیحات</label>
                                            <textarea name="description" rows="4" cols="80" class="form-control" placeholder="" value=""
                                            ><?= (isset($customer))? $customer['description'] : '' ; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="<?= (isset($customer))? 'edit-cust' : 'add-cust' ; ?>" class="btn btn-info btn-fill pull-right">
                                    <?php
                                    if(isset($customer)) {
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

