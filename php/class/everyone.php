<?php
session_start();
include('../../includes/config.php');
if (isset($_GET['idClass'])) {
    $_SESSION['idClass'] = $_GET['idClass'];
    $_SESSION['nameClass'] = $_GET['nameCla'];
}
$query = mysqli_query($conn, "SELECT * FROM users WHERE id='{$_SESSION['SESSION_ID']}'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $id_user = $row['id'];
    $email = $row['email'];
}
$sql = "SELECT * FROM `relation` WHERE r_to = '$email' AND request = 1";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<body>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo $_SESSION['nameClass']; ?></title>
        <link rel="stylesheet" href="../../chat_dversion/css/style.css" />
        <link rel="stylesheet" href="./style.css" />

        <style>
            .options {
                font-weight: bolder;
                text-align: center;
            }

            .options span {
                padding: 0.5%;
                font-size: 20px;
                border-radius: 10px;
            }

            .options a {
                text-decoration: none;
                color: black;
            }

            .options span:hover {
                background-color: azure;
            }

            .list {
                margin-left: 30%;
                margin-top: 5%;
            }

            .list-name {
                margin: 4% 0;
                width: 50%;
            }

            .list-name h3 {
                margin: 2% 0;
                border-bottom: 2px solid;
                font-size: 28px;
                color: black;

            }

            .list-name h4 {
                margin: 3%;
                font-size: 25px;
                color: black;
                border-bottom: 1px solid;

            }

            .mau {
                color: black;
                text-shadow: 0 0 10px gray;
            }

            .ds {
                font-size: 30px;
            }
        </style>

    </head>
    <div class="class-header" style="margin-bottom:2%;">
        <ul style="display:flex;width:95%">
            <li><button class="button" onclick="window.location='./class.php';"><span style="font-size:20px">Trở về</span></button></li>
            <li id="li"><span class="nameCla"><?php echo $_SESSION['nameClass']; ?> </span> </li>
        </ul>
    </div>
    <div class='options'>
        <a href="./class_in_class.php"><span class="mau" style="font-size:30px">Tin tức</span></a>
        <a href="./everyone.php"><span class="mau" style="text-decoration-line:underline;font-size:30px">Mọi người</span></a>
    </div>
</body>

</html>
<?php
echo "<div class='list'>";
$result = $conn->query("SELECT * FROM `class`, `class_user`,`users` WHERE class_user.id_class=$_SESSION[idClass] 
     AND class_user.id_user=users.id AND class_user.id_class=class.id_class");
echo "<div class='list-name'>
            <h3 id='name-teacher'style='text-align: center;'><b class='mau'>Giáo viên</b><br></h3>";
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "
                 <h4>$row[email_teacher]</h4>";
}
echo "</div>";
echo "<div class='list-name'><h3 id='name-student'style='text-align: center;'><b class='mau'>Danh sách thành viên</b><br></h3>";
$result = $conn->query("SELECT * FROM `class`, `class_user`,`users` WHERE class_user.id_class=$_SESSION[idClass] 
            AND class_user.id_user=users.id AND class_user.id_class=class.id_class");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
                 <h4>$row[email]</h4>";
    }
}
echo "</div></div>";
?>