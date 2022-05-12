<?php
session_start();
include('../../includes/config.php');
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ../login/index.php");
    die();
}

if (isset($_POST['submit'])) {
    $valuefldr = 'files/';
    $title = $_POST['title-class'];
    $content = $_POST['content-class'];
    $time = date("Y-m-d H:i:s");
    $sql = "INSERT INTO exercise (title_ex, content_ex) VALUES ('$title','$content')";
    mysqli_query($conn, $sql);
    $exer_id = mysqli_insert_id($conn);
    $sql = "INSERT INTO ex_class (id_ex_r, id_class_r) VALUES ($exer_id,$_SESSION[idClass])";
    mysqli_query($conn, $sql);
    foreach ($_FILES['fileUpload']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['fileUpload']['name'][$key];
        $file_size = $_FILES['fileUpload']['size'][$key];
        $file_tmp = $_FILES['fileUpload']['tmp_name'][$key];
        $file_type = $_FILES['fileUpload']['type'][$key];
        $desired_dir = $valuefldr;
        $temp = 0;
        if (move_uploaded_file($file_tmp, "$desired_dir/" . $file_name)) {

            $sql = "INSERT INTO `file` (path_file,`time`) VALUES ('$file_name',NOW())";
            mysqli_query($conn, $sql);
            $file_id = mysqli_insert_id($conn);
            echo $file_id;
            echo $exer_id;
            $sql = "INSERT INTO file_exercise (id_exercise,id_file_exercise) VALUES ($exer_id,$file_id)";
            mysqli_query($conn, $sql);
            header("Location: ./class_in_class_teacher.php");
        } else {
            header("Location: ./class_in_class_teacher.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #E6E6E6;
            Font-family: time new roman;

        }

        .div-father {
            width: 65%;
            height: 440px;
            border-radius: 5px;
            margin-left: 15%;
            margin-top: 5%;
            background-color: none;
        }

        .post-div {
            width: 95%;
            height: 300px;
            border-radius: 5px;
            margin: 0 auto;
            padding-top: 5%;
        }

        #post_form {
            padding: 0.5%;
            background-color: cadetblue;
            border-radius: 5px;
            width: 100%;
            border: 2px solid;

        }

        .post-ul {

            list-style-type: none;

        }

        .post {
            margin-left: 85%;
            width: 10%;
            height: 35px;
            border-color: gray;
            border-radius: 10px;
            font-size: 20px;
        }

        .post-li {
            margin-left: 5%;
            margin-bottom: 1%;
            font-size: 25px;


        }

        .post-title {
            width: 60%;
            height: 20px;
            font-size: 20px;
            padding: 0.5%;
            border-radius: 5px;

        }

        .post-text {
            width: 95%;
            height: 180px;
            font-size: 18px;
            border-radius: 5px;

        }

        .post-file {
            width: 95%;
            font-size: 18px;
            border-radius: 5px;

        }

        .class-header {
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            background-color: cadetblue;
            height: 50px;

        }

        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: cadetblue;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 15px;
            padding: 10px;
            width: 100px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span::after {
            content: '\2190';
            position: absolute;
            opacity: 0;
            top: 0;
            left: 20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-left: 25px;
        }

        .button:hover span::after {
            opacity: 1;
            left: -2px;
        }

        .post:hover {
            border: 2px solid aqua;
            border-radius: 10px;
            box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
            outline-color: rgba(255, 255, 255, 0);
            outline-offset: 15px;
            text-shadow: 1px 1px 2px #427388;
        }

        textarea {
            white-space: pre;
            overflow-wrap: normal;
            overflow-x: scroll;
        }
        
    </style>
</head>

<body>
    <div class="class-header">
        <ul style="list-style-type: none;">
            <li class="span-ve"><button class="button" onclick="window.location='./class_in_class_teacher.php';"><span>Trở về</span></button></li>
        </ul>
    </div>
    <div class="div-father">
        <div id="form-join" class="post-div">
            <form id="post_form" method="POST" enctype='multipart/form-data'>
                <ul class="post-ul">
                    <li>
                        <button type="submit" name="submit" value="Upload" class="post">Đăng</button>
                    </li>
                    <li class="post-li">
                        <label for="title-class" class="form-label">Tiêu đề</label>
                        <input type="text" class="post-title" name="title-class" id="title-class" placeholder=" Nhập tiêu đề">
                        </input>
                    </li>

                    <li class="post-li">
                        <label for="content-class" class="form-label">Nội dung</label>
                        <textarea rows="100" class="post-text" name="content-class" id="content-class" style="resize:none" required></textarea>
                    </li>
                    <li class="post-li">
                        <label for="fileUpload" class="form-label">File đính kèm</label>
                        <input multiple class="post-file" type="file" name="fileUpload[]" id="fileUpload">
                        </input>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</body>

</html>