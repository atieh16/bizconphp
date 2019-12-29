<?php
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

                        <form method="post" action="commentsController.php?action=update" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label>عنوان نظر</label>
                                        <input name="comment" type="text" class="form-control" placeholder="عنوان"
                                               value="<?= $data['comment']['comment']; ?>">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id" value="<?= $data['comment']['id'];?>">


                            <button type="submit" name="edit-comment" class="btn btn-info btn-fill pull-right">
                                ویرایش
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


