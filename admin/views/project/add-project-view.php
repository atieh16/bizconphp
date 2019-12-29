<?php


if(isset($data['project']))
{
    $project = $data['project'];
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

                            <form method="post" action="<?=("projectsController.php?action=") . ((isset($project))? 'update' : 'save') ; ?>" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>عنوان</label>
                                            <input name="title" type="text" class="form-control" placeholder="عنوان"
                                                   value="<?= (isset($project))? $project['title'] : '' ; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>کارفرما</label>
                                            <input name="employer" type="text" class="form-control" placeholder="کارفرما"
                                                   value="<?= (isset($project))? $project['employer'] : '' ; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>تاریخ پایان</label>
                                            <input name="date" type="text" class="form-control" placeholder="تاریخ پایان"
                                                   value="<?= (isset($project))? $project['finish_date'] : '' ; ?>">
                                        </div>
                                    </div>
                                </div>

                                <?php
                                if(isset($project)) {
                                    ?>

                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <img style="width: 50%" src="<?= UPLOADURL . $project['image']; ?>">
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" value="<?=$project['id'];?>">

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
                                            ><?= (isset($project))? $project['description'] : '' ; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="<?= (isset($project))? 'edit-project' : 'add-project' ; ?>" class="btn btn-info btn-fill pull-right">
                                    <?php
                                    if(isset($project)) {
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