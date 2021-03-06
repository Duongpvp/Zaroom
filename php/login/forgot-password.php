<?php

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ./index.php");
    die();
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include ('../../includes/config.php');
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE users SET code='{$code}' WHERE email='{$email}'");

        if ($query) {        
            echo "<div style='display: none;'>";
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'duong891109@gmail.com';                     //SMTP username
                $mail->Password   = 'DRDq2cz6';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('duong891109@gmail.com','Duongdepzai');
                $mail->addAddress($email);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'no reply';
                $mail->Body    = '????y l?? ???????ng d???n x??c nh???n c???p l???i m???t kh???u c???a ng?????i ?????p trai nh???t v?? tr??? 7 - Mr.Phi D????ng <b><a href="http://localhost/Zaroom/php/login/change-password.php?reset='.$code.'">http://localhost/Zaroom/php/login/change-password.php?reset='.$code.'</a></b>';

                $mail->send();
                echo 'Tin nh???n ???? g???i!';
            } catch (Exception $e) {
                echo "Kh??ng th??? g???i ???????c tin nh???n. Mailer Error: {$mail->ErrorInfo}";
            }
            echo "</div>";        
            $msg = "<div class='alert alert-info'>Ch??ng t??i ???? g???i x??c nh???n ?????n email c???a b???n.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>$email - Kh??ng th??? t??m th???y email n??y.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form - Qu??n m???t kh???u</title>
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
                    <div class="content-wthree">
                        <h2 class="title" style="margin-left: 25%;">Qu??n m???t kh???u</h2>
                        <h3 style="margin-left: 10%;">ZaRoom - Website h??? tr??? h???c t???p mi???n ph??  <br> <span style="margin-left: 25%;">h??ng ?????u Vi???t Nam</span></h3>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="email" class="email" name="email" placeholder="Nh???p Email" required>
                            <button name="submit" class="btn" type="submit">G???i x??c nh???n</button>
                        </form>
                        <div class="social-icons">
                            <p>Tr??? v??? : <a href="index.php">????ng nh???p</a>.</p>
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