<?php
    include ('../includes/config.php');
    $query = mysqli_query($conn, "SELECT * FROM user WHERE email='{$_SESSION['SESSION_EMAIL']}'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        echo $row['name'];
        echo $row['id'];
    } else {
        echo "Your code have a problem....";
    }
    echo $user;
?>
