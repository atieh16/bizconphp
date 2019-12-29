
<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <p id="success-message" style="" class="hide text-success"> ثبت نام با موفقیت انجام شد</p>


            <br>
            <div class="bs-example bs-example-tabs">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#signin" data-toggle="tab">ورود  </a></li>
                    <li class=""><a href="#signup" data-toggle="tab">/ ثبت نام</a></li>

                </ul>
            </div>
            <div class="modal-body">
                <div id="myTabContent" class="tab-content">



                   <!-- login form -->
                    <div class="tab-pane  active in" id="signin">
                        <form class="form-horizontal" action="<?= SITEURL . CONTROLLERS ?>usersController.php?action=login" method="post">
                            <fieldset>
                                <!-- Sign In Form -->
                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="userid">ایمیل:</label>
                                    <div class="controls">
                                        <input required="" id="userid" name="email" type="text" class="form-control" placeholder="" class="input-medium" required="">
                                    </div>
                                </div>

                                <!-- Password input-->
                                <div class="control-group">
                                    <label class="control-label" for="passwordinput">رمز عبور:</label>
                                    <div class="controls">
                                        <input required="" id="passwordinput" name="password" class="form-control" type="password" placeholder="********" class="input-medium">
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="signin"></label>
                                    <div class="controls">
                                        <button id="signin" name="logIn" class="btn btn-success">ورود</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>




                    <!-- register form -->
                    <div class="tab-pane fade" id="signup">
                        <form  id="register" class="form-horizontal" method="post" action="">
                            <fieldset>
                                <!-- Sign Up Form -->
                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="Email">نام:</label>
                                    <div class="controls">
                                        <input id="reg-name" name="name" class="form-control" type="text" placeholder="" class="input-large" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="userid">نام خانوادگی:</label>
                                    <div class="controls">
                                        <input id="reg-lastName" name="lastName" class="form-control" type="text" placeholder="" class="input-large" required="">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="userid">تلفن:</label>
                                    <div class="controls">
                                        <input id="reg-tel" name="tel" class="form-control" type="text" placeholder="" class="input-large" required="">
                                    </div>
                                </div>


                                <!-- Text input-->
                                <div class="control-group">
                                    <label class="control-label" for="userid">ایمیل:</label>
                                    <div class="controls">
                                        <input id="reg-email" name="email" class="form-control" type="email" placeholder="" class="input-large" required="">
                                    </div>
                                </div>

                                <!-- Password input-->
                                <div class="control-group">
                                    <label class="control-label" for="password">رمز عبور:</label>
                                    <div class="controls">
                                        <input id="reg-password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">

                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="control-group">
                                    <label class="control-label" for="confirmsignup"></label>
                                    <div class="controls">
                                        <button type="button" id="confirmsignup" name="signup" class="btn btn-success">ثبت نام</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <center>
                    <button class="btn btn-default" data-dismiss="modal">بستن</button>
                </center>
            </div>
        </div>
    </div>
</div>





<footer class="copyright_part">
    <div class="container">
        <div class="row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">

                <?php

                      if(!empty($data['socials']) AND $data['socials'])
                          foreach ($data['socials'] as $key => $social)
                          {
                              ?>

                    <a href="<?= $social['link']; ?>" title="<?= $social['title']; ?>"><?= $social['icon']; ?></a>

                       <?php

                          }

                 ?>

            </div>
        </div>
    </div>
</footer>
<!-- footer part end-->

<!-- jquery plugins here-->
<!-- jquery -->
<script src="<?= SITEURL ?>assets/js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="<?= SITEURL ?>assets/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="<?= SITEURL ?>assets/js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="<?= SITEURL ?>assets/js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="<?= SITEURL ?>assets/js/swiper.min.js"></script>
<!-- swiper js -->
<script src="<?= SITEURL ?>assets/js/masonry.pkgd.js"></script>
<!-- particles js -->
<script src="<?= SITEURL ?>assets/js/owl.carousel.min.js"></script>
<!-- swiper js -->
<script src="<?= SITEURL ?>assets/js/slick.min.js"></script>
<!-- custom js -->
<script src="<?= SITEURL ?>assets/js/custom.js"></script>





<script type="">

    $(document).ready(function () {

        $('#confirmsignup').click(function () {


            if(($('#reg-name').val() == "" ) || ($('#reg-lastName').val() == "" )||($('#reg-tel').val() == "" )||
                ($('#reg-email').val() == "" )||($('#reg-password').val() == "" ))
            {
                alert('please fill the value');
                return;
            }


            formData = new FormData();



            formData.append('name' , $('#reg-name').val());
            formData.append('last_name' , $('#reg-lastName').val());
            formData.append('phone_number' , $('#reg-tel').val());
            formData.append('email' , $('#reg-email').val());
            formData.append('password' , $('#reg-password').val());



            $.ajax({

                url:"<?= SITEURL . CONTROLLERS ?>usersController.php?action=register",
                type:"POST",
                data:formData,
                contentType: false ,
                processData: false,
                success:function (data) {
                    alert(data);

                    $('#success-message').removeClass('hide');


                },
                error:function (data) {


                }

            });

        });

    });

</script>


</body>

</html>