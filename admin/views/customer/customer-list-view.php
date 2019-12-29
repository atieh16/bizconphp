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
                                <a class="btn btn-primary" href="<?= SITEURL . CONTROLLERS ?>customersController.php?action=add"><i class="nc-icon nc-simple-add"></i> افزودن</a>
                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>نام</th>
                                <th>سمت</th>
                                <th>عکس</th>
                                <th>توضیحات</th>
                                </thead>
                                <tbody>

                                <?php


                                if(isset($data['customer']) AND $data['customer'] AND count($data['customer'])>0)
                                    foreach ($data['customer'] AS $customer) {


                                        ?>
                                        <tr>
                                            <td><?= $customer['full_name']; ?></td>
                                            <td><?= $customer['job']; ?></td>
                                            <td style="width: 40%;"><img style="width: 20%;" src="<?=  SITEURL . "uploads/" .  $customer['image']; ?>"></td>
                                            <td><?= $customer['description']; ?></td>
                                            <td>

                                                <a href="customersController.php?action=edit&id=<?= $customer['id'] ?>"><i
                                                            class="nc-icon nc-ruler-pencil"></i></a>
                                                <a href="customersController.php?action=delete&id=<?= $customer['id'] ?>"><i
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