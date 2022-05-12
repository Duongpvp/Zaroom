<?php
session_start();
include ('../includes/config.php');

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $email = $row['email'];
    $id_user = $row['id'];
}
$emailFriend = "";


//echo $name;
//echo $emailFriend;
//echo $name;
// $idFriend=0;
if(isset($_GET['idR'])){
    $emailFriend = $_GET['idR'];
$result = $conn->query("SELECT * FROM `users` WHERE email='$emailFriend'");
if ($result->num_rows > 0) {
    $result = $conn->query("SELECT * FROM `room` WHERE room.name_room=CONCAT('$email','$emailFriend') OR room.name_room=CONCAT('$emailFriend','$email')");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $_SESSION['ID_ROOM'] = $row['id_room'];
            $_SESSION['EMAIL_FRIEND'] = $emailFriend;
            header("Location: listchat.php");
            exit;
        }
    } else {
        $new_room = "INSERT INTO `room` (`name_room`, `date_create`) VALUE (CONCAT('$email','$emailFriend'),NOW())";
        $conn->query($new_room);
        $_SESSION['EMAIL_FRIEND'] = $emailFriend;
        header("Location: listchat.php");
        exit;
    }
}   
}//chat room
if(isset($_GET['idN'])){
    $name = $_GET['idN'];
    echo $name;
    $result = $conn->query("SELECT * FROM `room` WHERE room.name_room='$name'");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['EMAIL_FRIEND'] = $name;
            header("Location: listchat.php");
            exit;
        }
    }
}
