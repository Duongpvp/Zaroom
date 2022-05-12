<?php
    session_start();
    include ('././../../includes/config.php');
    
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $email = $row['email'];
    }
  
    
    $zmail = $_POST['mail'];
//   $conn -> set_charset("utf-8");
    $sql_check = "SELECT * FROM `relation` WHERE r_to = '$zmail' AND r_from = '$email'";
    $result_check = $conn->query($sql_check);


    if (($result_check->num_rows > 0) ) {
        echo "<br>";
        echo "<script>alert('Đã gửi lời mời kết bạn rồi!');</script>";
    } else {
        if ($zmail === $email){
            echo "<script>alert('Bạn không thể tự kết bạn với chính mình!');</script>";
            header("Location: ./list_request_relation.php");

        } else {
            $sql = "SELECT * FROM `users` WHERE email = '$zmail'";
    
            echo "<br>";
            // echo $sql;
            echo "<br>";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                $new_relation = "INSERT INTO `relation` (r_from, r_to, request) VALUE ('$email','$_POST[mail]',1)";
                $conn->query($new_relation);
                echo "<script>alert('Gửi lời mời kết bạn thành công!');</script>";
                header("Location: ./list_request_relation.php");

            } else {
                echo "<script>alert('Người dùng này không tồn tại!');</script>";   
                header("Location: ./list_request_relation.php");
 
            }
        }   
    }

?>

<!-- 
    Thắng Lê15:11
thì check trong sql trước
tạo 1 hàm kiểm tra nó đã kết bạn với ai
sau đó ngoại trừ mấy thằng đó ra
tức SELECT * FROM NGUOIDUNG WHERE request = '0';
Thắng Lê15:13
thì sửa request lại thành 0
khi request = 1 thì 2 thằng kết bạn còn = 0 thì 2 thằng không kết bạn
Thắng Lê15:14
phpadmin có đó
bấm delêt
hàng bên dưới kìa
Thắng Lê15:16
sửa bảng relationship lại
A request & B request
A gửi cho B thì A request 1 B = 0
khi cả 2 là 1 thì ok còn = 0 thì thôi
Thắng Lê15:18
giờ tạo 4 cột
A_mail
B_mail
A_request
B_request
A gửi lời mời kết bạn cho B, insert 2 mail & A_request = 1
B_request = 0
khi B đồng ý kết bạn
Thắng Lê15:19
update B_request = 1
khi A gửi lời mời kết bạn cho A
Check(){SELECT * FROM NGUOIDUNG WHERE TAIKHOAN = 'TAIKHOAN'} ==> failed
Thắng Lê15:21
hàm gửi kết bạn cho người đã kết bạn thì cũng thế
check xem A_mail & B_mail có tồn tại thì không gửi được nữa
0k
 -->