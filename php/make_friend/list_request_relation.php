<?php
session_start();
include('././../../includes/config.php');
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $email = $row['email'];
    if ($row['permission'] == 0) {
        $p = "../class/class.php";
    } else if ($row['permission'] == 1) {
        $p = "../class/class_teacher.php";
    }
}

$sql = "SELECT * FROM `relation` WHERE r_to = '$email' AND request = 1";
$result = $conn->query($sql);
$i = $result->num_rows;


//   $conn -> set_charset("utf-8");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRIENDS</title>

    <link rel="stylesheet" href="../../css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="../../css/pogo-slider.min.css" />
    <!-- Site CSS -->
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../../css/responsive.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../css/custom.css" />
    <link rel="stylesheet" href="./style.css">
    <script src="./autoload.js"></script>
    <style>
       

        .mau {
            color: black;
            text-shadow: 0 0 30px white;
            font-size: 30px;
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
                        <li class="lia"><a class="btn btn-2 color-green" href="../../index.php" style="font-size: 130%;Font-family : time new roman;">Trang ch???</a></li>
                        <li><a class="btn btn-2 color-green" href="<?php echo $p; ?>" style="font-size: 130%;Font-family : time new roman;">L???p h???c</a></li>

                        <li class="lia"><a class="btn btn-2 color-green" href="../../chat_dversion/listchat.php" style="font-size: 130%;Font-family : time new roman;">Ph??ng chat</a></li>

                    </ul>
                </div>
                <div class="search-box">
                    <a class="dangxuat" href="../login/logout.php" style="font-size: 18px;Font-family : time new roman;color:none;">
                        <img src="../../images/logout.png" style="height: 40px;width:30%;padding:5%;">????ng xu???t</a>
                </div>
            </div>
        </nav>
    </header>



    <div class="box-father">
        <div class="box-con">
            <div class=" box-conn1">
                <div class="themban">
                    <form action="list_request_relation.php" class="submit-form" method="post">
                        <ul class="ul-timkiem">
                            <li class="li-timkiem" style="padding-top: 20px;"><input class="to_mail" name="mail" type="text" placeholder="T??m ki???m tr??n ZaRoom"></input></li>
                            <li class="li-timkiem"><button class="button-a" style="width: 50%; height:45px; margin-bottom:3%;">
                                    <img src="../../images/ketban.png " style="width:18%; margin: 1% auto;">Th??m b???n</button></li>
                        </ul>
                        <h1 class="h1" style="color:#000;">L???i m???i k???t b???n</k1>
                    </form>

                </div>
                <div class="box-chau">
                    <table>
                        <?php
                        if (isset($_POST['mail'])) {
                            $zmail = $_POST['mail'];
                            $sql_check = "SELECT * FROM `relation` WHERE r_to = '$zmail' AND r_from = '$email'";
                            $result_check = $conn->query($sql_check);


                            if (($result_check->num_rows > 0)) {
                                echo "<br>";
                                echo "<script>alert('???? g???i l???i m???i k???t b???n r???i!');</script>";
                            } else {
                                if ($zmail === $email) {
                                    echo "<script>alert('B???n kh??ng th??? t??? k???t b???n v???i ch??nh m??nh!');</script>";
                                } else {
                                    $sql = "SELECT * FROM `users` WHERE email = '$zmail'";

                                    echo "<br>";
                                    // echo $sql;
                                    echo "<br>";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $new_relation = "INSERT INTO `relation` (r_from, r_to, request) VALUE ('$email','$_POST[mail]',1)";
                                        $conn->query($new_relation);
                                        echo "<script>alert('G???i l???i m???i k???t b???n th??nh c??ng!');</script>";
                                    } else {
                                        echo "<script>alert('Ng?????i d??ng n??y kh??ng t???n t???i!');</script>";
                                    }
                                }
                            }
                        }

                        #echo $email;
                        // Truy v???n c??c y??u c???u
                        $sql = "SELECT * FROM `relation` WHERE r_to = '$email' AND request = 1";
                        $result = $conn->query($sql);
                        $i = 1;
                        //X??? l?? k???t b???n
                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='mail-ten' >
                        <span class='mau'>
                            " . $row['r_from'] . "</span>"
                                    . "<a  class='button-a' style='color:black' href='./accept_relation.php?idRel=$row[id]'>
                             <img src='../../images/chapnhan.png'style='height: 25px;width:4.5%;padding-bottom:0.5%'> Ch???p nh???n </a>" .
                                    "<a class='button-a' style='color:red;margin-left:3px' href='./refure_relation.php?idRel=$row[id]'> 
                            <img src='../../images/tuchoi.png'style='height: 30px;width:6%;padding-bottom:0.5% '> T??? ch???i </a>" . "</div>";
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="box-con">
            <div class=" box-conn1">
                <h1 class="h1" style="padding:2% ; color:#000;">Danh s??ch b???n b??</h1>
                <?php
                include('././../../includes/config.php');
                $sql_test = "SELECT r_from, id FROM realtion";
                //               $sql_test = "select r_from, id, FROM relation";
                //              $result_test = $conn->query($sql_test);
                // $item = $result_test->fetch_all();

                //L???y email c???a ng?????i ????ng ????ng nh???p  
                $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
                if (mysqli_num_rows($query) > 0) {
                    $row = mysqli_fetch_assoc($query);
                    $email = $row['email'];
                }

                #echo $email;
                // Truy v???n c??c y??u c???u



                // else echo"B???n kh??ng c?? l???i m???i k???t b???n n??o! <br>";
                //Truy xu???t danh s??ch b???n b?? v?? <img src='../../images/delete_friens.png'>
                $sql_friend_t = "SELECT * FROM `relation` WHERE r_to = '$email' AND request = 0";
                $result_friend_t = $conn->query($sql_friend_t);
                if ($result_friend_t->num_rows > 0) {

                    while ($row_friend_t = $result_friend_t->fetch_assoc()) {
                        echo "<div  class='ds-ban'>
                        <span class='mau'>
                    $row_friend_t[r_from] </span>
                        <a class='button-a' style='color:red;' href='./refure_relation.php?idRel=$row_friend_t[id]'>             
                            <img src='../../images/delete_frients.png'style='height: 25px;width:4.5%;padding-bottom:0.5%'> Xo?? b???n </a>
                            </div>
                            <p></p>";
                    }
                }
                $sql_friend_f = "SELECT * FROM `relation` WHERE r_from = '$email' AND request = 0";
                $result_friend_f = $conn->query($sql_friend_f);
                if ($result_friend_f->num_rows > 0) {
                    while ($row_friend_f = $result_friend_f->fetch_assoc()) {
                        echo "<div class='ds-ban' >
                        <span class='mau'>
                            $row_friend_f[r_to]
                            <a class='button-a' style='color:red' href='./refure_relation.php?idRel=$row_friend_f[id]'>
                            <img src='../../images/delete_frients.png'style='height: 25px;width:4.5%;padding-bottom:0.5%;'> Xo?? b???n </a>
                            </div>";
                    }
                }
                ?>
            </div>
        </div>

        </li>
    </div>



    <div class="request_from"></div>
    <script src="./autoload.js"></script>

</body>

</html>