<?php
session_start();
// session_unset();
// session_destroy();
echo '   <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="index.php">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>-->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Top Catagories
        </a>
        <ul class="dropdown-menu">';
        $sql = "SELECT catagory_name, catagory_id FROM `catagory` limit 4";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<li><a class="dropdown-item"  href="threadlist.php?code_id='.$row['catagory_id'].'">'.$row['catagory_name'].'</a></li>';
        }
          
       
       echo  ' </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      
    </ul>
    <form method="get" action="search.php" class="d-flex" role="search">
          <input class="form-control me-2" type="search" id="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
    </form>';


if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
  echo "
  <div class='flex-shrink-0 m-2 text-light'>
  <a href='user_id.php' ><img src='img/user.png'
   width='54px'
   alt='...'> </a>
</div> 
<button class='btn btn-outline-success' ><a class='nav-link' href='partial/_logout.php'>logout</a></button>";
} 
else {
  echo '<div class="m-2">
          <button class="btn btn-outline-success"
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#loginmodal">login</button>
          <button class="btn btn-outline-success"
            data-bs-toggle="modal"
            data-bs-target="#signupmodal">sign in</button>
        </div>';
}
echo '</div>
      </div>
      </nav>';
include 'C:\xampp\htdocs\forumsite\partial\_logic_get_alert.php';
include 'C:\xampp\htdocs\forumsite\partial\_login-modal.php';
include 'C:\xampp\htdocs\forumsite\partial\_signup-modal.php';
include 'C:\xampp\htdocs\forumsite\partial\_catagorry-modal.php';


?>