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
                                <a class="btn btn-primary" href="<?= SITEURL . CONTROLLERS ?>metadataController.php?action=add"><i class="nc-icon nc-simple-add"></i> افزودن</a>
                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>کلید</th>
                                <th>مقدار</th>
                                <th>داده های اضافه</th>
                                </thead>
                                <tbody>

                                <?php
                                /* shart $cprojects be khater in gozashtim ke zamani ke hameye $project ha hazf shodand agar benevisim
                                  if(isset($project)  AND count($cprojects)>0) dar in sorat $project baraye shomaresh vojod nadarad
                                  va tabe count() false barnigardanad baraye hamin ma minevisim if(isset($project) AND $project AND count($project)>0)
                                  ke zamani ke hame $project ha ra az list haz kardim  $project bashad ke count() true bargardanad
                               */

                                if(isset($data['metadata']) AND $data['metadata'] AND count($data['metadata'])>0)
                                    foreach ($data['metadata'] AS $metadata) {


                                        ?>
                                        <tr>
                                            <td><?= $metadata['klid']; ?></td>
                                            <td><?= $metadata['value']; ?></td>
                                            <td><?= $metadata['meta']; ?></td>
                                            <td>

                                                <a href="metadataController.php?action=edit&id=<?= $metadata['id'] ?>"><i
                                                            class="nc-icon nc-ruler-pencil"></i></a>
                                                <a href="metadataController.php?action=delete&id=<?= $metadata['id'] ?>"><i
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