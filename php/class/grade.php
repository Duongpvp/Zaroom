<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css" />
</head>
<body>
    <style>
        img{
                width: 20px;
                height: 20px;
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
        table{
            font-size: 15px;
        }
        th{
            width: 22%;
            text-align: left;
            font-size: 20px;
            border-bottom: solid;
        }
        #email{
            width: 13%;
        }
        #update{
            width: 5%;
            
            border-bottom: none;
        }
        #th_score{
            width: 5%;
        }
        #score{
            width: 50%;
            height: 15px;
            font-size: 15px;
        }
        #submit{
            width: 90%;
            height: 20px;
            font-size: 15px;
        }
    </style>
    <div class="class-header" style="margin-bottom:2%;">
        <ul style="display:flex;">   
            <li><button class="button" onclick="window.location='./class_in_class_teacher.php';"><span>Trở về</span></button></li>
            </ul>
    </div>
</body>
</html>
<?php
    session_start();
    include ('../../includes/config.php');
    if(isset($_GET['idEx'])){
        $_SESSION['idEx']=$_GET['idEx'];
        $idEx = $_SESSION['idEx'];
        $x=$idEx;
        }else{
            $idEx=$_SESSION['idEx'];
            $x=$idEx;
        }
    $i = "";
    $result = $conn->query("SELECT * FROM submissions WHERE id_ex_r=$idEx");
    echo '<table>'
        ;
            // if($i==0){
            echo"<tr>
                <th id='email'>Email</th>
                <th>Bài tập</th>
                <th id='th_score'>Điểm</th>
                <th id='update'></th>
            </tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //$_SESSION['ID_SUB'] = $row["id_sub"];

            echo '<tr ">
                <td >
                ';
                if($row['email_sub']!=$i){
                echo $row['email_sub'];
                    $i=$row['email_sub'];
                }else{echo "<br>";} 
                echo'<form action="update_score.php" method="POST">
                <input type="text" name="id" value="'.$row['id_sub'].'" style="display:none;" ></input>
                </td>

                <td>';
                $typePath = pathinfo($row['file_sub'],PATHINFO_EXTENSION);
                    if($typePath!=null){
                    switch ($typePath){
                        case "doc":
                            echo "<a href='view_file.php?filename=$row[file_sub]'><img src='./img/doc.png'> $row[file_sub]</a>";
                            break;
                        case "docx":
                            echo "<a href='view_file.php?filename=$row[file_sub]'><img src='./img/doc.png'> $row[file_sub]</a>";
                            break;
                        case "xlsx":
                            echo "<a href='view_file.php?filename=$row[file_sub]'><img src='./img/excel.jpg'> $row[file_sub]</a>";
                            break;
                        case "jpg":
                            echo "<a href='view_file.php?filename=$row[file_sub]'><img src='./img/image.jpg'> $row[file_sub]</a>";
                            break;
                        case "png":
                            echo "<a href='view_file.php?filename=$row[file_sub]'><img src='./img/image.jpg'> $row[file_sub]</a>";
                            break;
                        case "zip":
                            echo "<a href='view_file.php?filename=$row[file_sub]'><img src='./img/zip.jpg'> $row[file_sub]</a>";
                            break;
                        case "rar":
                            echo "<a href='view_file.php?filename=$row[file_sub]'><img src='./img/zip.jpg'> $row[file_sub]</a>";
                            break;
                        case "pdf":
                            echo "<a href='view_file.php?filename=$row[file_sub]'><img src='./img/pdf.png'> $row[file_sub]</a>";
                            break;
                        default:
                            echo "<a href='view_file.php?filename=$row[file_sub]'><img src='./img/default.png'> $row[file_sub]</a>";
                        
                    }
                }else{break;}
                echo'</td>
            
                <td>
                    <input type=number name="score" id="score" placeholder=".../100" value="'.$row['score'].'"></input>
                </td>
            
                <td>
                    <button type="submit" id="submit" name="submit">Chấm điểm</button>
                </td></form>
            </tr>
            ';
    }
}echo '</table>
';
?>