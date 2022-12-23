<?php
include 'C:\xampp\htdocs\forumsite\partial\_dbconnect.php';
if (isset($_GET['thread_id'])) {
    $id = $_GET['code_id'];
    $thread_id = $_GET['thread_id'];
    $sql = "DELETE FROM `threads` WHERE `threads`.`thread_id` = '$thread_id'";
    $result = mysqli_query($conn, $sql);
    header("location:/forumsite/threadlist.php?code_id=".$id."");
    exit();
}

if (isset($_GET['code_id'])) {
    $code_id = $_GET['code_id'];
    $sql = "DELETE FROM `catagory` WHERE `catagory`.`catagory_id` = '$code_id'";
    $result = mysqli_query($conn, $sql);
    header("location:/forumsite/index.php");
    exit();
}

if (isset($_GET['comments_id'])) {
    $thread_id = $_GET['thread_id'];
    $comments_id = $_GET['comments_id'];
    $sql = "DELETE FROM `comments` WHERE `comments`.`comments_id` = '$comments_id'";
    $result = mysqli_query($conn, $sql);
    header("location:/forumsite/thread.php?thread_id=".$thread_id."");
    exit();
}
?>