<?php
     include('../../login/config.php');
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error = array();

        $target_dir = "uploads/";
        $target_file = $target_dir.basename($_FILES['fileUpload']['name']);

        if($_FILES['fileUpload']['name'] > 5*1204*1204){
            $error['fileUpload'] = "File is not over 5MB";
        }

        $file_type = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
        echo $file_type;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="content">
    <form method="POST" encryption="multipart/form-data">
        <input type="file" name="fileUpload" id="fileUpload"></br>
        <input type="submit" name="submit"></br>
    </form>
    </div>
</body>
</html>