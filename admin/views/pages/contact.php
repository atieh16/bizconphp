<?php

   include_once  "/xampp/htdocs/bizconphp"."/inc/constants.php";
   include_once PATHROOT .  "inc/head.php";
   include_once PATHROOT .  "inc/header.php";

?>

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>تماس با ما</h2>
                            <p>خانه<span>-</span>تماس</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;"></div>
        <script>
          function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var grayStyles = [
              {
                featureType: "all",
                stylers: [
                  { saturation: -90 },
                  { lightness: 50 }
                ]
              },
              {elementType: 'labels.text.fill', stylers: [{color: '#ccdee9'}]}
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -31.197, lng: 150.744},
              zoom: 9,
              styles: grayStyles,
              scrollwheel:  false
            });
          }
          
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>
        
      </div>


      <div class="row">

        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>باتن وود , کالیفرنیا.</h3>
              <p>رزمید , ۹۱۷۷۰</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
                <h3>باتن وود , کالیفرنیا.</h3>
                <p>رزمید , ۹۱۷۷۰</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
                <h3>باتن وود , کالیفرنیا.</h3>
                <p>رزمید , ۹۱۷۷۰</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

<!-- footer part start-->
<section class="footer-area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                <h4>محصولات برتر</h4>
                <ul>
                    <li><a href="#">وب سایت مدیریت شده</a></li>
                    <li><a href="#">مدیریت اعتبار</a></li>
                    <li><a href="#">قدرت ابزار</a></li>
                    <li><a href="#">خدمات بازاریابی</a></li>
                </ul>
            </div>
            <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                <h4>لینک های سریع</h4>
                <ul>
                    <li><a href="#">شغل ها</a></li>
                    <li><a href="#">دارایی برند</a></li>
                    <li><a href="#">روابط سرمایه گذار</a></li>
                    <li><a href="#">شرایط استفاده از خدمات</a></li>
                </ul>
            </div>
            <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                <h4>امکانات</h4>
                <ul>
                    <li><a href="#">شغل ها</a></li>
                    <li><a href="#">دارایی برند</a></li>
                    <li><a href="#">روابط سرمایه گذار</a></li>
                    <li><a href="#">شرایط استفاده از خدمات</a></li>
                </ul>
            </div>
            <div class="col-xl-2 col-sm-4 mb-4 mb-xl-0 single-footer-widget">
                <h4>منابع</h4>
                <ul>
                    <li><a href="#">راهنماها</a></li>
                    <li><a href="#">پژوهش</a></li>
                    <li><a href="#">کارشناسان</a></li>
                    <li><a href="#">آژانس ها</a></li>
                </ul>
            </div>
            <div class="col-xl-4 col-sm-8 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                <h4>خبرنامه</h4>
                <p>شما می توانید به ما اعتماد کنید ما فقط پیشنهادات تبلیغاتی ارسال می کنیم</p>
                <div class="form-wrap" id="mc_embed_signup">
                    <form target="_blank"
                          action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                          method="get" class="form-inline">
                        <input class="form-control" name="EMAIL" placeholder="آدرس ایمیل شما"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'آدرس ایمیل شما '"
                               required="" type="email">
                        <button class="click-btn btn btn-default text-uppercase btn_2">تایید</button>
                        <div style="position: absolute; left: -5000px;">
                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                        </div>

                        <div class="info"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
  include PATHROOT .  "inc/footer.php";
?>