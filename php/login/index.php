<?php
    include ('../../includes/config.php');
    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        $sqlp = "SELECT * FROM `users` WHERE permission = 2";
        $resultp =$conn->query($sqlp);
        if($resultp->num_rows > 0){
            header("Location: ../../admin.php");
            die();
        }else{
            header("Location: ../../index.php");
            die();
        }
    }
    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Tài khoản đã được xác thực thành công.</div>";
            }
        } else {
            header("Location: index.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (empty($row['code'])) {
                $_SESSION['SESSION_EMAIL'] = $email;
                $_SESSION['SESSION_ID'] = $row['id'];
                if($row['permission'] == 2){
                    header("Location: ../../admin/admin.php");
                    die();
                }if($row['permission'] != 2){
                    header("Location: ../../index.php");
                    die();}
            } else {
                $msg = "<div class='alert alert-info'>Trước hết hãy xác thực tài khoản và thử lại.</div>";
            }
            
        } else {
            $msg = "<div class='alert alert-danger'>Email hoặc mật khẩu không trùng khớp.</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form - Đăng nhập</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="../../css/login.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Main index -->
    <div>

    </div>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid" >
                <div class="main-mockup">
                    <div class="content-wthree">
                        <h2 class="title" style="margin-left: 30%;">ĐĂNG NHẬP</h2>
                        <h3 style="margin-left: 10%;">ZaRoom - Website hỗ trợ học tập miễn phí  <br> <span style="margin-left: 25%;">hàng đầu Việt Nam</span></h3>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Nhập Email" required>
                            <input type="password" class="password" name="password" placeholder="Nhập mật khẩu" style="margin-bottom: 2px;" required>
                            <p><a href="forgot-password.php" style="margin-bottom: 15px; display: block; text-align: right;">Quên mật khẩu ?</a></p>
                            <button name="submit" name="submit" class="btn" type="submit">Đăng nhập</button>
                        </form>
                        <div class="social-icons">
                            <p>Tạo tài khoản : <a href="register.php">Đăng ký</a>.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    

</body>

</html>