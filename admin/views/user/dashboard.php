<?php

include VIEWROOT . "inc/head.php";
include VIEWROOT . "inc/sidebar.php";
include VIEWROOT . "inc/topbar.php";
?>



    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
          <?php
           if(session('rol') == 'A') {
               ?>

               <span>به پنل مدیریت خوش آمدید </span>

               <?php
           }else if (session('rol') =='U') {
               ?>

               <span>به پنل کاربری خوش آمدید </span>

               <?php
           }
               ?>

                    <span>

                        <?php  echo $_SESSION['name']. " ".$_SESSION['lastName'];

                        ?>
                   </span>
        </div>
    </div>





<?php
include VIEWROOT . "inc/footer.php";
?>