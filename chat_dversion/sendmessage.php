<?php
    // Kết nối database, lấy dữ liệu chung
    session_start();
    include ('../includes/config.php');

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $name = $row['email'];
    }

    // Khai báo các biến gán với dữ liệu nhận được
    $body_msg = mysqli_real_escape_string($conn, $_POST['body_msg']);
    // Xử lý chuỗi $body_msg
    $body_msg = htmlentities($body_msg);
    $body_msg = trim($body_msg);
    echo $body_msg;

    // Nếu $body_msg khác rỗng --> Thêm messages
    if ($body_msg != '') {
        $query_send_msg = mysqli_query($conn, "INSERT INTO messages VALUES (
                '',
                '$body_msg',
                '$name',
                '$_SESSION[EMAIL_FRIEND]',
                NOW()
            )");
    } else {
        echo "Error";
    }


?>