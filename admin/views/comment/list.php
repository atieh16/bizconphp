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
                                <th>نظر</th>
                                <th>تاریخ ثبت نظر</th>
                                <th>عنوان پست</th>
                                <th>عکس پست مربوطه</th>
                          <?php
                          if(session('rol') == 'A') {
                          ?>
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>تاییدیه</th>
                                    <?php
                                }
                                ?>

                                </thead>
                                <tbody>

                                <?php


                                if(isset($data['comment']) AND $data['comment'] AND count($data['comment'])>0)
                                    foreach ($data['comment'] AS $comment) {
                                        ?>
                                        <tr>
                                            <td><?= $comment['comment']; ?></td>
                                            <td><?= $comment['date']; ?></td>
                                            <td><?= $comment['title']; ?></td>
                                            <td style="width: 40%;"><img style="width: 20%;" src="<?=  SITEURL . "uploads/" .  $comment['image']; ?>"></td>
                                            <?php
                                            if(session('rol') == 'A') {
                                                ?>
                                                <td><?= $comment['name']; ?></td>
                                                <td><?= $comment['last_name']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($comment['role'] == 'U') {
                                                        echo $comment['confirm'];
                                                    } else if ($comment['role'] == 'A') {
                                                        echo '';
                                                    }
                                                    ?>
                                                </td>
                                                <td>

                                                    <?php
                                                    if ($comment['role'] == 'A') {
                                                        ?>
                                                        <a href="commentsController.php?action=edit&id=<?= $comment['id'] ?>"><i
                                                                    class="nc-icon nc-ruler-pencil"></i></a>
                                                        <?php
                                                    } else if ($comment['role'] == 'U') {
                                                        ?>

                                                        <a href="commentsController.php?action=confirm&id=<?= $comment['id'] ?>"><i
                                                                    class="nc-icon nc-check-2"></i></a>
                                                        <?php
                                                    }
                                                    ?>

                                                    <a href="commentsController.php?action=delete&id=<?= $comment['id'] ?>"><i
                                                                class="nc-icon nc-button-power"></i></a>

                                                </td>
                                                <?php
                                            }
                                            else if(session('rol') == 'U') {
                                                ?>
                                                <td>

                                                    <a href="commentsController.php?action=edit&id=<?= $comment['id'] ?>"><i
                                                                class="nc-icon nc-ruler-pencil"></i></a>

                                                    <a href="commentsController.php?action=delete&id=<?= $comment['id'] ?>"><i
                                                                class="nc-icon nc-button-power"></i></a>
                                                </td>
                                                <?php
                                            }
                                            ?>
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