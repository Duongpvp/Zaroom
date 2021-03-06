<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ./php/login/index.php");
    die();
}

include './includes/config.php';
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $email = $row['email'];
    if($row['permission'] == 0){
        $p = "./php/class/class.php";
    } else if($row['permission'] == 1) {
        $p = "./php/class/class_teacher.php";  
    }
}

$sql = "SELECT * FROM `relation` WHERE r_to = '$email' AND request = 1";
$result = $conn->query($sql);
$i = $result->num_rows;


    // $result = $conn->query("SELECT * FROM users WHERE email = $email");
    // if($result->num_rows > 0){
    //     echo $num_rows();
    //     while($row = $result->fetch_assoc()){
    //         if($row['permission'] = 0){
    //             $p = "./php/class/class.php";
    //         } else if($row['permission'] = 1) {
    //             $p = "./php/class/class_teacher.php";  
    //         }
    //     }
    // }
?>


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>Zaroom</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Custom CSS -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <!-- <div id="preloader">
        <div class="loader">
            <img src="images/loader.gif" alt="#" />
        </div>
    </div> -->
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="images/ZaRoom2.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav" style="width:90%">
                        <li><a class="btn btn-2 color-green" href="index.php" style="font-size: 130%;Font-family : time new roman;">Trang ch???</a></li>
                        <li><a class="btn btn-2 color-green" href="<?php echo $p; ?>" style="font-size: 130%;Font-family : time new roman;">L???p h???c</a></li>
                        <li><a class="btn btn-2 color-green" href="./chat_dversion/listchat.php" style="font-size: 130%;Font-family : time new roman;">Ph??ng chat</a></li>
                        <a class='button' style=" color:black;" href="php/make_friend/list_request_relation.php"><img src="./images/addfriend.png" style="height: 40px ;width: 100%;" alt="#" />
                        </a>
                        <h3 style="color: red;font-weight: bold;text-shadow: 0 0 10px aqua;" id="numRe"><?php echo $i; ?></h3>



                    </ul>
                </div>
                <div class="search-box">
                    <a class="dangxuat" class="" href="php/login/logout.php" style="font-size: 18px;Font-family : time new roman;">
                        <img src="./images/logout.png" style="height: 40px;width:30%;padding:5%;">????ng xu???t</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- Start Banner -->
    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="pogoSlider" id="js-main-slider">
                    <div class="pogoSlider-slide" style="background-image:url(images/bg-index.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <h3 class="mau-a"><span class="mau-a" style="font-size:50px">B???n c?? th??? tham gia c??c l???p h???c ??? m???i
                                                n??i</span><br><span class="mau-a">C??ng v???i b???n b?? c???a b???n</span></h3>
                                        <div class="full center">
                                            <a class="button1" href="<?php echo $p; ?>">B???t ?????u h???c</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" style="background-image:url(images/bgdep-index.png);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <h3 class="mau"><span class="mau-a" style="font-size:50px">Th???o lu???n v?? trao ?????i b??i
                                                h???c</span><br><span class="mau-a">V???i ch???c n??ng chat</span></h3>
                                        <h4 style="color:white;text-shadow: 0px 5px 60px black;font-size:40px;font-weight:bold;">Free Educations</h4>
                                        <div class="full center">
                                            <a class="button1" href="<?php echo $p; ?>">B???t ?????u h???c</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .pogoSlider -->
            </div>
        </div>
    </div>
    <!-- End Banner -->
    <!-- section -->
    <div class="section tabbar_menu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab_menu" style="width:95%;">
                        <ul>
                            <li style="margin-right:9%"><a href=""></a></li>
                            <li style="margin-right:7%;margin-left:-7%"><a class="button" href="<?php echo $p; ?>"><span class="icon"><img src="images/i1.png" alt="#" /></span>
                                    <span style="font-size: 20px;color:Black;font-weight:bold">L???p
                                        h???c</span></a></li>
                            <li style="margin-right: 7%;"><a class="button" href="#"><span class="icon"><img src="images/i2.png" alt="#" /></span><span style=" font-size: 20px;color:Black;font-weight:bold">Gi???ng
                                        vi??n</span></a></li>
                            <li style="margin-right: 7%;"><a class="button" href="https://dsa.ctu.edu.vn/"><span class="icon"><img src="images/i3.png" alt="#" /></span><span style="font-size: 20px;color:Black;font-weight:bold">Ho???t
                                        ?????ng</span></a></li>
                            <li style="margin-right: 7%;"><a class="button" href="#footer-move"><span class="icon"><img src="images/i4.png" alt="#" /></span><span style="font-size: 20px;color:Black;font-weight:bold">Tr???
                                        gi??p</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section margin-top_50" style="padding-top:70px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 layout_padding_2">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <h2>Ch??o m???ng ?????n v???i<span style="	text-shadow: 0 0 30px aqua;"> ZaRoom</span></h2>
                        </div>
                        <div class="full">
                            <p style=" font-size: 22px; font-family: 'Times New Roman'">ZaRoom l?? m???t trang web cung c???p
                                m??i tr?????ng h??? tr??? h???c t???p tr???c tuy???n mi???n ph?? cung c???p c??c c??ng c??? gi??p cho tr???i nghi???m
                                h???c tr???c tuy???n th??m ti???n l???i v?? th??ng minh.</p>
                            <p style=" font-size: 22px; font-family: 'Times New Roman'">
                                H??y b???t ?????u nh???ng bu???i h???c online th???t s??i n???i v?? nh???n nh???p c??ng ZaRoom ????? c?? nh???ng tr???i
                                nghi???m th?? v??? v?? h???p d???n.
                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="full">
                        <img class="img-responsive" style="width:53%;height:300px;margin-left:100px" src="images/Letan.png" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section layout_padding" style="padding-bottom:0px;padding-top:50px;" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2><span>T??nh n??ng</span> n???i b???t</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full blog_img_popular">
                        <img class="img-responsive" src="images/chat.jpg" alt="./chat_dversion/listchat.php" />
                        <a class="thea" href="./chat_dversion/listchat.php">Chat</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full blog_img_popular">
                        <img class="img-responsive" src="images/p2.png" alt="#" />
                        <a class="thea" href="php/make_friend/list_request_relation.php"> K???t b???n</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full blog_img_popular">
                        <img class="img-responsive" src="images/deadline.jpg" alt="#" />
                        <a class="thea" href="<?php echo $p; ?>"> Giao/N???p b??i t???p </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section margin-top_50 silver_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="full float-right_img">
                        <img src="images/img6.png" alt="#" />
                    </div>
                </div>
                <div class="col-md-6 layout_padding_2">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <h2><span>Ph??ng chat</h2>
                        </div>
                        <div class="full">
                            <p style=" font-size: 24px; font-family: 'Times New Roman'">
                                H???c vi??n c?? th??? chat v???i b???n b?? v?? gi???ng vi??n khi ???? k???t b???n
                                v???i nhau. Ngo??i ra ZaRoom c??n cung c???p t??nh n??ng chat nh??m thu???n
                                ti???n cho vi???c th???o lu???n nh??m gi???a c??c h???c vi??n v?? gi???a h???c vi??n
                                v???i gi???ng vi??n.
                            </p>
                        </div>
                        <!-- <div class="full">
                            <a class="hvr-radial-out button-theme" href="./chat_dversion/listchat.php">Xem th??m</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section layout_padding padding_bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <h2><span>K???t b???n</span></h2>
                        </div>
                        <div class="full">
                            <p style=" font-size: 24px; font-family: 'Times New Roman'">
                                T??nh n??ng k???t b???n ???? ???????c ZaRoom th??m v??o ????? t??ng kh??? n??ng
                                t????ng t??c gi???a h???c vi??n v???i nhau v?? h???c vi??n v???i gi??o vi??n.
                                Gi??p h???c vi??n c?? th??? l??m quen th??m nhi???u b???n m???i khi k???t b???n
                                th??ng qua t??nh n??ng chat. T???o cho h???c vi??n c???m gi??c th?? v???
                                nh???t khi h???c v???i ZaRoom.
                            </p>
                        </div>
                        <!-- <div class="full">
                            <a class="hvr-radial-out button-theme" href="php/make_friend/list_request_relation.php">Xem th??m</a>
                        </div> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="full">
                        <img class="img-responsive" src="images/ketban.jpg" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------------->
    <div class="section margin-top_50 silver_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="full float-right_img">
                        <img src="images/giaonopbt.jpg" alt="#" />
                    </div>
                </div>
                <div class="col-md-6 layout_padding_2">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <h2 style=" font-family: 'Times New Roman'"><span>Giao/N???p b??i t???p</h2>
                        </div>
                        <div class="full">
                            <p style=" font-size: 24px; font-family: 'Times New Roman'">Gi???ng vi??n s??? d???ng h??? th???ng ?????
                                chia s??? kh??ng gian h???c t???p, cung c???p t??i li???u, l???ch h???c
                                tr???c tuy???n d??? d??ng. Song song v???i vi???c h???c sinh c?? th??? n???m b???t ???????c th??ng tin l???p h???c.
                            </p>
                        </div>
                        <!-- <div class="full">
                            <a class="hvr-radial-out button-theme" href="<?php echo $p; ?>">Xem th??m</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section layout_padding padding_bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_center">
                            <h2><span>Top ????nh gi??</span></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="full blog_img_popular">
                                            <img class="img-responsive" src="images/img9.png" alt="#" width="450px" height="450px" />
                                            <h4 style=" font-family: 'Times New Roman'">Gv gi??o d???c c??ng d??n: Hu???n Hoa
                                                H???ng</h4>
                                            <p style=" font-family: 'Times New Roman'">T??i ch??? mu???n n??i v???i m???i ng?????i
                                                c??u n??y th??i.
                                                C???n c?? th?? b?? si??ng n??ng, ch??? c?? h???c th?? m???i c?? ??n.
                                                Kh??ng ????ng ti???n m?? mu???n ???????c h???c free th?? ch??? c?? Website n??y th??i, nh??.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="full blog_img_popular">
                                            <img class="img-responsive" src="images/img8.png" alt="#" width="450px" height="450px" />
                                            <h4 style=" font-family: 'Times New Roman'">Ph??? huynh: Nguy???n H???u ??a</h4>
                                            <p style=" font-family: 'Times New Roman'">T??i n??m nay h??n 70 tu???i m?? ch??a
                                                th???y Website n??o m?? n?? x???n nh?? th??? n??y
                                                c???.
                                                Ch??? ph???i t??i bi???t s???m l?? t??i gi???i thi???u cho con ch??u n?? h???c h???t r???i.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="full blog_img_popular">
                                            <img class="img-responsive" src="images/img9-2.png" alt="#" />
                                            <h4 style=" font-family: 'Times New Roman'">H???c vi??n: Ng?? B?? Kh??</h4>
                                            <p style=" font-family: 'Times New Roman'">??i b???n ??i ! Tr???i nghi???m h???c c???a
                                                b???n kh??ng t???t l?? do b???n ch??a x??i t???i c??i
                                                web n??y ???? b???n ???!</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="full blog_img_popular">
                                            <img class="img-responsive" src="images/img8-2.png" alt="#" />
                                            <h4 style=" font-family: 'Times New Roman'">Gv tr?????ng ??H X??y d???ng: L???c Fuho
                                            </h4>
                                            <p style=" font-family: 'Times New Roman'">Chia s??? trang web n??y cho th???y
                                                ??i!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- Start Footer -->
    <footer class="footer-box" style="padding: 2%;" id="footer-move">
        <div style="padding-left: 5%;">
            <table style="width:100%">
                <tr>
                    <th><a href="index.php"><img src="images/ZaRoom2.png" style="width:50%;" alt="#" /></a></th>
                    <th style="color:aquamarine;font-size:40px;font-weight:bold;text-align:rigth;">Li??n h??? v???i ch??ng t??i</th>
                </tr>
                <tr>
                    <td style="font-family: 'Times New Roman', Times, serif;font-size: 22px;color: antiquewhite;">Ng?????i
                        n??o ch??? bi???t ng???i nghe gi??o s?? gi???ng ch??? b???n th??n m??nh trong l??ng<br> kh??ng c???m
                        th???y kh??t khao ?????c s??ch, th?? c?? th??? n??i t???t c??? nh???ng ??i???u ng?????i ???y<br> nghe gi???ng ??? tr?????ng
                        ?????i
                        h???c c??ng s??? ch??? nh?? m???t t??a nh?? x??y tr??n c??t m?? th??i.<br> ??? I.A. Gontcharov ???
                    </td>
                    <td style="padding-top: 0px;text-align:rigth;">
                        <ul style="font-family: 'Times New Roman', Times, serif;color: antiquewhite;">
                            <li style="height: 4%;font-size: 22px;"><img style="margin-right: 3%;" src="images/i5.png"><span>Khoa CNTT&TT - Tr?????ng ?????i h???c C???n Th??.</span></li>
                            <li style="height:4%;font-size: 22px;"><img style="margin-right: 3%;" src="images/i6.png"><span>Zaroom1505@gmail.com</span></li>
                            <li style="font-size: 22px;"><img style="margin-right: 3%;" src="images/i7.png"><span style="height:4%;font-size: 22px;">+(84) 948894463</span></li>
                        </ul>

                    </td>
                </tr>
            </table>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.pogo-slider.min.js"></script>
    <script src="js/slider-index.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script>
        /* counter js */

        (function($) {
            $.fn.countTo = function(options) {
                options = options || {};

                return $(this).each(function() {
                    // set options for current element
                    var settings = $.extend({}, $.fn.countTo.defaults, {
                        from: $(this).data('from'),
                        to: $(this).data('to'),
                        speed: $(this).data('speed'),
                        refreshInterval: $(this).data('refresh-interval'),
                        decimals: $(this).data('decimals')
                    }, options);

                    // how many times to update the value, and how much to increment the value on each update
                    var loops = Math.ceil(settings.speed / settings.refreshInterval),
                        increment = (settings.to - settings.from) / loops;

                    // references & variables that will change with each update
                    var self = this,
                        $self = $(this),
                        loopCount = 0,
                        value = settings.from,
                        data = $self.data('countTo') || {};

                    $self.data('countTo', data);

                    // if an existing interval can be found, clear it first
                    if (data.interval) {
                        clearInterval(data.interval);
                    }
                    data.interval = setInterval(updateTimer, settings.refreshInterval);

                    // initialize the element with the starting value
                    render(value);

                    function updateTimer() {
                        value += increment;
                        loopCount++;

                        render(value);

                        if (typeof(settings.onUpdate) == 'function') {
                            settings.onUpdate.call(self, value);
                        }

                        if (loopCount >= loops) {
                            // remove the interval
                            $self.removeData('countTo');
                            clearInterval(data.interval);
                            value = settings.to;

                            if (typeof(settings.onComplete) == 'function') {
                                settings.onComplete.call(self, value);
                            }
                        }
                    }

                    function render(value) {
                        var formattedValue = settings.formatter.call(self, value, settings);
                        $self.html(formattedValue);
                    }
                });
            };

            $.fn.countTo.defaults = {
                from: 0, // the number the element should start at
                to: 0, // the number the element should end at
                speed: 1000, // how long it should take to count between the target numbers
                refreshInterval: 100, // how often the element should be updated
                decimals: 0, // the number of decimal places to show
                formatter: formatter, // handler for formatting the value before rendering
                onUpdate: null, // callback method for every time the element is updated
                onComplete: null // callback method for when the element finishes updating
            };

            function formatter(value, settings) {
                return value.toFixed(settings.decimals);
            }
        }(jQuery));

        jQuery(function($) {
            // custom formatting example
            $('.count-number').data('countToOptions', {
                formatter: function(value, options) {
                    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                }
            });

            // start all the timers
            $('.timer').each(count);

            function count(options) {
                var $this = $(this);
                options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                $this.countTo(options);
            }
        });
    </script>
</body>

</html>