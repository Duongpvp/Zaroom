<?php

$msg = "";

include ('../../includes/config.php');

if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($conn, md5($_POST['password']));
            $password_check = mysqli_real_escape_string($conn, ($_POST['password']));
            $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
            $partten = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,32}$/";

            if ($password === $confirm_password) {
                if(!preg_match($partten, $password_check, $matchs)){
                    $msg = "<div class='alert alert-danger'>Mật khẩu không hợp lệ.</div>";
                } else {
                    $query = mysqli_query($conn, "UPDATE users SET password='{$password}', code='' WHERE code='{$_GET['reset']}'");

                    if ($query) {
                        header("Location: index.php");
                    }
                }
            } else {
                $msg = "<div class='alert alert-danger'>Mật khẩu không trùng khớp.</div>";
            }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Link xác nhận không trùng khớp.</div>";
    }
} else {
    header("Location: forgot-password.php");
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form - Thay đổi mật khẩu</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->
    <link rel="stylesheet" href="../../css/login.css">


    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                        <span class="fa fa-close"></span>
                    </div>
                    <div class="content-wthree">
                        <h2>Thay đổi mật khẩu</h2>
                        <p>Zaroom - Website hỗ trợ học tập miễn phí hàng đầu Việt Nam. </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="password" class="password" name="password" placeholder="Nhập mật khẩu" required>
                            <input type="password" class="confirm-password" name="confirm-password" placeholder="Xác nhận lại mật khẩu" required>
                            <button name="submit" class="btn" type="submit">Thay đổi mật khẩu</button>
                        </form>
                        <div class="social-icons">
                            <p>Trở về : <a href="index.php">Đăng nhập</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.main-mockup').fadeOut('slow', function (c) {
                    $('.main-mockup').remove();
                });
            });
        });
    </script>
</body>
</html>