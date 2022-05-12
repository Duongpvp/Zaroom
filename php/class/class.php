<?php
session_start();
include('../../includes/config.php');
$query = mysqli_query($conn, "SELECT * FROM users WHERE id='{$_SESSION['SESSION_ID']}'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $id_user = $row['id'];
}
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $email = $row['email'];
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
    <link rel="stylesheet" href="../../chat_dversion/css/style.css">

    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="../../css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="../../css/style.css" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../../css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../css/custom.css" />

    <title>Class</title>
    <script>
        var i = 1;

        function a() {
            if (i == 1) {
                document.getElementById("form-join").style.display = "block";
                i = 0;
            } else {
                document.getElementById("form-join").style.display = "none";
                i = 1;
            }

        };

        function b() {
            document.getElementById("form-join").style.display = "none";
        };
    </script>
    <style>
       

        * {
            padding: 0;
            margin: 0;
        }
     

        .class-header {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            background-color: cadetblue;
            border-radius: 5px;


        }

        .name-class {
            border-radius: 5px;
            width: 100px;
        }

        #form-join {
            display: none;
            background-color: cadetblue;
            width: fit-content;
            padding: 1% 1%;
            border-radius: 5px;

        }

        .submit {
            border-radius: 5px 5px 5px 5px;
            width: 35%;
            font-size: 20px;

        }


        .button {
            font-size: 20px;
            border: 0 solid;
            box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
            outline: 1px solid;
            outline-color: rgba(255, 255, 255, .5);
            outline-offset: 0px;
            text-shadow: none;
            transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
        }

        .button:hover {
            border: 1px solid;
            box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
            outline-color: rgba(255, 255, 255, 0);
            outline-offset: 15px;
            text-shadow: 1px 1px 2px #427388;
        }

        .button-a {
            font-size: 20px;
            width: 120px;
            border: 1px solid;
            border-radius: 5px;
            box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
            outline-color: rgba(255, 255, 255, .5);
            outline-offset: 0px;
            text-shadow: none;
            transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
        }

        .button-a:hover {
            border: 1px solid;
            box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
            outline-color: rgba(255, 255, 255, 0);
            outline-offset: 15px;
            text-shadow: 1px 1px 2px #427388;
        }


        #join {
            width: fit-content;
        }

        #join:hover {
            background-color: #E0F2F7;
            color: black;
        }

        .ds-class {
            font-size: 30px;
            border-bottom: 2px solid;
            background-color: cadetblue;
            color: black;

        }

        /* .td-ds {
            border-radius: 15px;
            background-color: #CED8F6;
            border-bottom: 2px solid;
        } */




        .box-father {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            margin-top: 0.5%;
            width: 99%;

        }

        .class-box {
            border: solid;
            border-radius: 5%;
            background-image: url("../../images/class-br.jpg");
            background-size: 99.5%;
            margin: 1%;
            width: 20%;
            height: 200px;
        }
    </style>
</head>

<body>
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../index.php"><img src="../../images/ZaRoom2.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav" style="width:90%">
                        <li class="lia"><a class="btn btn-2 color-green" href="../../index.php" style="font-size: 130%;Font-family : time new roman;">Trang chủ</a></li>
                        <li class="lia"><a class="btn btn-2 color-green" href="../../chat_dversion/listchat.php" style="font-size: 130%;Font-family : time new roman;">Phòng chat</a></li>
                        <a class='button-b' href="../make_friend/./list_request_relation.php"><img src="../../images//addfriend.png" style="height: 40px ;width: 100%;" alt="#" />
                        </a>
                        <h3 style="color: red;font-weight: bold;" id="numRe"><?php echo $i; ?></h3>
                    </ul>
                </div>
                <div class="search-box">
                    <a class="dangxuat" href="../login/logout.php" style="font-size: 18px;Font-family : time new roman;">
                        <img src="../../images/logout.png" style="height: 40px;width:30%;padding:5%;">Đăng xuất</a>
                </div>
            </div>
        </nav>
    </header>
    <section style="padding-top: 100px;" class="heading_main text_align_center">
        <div class="class-header">
            <div>
                <!--           <button class="button" onclick="window.location='../../index.php';"><span>Trở về</span></button> -->
                <button class="button" id="join" onclick="a()">Tham gia lớp học</button>
            </div>
            <div id="form-join" style="width:600px;height:50px;border-radius: 5px; ">
                <form action="class.php" class="join_form" method="POST" style="padding-top: 10px;">
                    <input type="text" class="submit" name="name-class" id="name_class" placeholder=" Nhập tên lớp học"> </input>
                    <input type="text" class="submit" name="code-class" placeholder="Mật khẩu"> </input>
                    <button name="submit" class="button-a" onclick="b()">Tham gia</button>
                </form>
                </form>
            </div>
        </div>
    </section>
    <!-- Danh sach lop da tham gia -->
    <?php

    $query = mysqli_query($conn, "SELECT * FROM users WHERE id='{$_SESSION['SESSION_ID']}'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $id_user = $row['id'];
    }
    $sql = "SELECT * FROM `class_user`,`class`,`users` WHERE class_user.id_class=class.id_class 
                        AND class_user.id_user=users.id AND class_user.id_user=$id_user";
    $result = $conn->query($sql);
    $i = 1;
    //Xử lý kết bạn
    if ($result->num_rows > 0) {
        echo "<span style='font-size:0.1px;'>.</span><br>";
        echo "<div class='box-father'>";
        while ($row = $result->fetch_assoc()) {

            echo "
                    <div class='class-box'>
                                <a class='btn btn-2 color-green' href='./class_in_class.php?nameCla=$row[name_class]&idClass=$row[id_class]' style='color:white; font-size:25px;margin:1%;height:150px;
                                overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 100%;'>
                                $row[name_class] </a><br>" .
                "<a href='./out_class.php?idCla=$row[id_class]&idUser=$id_user'><img src='../../images/delete.png' 
                                style='height: 30px;width:15%; margin:1% 4.5%'/> 
                                </a>
                    </div>";
        };
    } else echo "<h1 class='heading_main text_align_center' style='padding-left: 5%;font-size:30px'>Bạn chưa tham gia lớp học nào!</h1>";
    echo "</div>";



    if (isset($_POST['submit'])) {
        $name_class = $_POST['name-class'];
        $code_class = $_POST['code-class'];
        $result = $conn->query("SELECT * FROM class WHERE name_class='$name_class' AND code = '$code_class'");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $kt = $conn->query("SELECT * FROM class_user WHERE id_class=$row[id_class] AND id_user = $_SESSION[SESSION_ID]");
                if ($kt->num_rows > 0) {
                    echo "<script type='text/javascript'>alert('Đã tham gia lớp này rồi!');</script>";
                } else {
                    $conn->query("INSERT INTO `class_user` (id_class, id_user) VALUE ($row[id_class],$_SESSION[SESSION_ID])");
                    echo "<script type='text/javascript'>alert('Tham gia thành công!');</script>";
                    echo "<script>
                    function direct() {
                        window.location = './class.php';
                    }
                    direct();
                    </script>";
                }
            }
        } else {
            echo "<script type='text/javascript'>alert('Sai tên lớp hoặc mật khẩu!');</script>";
        }
        unset($_POST['submit']);
    }

    ?>



</body>


</html>