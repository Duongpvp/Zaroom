<?php
session_start();
include('../../includes/config.php');
if (isset($_GET['idEx'])) {
    $_SESSION['idEx'] = $_GET['idEx'];
    $idEx = $_SESSION['idEx'];
    $x = $idEx;
} else {
    $idEx = $_SESSION['idEx'];
    $x = $idEx;
}
$result = $conn->query("SELECT * FROM `exercise` WHERE id_ex=$idEx");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = $row['title_ex'];
        $content = $row['content_ex'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            margin-top: -6%;
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
            margin-left: 80%;
            width: 15%;
            height: 40px;
            border-color: gray;
            border-radius: 25px;
            font-size: 20px;
        }

        .post-li {
            margin-left: 5%;
            margin-bottom: 1%;
            font-size: 25px;


        }

        .post-title {
            width: 94%;
            height: 100px;
            font-size: 20px;
            border-radius: 5px;

        }

        .post-text {
            width: 95%;
            height: 200px;
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
            border: 2px solid blue;
            border-radius: 15px;
            box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
            outline-color: rgba(255, 255, 255, 0);
            outline-offset: 15px;
            text-shadow: 0px 0px 10px blue;
        }

        textarea {
            white-space: pre;
            overflow-wrap: break-word;
            overflow-x: scroll;
        }

        img {
            width: 20px;
            height: 20px;
        }

        .file-ex {
            font-size: 15px;
        }

        .ex {
            font-size: 25px;
            color: black;
            padding: 1%;
            margin: 1%;
            text-decoration: none;
            margin-bottom: 2%;
        }

        .ex:hover {
            color: blue;
        }

        .e {
            margin: 1%;
            font-size: 25px;
            border: 1px solid;
            border-radius: 5px;
            text-decoration: none;
            color: black;
            background-color: white;
        }

        .e:hover {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <div class="class-header" style="margin-bottom:2%;">
        <ul style="display:flex;">
            <li><button class="button" onclick="window.location='./class_in_class_teacher.php';"><span style="font-size:18px">Trở về</span></button></li>
        </ul>
    </div>
    <div class="div-father">
        <div id="form-join" class="post-div">
            <form action="add_file_ex.php" id="post_form" method="POST" enctype='multipart/form-data'>
                <ul class="post-ul">
                    <li>
                        <button type="submit" name="submit" value="submit" class="post">Cập nhật</button>
                    </li>

                    <li class="post-li">
                        <label for="title-class" class="form-label">Tiêu đề</label>
                        <textarea type="text" class="post-title" name="title-class" id="title-class" style="resize:none" required><?php echo $title; ?></textarea>
                    </li>

                    <li class="post-li">
                        <label for="content-class" class="form-label">Nội dung</label>
                        <textarea type="text" class="post-text" name="content-class" id="content-class" style="resize:none" required><?php echo $content; ?></textarea>
                    </li>
                    <div class="file_ex">
                        <?php
                        $result1 = $conn->query("SELECT * FROM `exercise`,`file`,`file_exercise` WHERE file.id_file=file_exercise.id_file_exercise AND file_exercise.id_exercise = exercise.id_ex AND file_exercise.id_exercise = $x");
                        if ($result1->num_rows > 0) {
                            while ($row1 = $result1->fetch_assoc()) {
                                $typePath = pathinfo($row1['path_file'], PATHINFO_EXTENSION);
                                if ($typePath != null) {
                                    switch ($typePath) {
                                        case "doc":
                                            echo "<a class='ex' href='view_file.php?filename=$row1[path_file]'><img src='./img/doc.png'> $row1[path_file]</a>
                                <a class='e' href='delete_file_ex.php?idFile=$row1[id_file]'>Xoá</a><br>";
                                            break;
                                        case "docx":
                                            echo "<a class='ex' href='view_file.php?filename=$row1[path_file]'><img src='./img/doc.png'> $row1[path_file]</a>
                                <a class='e' href='delete_file_ex.php?idFile=$row1[id_file]'>Xoá</a><br>";
                                            break;
                                        case "xlsx":
                                            echo "<a class='ex' href='view_file.php?filename=$row1[path_file]'><img src='./img/excel.jpg'> $row1[path_file]</a>
                                <a class='e' href='delete_file_ex.php?idFile=$row1[id_file]'>Xoá</a><br>";
                                            break;
                                        case "jpg":
                                            echo "<a class='ex' href='view_file.php?filename=$row1[path_file]'><img src='./img/image.jpg'> $row1[path_file]</a>
                                <a class='e' href='delete_file_ex.php?idFile=$row1[id_file]'>Xoá</a><br>";
                                            break;
                                        case "png":
                                            echo "<a class='ex' href='view_file.php?filename=$row1[path_file]'><img src='./img/image.jpg'> $row1[path_file]</a>
                                <a class='e' href='delete_file_ex.php?idFile=$row1[id_file]'>Xoá</a><br>";
                                            break;
                                        case "zip":
                                            echo "<a class='ex' href='view_file.php?filename=$row1[path_file]'><img src='./img/zip.jpg'> $row1[path_file]</a>
                                <a class='e' href='delete_file_ex.php?idFile=$row1[id_file]'>Xoá</a><br>";
                                            break;
                                        case "rar":
                                            echo "<a class='ex' href='view_file.php?filename=$row1[path_file]'><img src='./img/zip.jpg'> $row1[path_file]</a>
                                <a class='e' href='delete_file_ex.php?idFile=$row1[id_file]'>Xoá</a><br>";
                                            break;
                                        case "pdf":
                                            echo "<a class='ex' href='view_file.php?filename=$row1[path_file]'><img src='./img/pdf.png'> $row1[path_file]</a>
                                <a class='e' href='delete_file_ex.php?idFile=$row1[id_file]'>Xoá</a><br>";
                                            break;
                                        default:
                                            echo "<a class='ex' href='view_file.php?filename=$row1[path_file]'><img src='./img/default.png'> $row1[path_file]</a>
                                <a class='e' href='delete_file_ex.php?idFile=$row1[id_file]'>Xoá</a><br>";
                                    }
                                } else {
                                    break;
                                }
                            }
                        }
                        echo "<br>"
                        ?></div>
                    <li class="post-li" >
                        <label for="file" class="form-label">File đính kèm</label>
                        <input multiple class="post-file" type="file" name="file[]" id="file">
                        </input>
                    </li>
                    </li>
                </ul>
            </form>
            </form>
        </div>
</body>

</html>