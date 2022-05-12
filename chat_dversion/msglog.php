<html>

</style>

<head>
    <link rel="stylesheet" href="./css/style.css" />
</head>

</html>
<?php
session_start();
include('../includes/config.php');
$sql = "SELECT * FROM messages";
//WHERE room_chat.id_room = $_SESSION[ID_ROOM] AND room_chat.id_msg=messages.id_msg;
$result = $conn->query($sql);

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $email = $row['email'];
}

$friend_mail = $_SESSION['EMAIL_FRIEND'];
// echo $email;
// echo $friend_mail;
$query1 = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['EMAIL_FRIEND']}'");
if (mysqli_num_rows($query1) > 0) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $month_sent = substr($row['date_sent'], 5, 2);
            $day_sent = substr($row['date_sent'], 8, 2);
            $year_sent = substr($row['date_sent'], 0, 4);
            $a = (string)$row['user_from'];
            $b = (string)$row['user_to'];

            if ($a == $email && $b == $friend_mail) {
                echo '
                        
                            <div class="msg-user">
                                    <div class="info-msg-user" >
                                    <span class="time-sent" style="color:black;">' . $row['date_sent'] . '&emsp;</span><p class="body-msg"style="color:black;"> ' . $row['body'] . '</p> 
                                    </div>
                            </div>
                        ';
            }
            if ($a == $friend_mail && $b == $email) {
                echo '
                        
                            <div class="msg">
                                    <div class="info-msg">
                                    <p class="body-msg"style="color:black;">   ' . $row['body'] . ' </p><span class="time-sent"style="color:black;">&emsp;' . $row['date_sent'] . '</span>
                                    </div>
                            </div>
                        ';
            }
        }
    }
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $month_sent = substr($row['date_sent'], 5, 2);
            $day_sent = substr($row['date_sent'], 8, 2);
            $year_sent = substr($row['date_sent'], 0, 4);
            $a = (string)$row['user_from'];
            $b = (string)$row['user_to'];

            if ($a == $email && $b == $friend_mail) {
                echo '
                            
                                <div class="msg-user">
                                        <div class="info-msg-user">
                                        <span class="time-sent"style="color:black;">' . $row['date_sent'] . '&emsp;</span><p class="body-msg"style="color:black;"> ' . $row['body'] . '</p> 
                                        </div>
                                </div>
                            ';
            }

            if ($a != $email && $b == $friend_mail) {
                echo '
                            
                                <div class="msg">
                                        <div class="info-msg">
                                        <span class ="time-sent"><b style="color:black;">' . $a . '</b></span>
                                        <p class="body-msg"style="color:black;">   ' . $row['body'] . ' </p><span class="time-sent"style="color:black;">&emsp;' . $row['date_sent'] . '</span>
                                        </div>
                                </div>
                            ';
            }
        }
    }
}




?>