<?php
session_start();
include('../includes/config.php');

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $email = $row['email'];
}
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $email = $row['email'];
    if ($row['permission'] == 0) {
        $p = "../php/class/class.php";
    } else if ($row['permission'] == 1) {
        $p = "../php/class/class_teacher.php";
    }
}

$sql = "SELECT * FROM `relation` WHERE r_to = '$email' AND request = 1";
$result = $conn->query($sql);
$i = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="../css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="../css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css" />
    <style>
      
    </style>
</head>


<body>
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php"><img src="../images/ZaRoom2.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav" style="width:90%">
                        <li class="lia"><a class="btn btn-2 color-green" href="../index.php" style="font-size:130%;Font-family : time new roman;">Trang chủ</a></li>
                        <li class="lia"><a class="btn btn-2 color-green" href="<?php echo $p; ?>" style="font-size:130%;Font-family : time new roman;">Lớp học</a></li>
                        <a class="button-b" href="../php/make_friend/list_request_relation.php"><img src="../images//addfriend.png" style="height: 40px ;width: 100%;" alt="#" />
                        </a>
                        <h3 style="color: red;font-weight: bold;" id="numRe"><?php echo $i; ?></h3>
                    </ul>
                </div>
                <div class="search-box">

                    <a class="dangxuat" href="../php/login/logout.php" style="font-size: 18px;Font-family : time new roman;">
                        <img src="../images/logout.png" style="height: 40px;width:30%;padding:5%;">Đăng xuất</a>

                </div>
            </div>
        </nav>
    </header>
    <div class="body-chat" style="margin-top: 7%">
        <div class="list-chat">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $email = $row['email'];
                $id_user = $row['id'];
                # Getting User conversations
                $conversations = $row['name'];
            }

            echo "<p class='name-group' style='color: black;text-shadow: 0 0 30px white;'>Bạn bè</p>";
            $sql_friend_t = "SELECT * FROM `relation` WHERE r_to = '$email' AND request = 0";
            $result_friend_t = $conn->query($sql_friend_t);
            if ($result_friend_t->num_rows > 0) {
                while ($row_friend_t = $result_friend_t->fetch_assoc()) {
                    echo "<div class='list_friend''>
                <a  href='./chat_room.php?idR=$row_friend_t[r_from]' class='friend' >$row_friend_t[r_from]</a>
                </div>";
                }
            }
            $sql_friend_f = "SELECT * FROM `relation` WHERE r_from = '$email' AND request = 0";
            $result_friend_f = $conn->query($sql_friend_f);
            if ($result_friend_f->num_rows > 0) {
                while ($row_friend_f = $result_friend_f->fetch_assoc()) {
                    echo "<div class='list_friend'>
                <a  href='./chat_room.php?idR=$row_friend_f[r_to]' class='friend'>$row_friend_f[r_to]</a>
                </div>";
                }
            }


            $sql = "SELECT * FROM `class_user`,`class`,`users` WHERE class_user.id_class=class.id_class 
        AND class_user.id_user=users.id AND class_user.id_user=$id_user";
            $result = $conn->query($sql);
            //Xử lý class
            if ($result->num_rows > 0) {
                echo "<p class='name-group'style='color: black;text-shadow: 0 0 30px white;'>Nhóm lớp</p>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='list_friend'>
                <a href='./chat_room.php?idN=$row[name_class]' class='friend'>$row[name_class]</a>
                </div>";
                }
            }

            ?>
        </div>
        <?php
        if (isset($_SESSION['EMAIL_FRIEND'])) {
            echo '<iframe class="mess-window" src="message.php"></iframe>';
        } ?>
    </div>

    <script src="./js/jquery.js"></script>
    <!-- Kết nối file js/sendmsg.js -->
    <script src="./js/sendmsg.js"></script>
    <!-- Kết nối file js/autoload.js -->
    <script src="./js/autoload.js">
    </script>

</body>

</html>