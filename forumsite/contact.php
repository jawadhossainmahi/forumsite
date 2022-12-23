<!doctype html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta name="viewport"
            content="width=device-width, initial-scale=1">
      <title>Welcome to iDiscus-coading-forum</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous">
            <link rel="stylesheet" href="./css/main.css">

            <style>
            #jfif {
                  min-height: 90vh;
            }
      </style>
</head>

<body>      
      <div class="container-md"></div>
      
      <?php include 'C:\xampp\htdocs\forumsite\partial\_dbconnect.php'?>
      <?php include 'C:\xampp\htdocs\forumsite\partial\_header.php' ?>
<?php
if (isset($_SESSION['login']) && $_SESSION['login'] = true) {
      echo " 
      <div class='container w-80 my-4' >
      <form>
  <div class='mb-3'>
    <label for='exampleInputEmail1' class='form-label'>Email address</label>
    <input type='text' class='form-control' id='username' name='username' aria-describedby='emailHelp'>
    </div>
    <div class='mb-3'>
    <label for='exampleInputPassword1' class='form-label'>Password</label>
    <input type='email' class='form-control' id='email' name='email'>
    <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
  </div>
  <div class='mb-3'>
  <label for='exampleFormControlTextarea1' class='form-label'>Plase type your problem</label>
  <textarea class='form-control' id='problem' name='problem' rows='3'></textarea>
</div>
  <button type='submit' class='btn btn-primary'>Submit</button>
</form>
</div>
";
}
else {
      echo '
      <div class="container">
      <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">hello sir </h4>
            <p>please login or creat an account to contact us.</p>
            <hr>
            <p class="mb-0"><a href="" data-bs-toggle="modal" data-bs-target="#loginmodal" >click here</a> to login</p>
            <p class="mb-0">dont have an account <a href="" data-bs-toggle="modal" data-bs-target="#signupmodal" >click here</a> to creat an account.</p>
          </div>';
}
?>

      <?php include 'C:\xampp\htdocs\forumsite\partial\_footer.php' ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
              crossorigin="anonymous"></script>
</body>

</html>
