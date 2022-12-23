<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'C:\xampp\htdocs\forumsite\partial\_dbconnect.php';

    $user_name = $_POST['signupname'];
    $user_email = $_POST['signupemail'];
    $user_pass = $_POST['signup_password'];
    $user_cpass = $_POST['signup_cpassword'];

    $user_name = str_replace('<', '&lt', $user_name);
    $user_name = str_replace('>', '&gt', $user_name);
    $user_email = str_replace('<', '&lt', $user_email);
    $user_email = str_replace('>', '&gt', $user_email);
    $user_pass = str_replace('<', '&lt', $user_pass);
    $user_pass = str_replace('>', '&gt', $user_pass);
    $user_cpass = str_replace('<', '&lt', $user_cpass);
    $user_cpass = str_replace('>', '&gt', $user_cpass);

    $error_user = "SELECT * FROM `users` WHERE user_email= '$user_email' ";
    $result = mysqli_query($conn, $error_user);
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0) {
        header('location: /forumsite/index.php?signup_success=used_name');
        exit();
    } else {
        if ($user_name == null || $user_email==null) {
            header('location: /forumsite/index.php?signup_success=null_name');
            exit();
        } elseif ($user_pass == null && $user_cpass == null) {
            header('location: /forumsite/index.php?signup_success=null_pass');
            exit();
        } elseif ($user_pass == $user_cpass && $user_pass != null && $user_cpass != null) {

            $hash = password_hash($user_pass, PASSWORD_DEFAULT);

            $sqli = "INSERT INTO `users` ( `username`, `user_pass`, `user_email`, `timestamp`) VALUES ('$user_name', '$hash','$user_email', current_timestamp())";
            $result = mysqli_query($conn, $sqli);
            // $row2 = mysqli_fetch_assoc($result);
            if ($result) {
                header('location: /forumsite/index.php?signup_success=true');
                exit();
            }
        } 
        else {
            header("location: /forumsite/index.php?signup_success=false");
            exit();
        }
    }
}

?>