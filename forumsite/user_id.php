<!doctype html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta name="viewport"
            content="width=device-width, initial-scale=1">
      <title>Welcome to iDiscus-coading-forum</title>
      <link rel="stylesheet" href="css/user_id.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous">
            <link rel="stylesheet" href="./css/main.css">

            <style>
            .container {
                  min-height: 90vh;
            }
      </style>
</head>

<body>      
      
      <?php include 'C:\xampp\htdocs\forumsite\partial\_dbconnect.php'?>
      <?php include 'C:\xampp\htdocs\forumsite\partial\_header.php' ?>
      <div id="jfif" class="container id">
            <img src="img/user.png" height="200px" alt="">
            <h4 class="details username">user</h4>
            <div class="box">
            <p class="details">Username</p><span>:</span>
            <p class="details">Email address</p><span>:</span>
            <p class="details">Joinning date</p><span>:</span></div>
      </div>



      <?php include 'C:\xampp\htdocs\forumsite\partial\_footer.php' ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
              crossorigin="anonymous"></script>
</body>

</html>
