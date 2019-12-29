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
                            <div class="pull-left col-md-5 text-left">
                                <a class="btn btn-primary" href="<?= SITEURL . CONTROLLERS ?>projectsController.php?action=add"><i class="nc-icon nc-simple-add"></i> افزودن</a>
                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>عنوان</th>
                                <th>کارفرما</th>
                                <th>توضیحات</th>
                                <th>عکس</th>
                                <th>تاریخ پایان</th>
                                </thead>
                                <tbody>

                                <?php


                                if(isset($data['project']) AND $data['project'] AND count($data['project'])>0)
                                    foreach ($data['project'] AS $project) {


                                        ?>
                                        <tr>
                                            <td><?= $project['title']; ?></td>
                                            <td><?= $project['employer']; ?></td>
                                            <td><?= $project['description']; ?></td>
                                            <td style="width: 40%;"><img style="width: 20%;" src="<?=  SITEURL . "uploads/" .  $project['image']; ?>"></td>
                                            <td><?= $project['finish_date']; ?></td>
                                            <td>

                                                <a href="projectsController.php?action=edit&id=<?= $project['id'] ?>"><i
                                                            class="nc-icon nc-ruler-pencil"></i></a>
                                                <a href="projectsController.php?action=delete&id=<?= $project['id'] ?>"><i
                                                            class="nc-icon nc-button-power"></i></a>

                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include VIEWROOT . "inc/footer.php";

?>