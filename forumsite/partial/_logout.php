<?php
session_start();
echo 'logging you out, please wait...';
session_unset();
session_destroy();
header('location:/forumsite/index.php');
?>