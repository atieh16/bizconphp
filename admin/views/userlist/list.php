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

                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>شماره تلفن</th>
                                <th>ایمیل</th>
                                <th>تاربخ ثبت نام</th>
                                <th>سمت</th>
                                </thead>
                                <tbody>

                                <?php


                                if(isset($data) AND $data AND count($data)>0)
                                    foreach ($data AS $userlist) {

                                        ?>
                                        <tr>
                                            <td><?= $userlist['name']; ?></td>
                                            <td><?= $userlist['last_name']; ?></td>
                                            <td><?= $userlist['phone_number']; ?></td>
                                            <td><?= $userlist['email']; ?></td>
                                            <td><?= $userlist['date']; ?></td>
                                            <td><?= $userlist['role']; ?></td>

                                            <td>

                                                <a href="usersController.php?action=delete&id=<?= $userlist['id'] ?>"><i
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