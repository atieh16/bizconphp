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
                                <a class="btn btn-primary" href="<?= SITEURL . CONTROLLERS ?>socialsController.php?action=add"><i class="nc-icon nc-simple-add"></i> افزودن</a>
                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>عنوان</th>
                                <th>آیکون</th>
                                <th>لینک</th>
                                </thead>
                                <tbody>

                                <?php


                                if(isset($data['social']) AND $data['social'] AND count($data['social'])>0)
                                    foreach ($data['social'] AS $social) {


                                        ?>
                                        <tr>
                                            <td><?= $social['title']; ?></td>
                                            <td><?= htmlentities($social['icon']); ?></td>
                                            <td><?= $social['link']; ?></td>

                                            <td>

                                                <a href="socialsController.php?action=edit&id=<?= $social['id'] ?>"><i
                                                            class="nc-icon nc-ruler-pencil"></i></a>
                                                <a href="socialsController.php?action=delete&id=<?= $social['id'] ?>"><i
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