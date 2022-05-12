<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Messenger</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
        <!-- Kết nối thư viện Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Kết nối file css/style.css -->
        <link rel="stylesheet" href="../css/custom.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="./style.css">


    </head>
    <body>
    <div class="header-msg">
            <span class="email-fiend">
                <b>
                    <?php
                        session_start();
                        include('../includes/config.php'); 
                        echo $_SESSION['EMAIL_FRIEND'];
                    ?>
                </b>
            </span>
    </div>
        <?php
            
            $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $email = $row['email'];
            }
            if($email){
                    // Show chatbox
                    echo 
                    '<div class="main-chat" style="background-color: #E0F2F7;">     
                        </div><!-- div.main-chat -->
                        <div class="box-chat">
                                <form method="POST" id="formSendMsg" onsubmit="return false;" background-color: #E0F2F7;>
                                        <input type="text" placeholder=" Nội dung tin nhắn" style="border:solid;border-width:2px;border-color:#BDBDBD;
                                        border-radius: 10px;padding:1%;margin:0 0 1% 1%;"/> 
                                        <button  id = "emitChat" type="button" name="emitChat" style="font-size: 15px;border:solid;border-width: 2px;border-color:#BDBDBD; 
                                        border-radius: 10px;padding:1%;width:7%;"> Gửi </button>
                                </form><!-- form#formSendMsg -->
                    </div><!-- div.box-chat -->';
                } else {
                    header('../index.php');
                }
        ?>


        <!-- Kết nối thư viện Jquery -->
        <script src="./js/jquery.js"></script>
        <!-- Kết nối file js/sendmsg.js -->
        <script src="./js/sendmsg.js"></script>
        <!-- Kết nối file js/autoload.js -->
        <script src="./js/autoload.js"></script>
        <!--<button class="cld" type></button>-->
    </body>
</html>


