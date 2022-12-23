<?php
$show_error = 'false';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'C:\xampp\htdocs\forumsite\partial\_dbconnect.php';

    $loginName = $_POST['loginName'];
    $loginPass = $_POST['loginPass'];
    $loginName = str_replace('<', '&lt', $loginName);
    $loginName = str_replace('>', '&gt', $loginName);
    $loginPass = str_replace('<', '&lt', $loginPass);
    $loginPass = str_replace('>', '&gt', $loginPass);
    $sql = "SELECT * FROM `users` WHERE username = '$loginName'";
    $result = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($result);
    if ($loginName == null) {
        header('location:/forumsite/index.php?username=null');
        exit();
    } elseif ($num_row == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($loginPass == null) {
            header('location:/forumsite/index.php?pass=none');
            exit();
        }
        if (password_verify($loginPass, $row['user_pass'])) {
            $sql2 = "SELECT * FROM `users` WHERE username = '$loginName'";
            $result2 = mysqli_query($conn, $sql);
            $user_sno_fetch = mysqli_fetch_assoc($result2);
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['username'] = $loginName;
            $_SESSION['user_sno'] = $user_sno_fetch['sno'];
            echo "login " . $_SESSION['username'] . "";
            header('location:/forumsite/index.php?pass=correct');
            exit();
        } else {
            header('location:/forumsite/index.php?pass=false');
            exit();
        }
    } else {
        header('location:/forumsite/index.php?username=none');
        exit();
    }


}
?>