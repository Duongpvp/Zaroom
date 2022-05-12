<?php 
$path = "./files/".$_GET['filename'];
$filename = $_GET['filename'];
$typePath = pathinfo($filename,PATHINFO_EXTENSION);

switch ($typePath){
    case "doc":
        header("Content-type: application/msword");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Content-Length: " . filesize($path));
        readfile($path);
        break;
    case "docx":
        header("Content-type: application/msword");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Content-Length: " . filesize($path));
        readfile($path);
        break;
    case "xlsx":
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Content-Length: " . filesize($path));
        readfile($path);
        break;
    case "jpg":
        header("Content-type: image/jpeg");
        header("Content-Length: " . filesize($path));
        readfile($path);
        break;
    case "png":
        header("Content-type: image/png");
        header("Content-Length: " . filesize($path));
        readfile($path);
        break;
    case "zip":
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Content-Length: " . filesize($path));
        readfile($path);
        break;
    case "rar":
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Content-Length: " . filesize($path));
        readfile($path);
        break;
    case "pdf":
        header("Content-type: application/pdf");
        header("Content-Length: " . filesize($path));
        readfile($path);
        break;
    default:
        header("Content-type: text/plain");
        header("Content-Disposition: attachment; filename=".$filename);
        header("Content-Length: " . filesize($path));
        readfile($path);
    
}  
// Header content type
// header("Content-type: application/msword");
// header('Content-Disposition: attachment; filename="downloaded.doc"');
// header("Content-Length: " . filesize($filename));
  
// // Send the file to the browser.
// readfile($filename);
?>