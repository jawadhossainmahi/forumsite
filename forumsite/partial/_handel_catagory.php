<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'C:\xampp\htdocs\forumsite\partial\_dbconnect.php';

    $catagory_name = $_POST['catagory_name'];
    $catagory_description = $_POST['catagory_description'];


    $catagory_name = str_replace('<', '&lt', $catagory_name);
    $catagory_name = str_replace('>', '&gt', $catagory_name);
    $catagory_description = str_replace('<', '&lt', $catagory_description);
    $catagory_description = str_replace('>', '&gt', $catagory_description);
    $error_user = "SELECT * FROM `catagory` WHERE catagory_name= '$catagory_name' ";
    $result = mysqli_query($conn, $error_user);
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        header('location: /forumsite/index.php?catagory=exist');
        exit();
    } else {
        $sqli = "INSERT INTO `catagory` ( `catagory_name`, `catagory_description`, `created`) VALUES ('$catagory_name', '$catagory_description', current_timestamp())";
        $result = mysqli_query($conn, $sqli);
        header('location: /forumsite/index.php?catagory=created');
        exit();
    }
}
?>