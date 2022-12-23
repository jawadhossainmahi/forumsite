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
            <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sticky-footer/">
            <link rel="stylesheet" href="./css/main.css">

      <style>
            #jfif {
                  min-height: 100vh;
            }
      </style>
</head>

<body>
      <?php include 'C:\xampp\htdocs\forumsite\partial\_dbconnect.php' ?>
      <?php include 'C:\xampp\htdocs\forumsite\partial\_header.php' ?>

      <!-- slider starts here -->
      <div id="carouselExampleControls"
           class="carousel slide"
           data-bs-ride="carousel">
            <div class="carousel-inner">
                  <div class="carousel-item active">
                        <img height="400px"
                             width="2400px"
                             src="img/1.jpg"
                             class="d-block w-100"
                             alt="...">
                  </div>
                  <div class="carousel-item">
                        <img height="400px"
                             width="2400px"
                             src="img/2.jpg"
                             class="d-block w-100"
                             alt="...">
                  </div>
                  <div class="carousel-item">
                        <img height="400px"
                             width="2400px"
                             src="img/3.jpg"
                             class="d-block w-100"
                             alt="...">
                  </div>
            </div>
            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                  <span class="carousel-control-prev-icon"
                        aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                  <span class="carousel-control-next-icon"
                        aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
            </button>
      </div>

      <!-- catagory starts here -->
      <div id="jfif"
           class="container justify-content-center align-items-center">
           
            <h2 class="text-center">iDiscuss-catagory</h2>
            <div class="row justify-content-center align-items-center">
            
                  <!-- fetch all the catagory  -->
                  <?php
     $sql = 'SELECT * FROM `catagory`';
     $result = mysqli_query($conn, $sql);
     if ((isset($_SESSION['username']) && $_SESSION['username']=='mahi')) {
      echo "<button id='more_catagory' class='btn w-75 btn-outline-success' data-bs-toggle='modal' data-bs-target='#catagorymodal'>Add more catagory</button>
";
}
      while ($row = mysqli_fetch_assoc($result)) {
            // echo $row['catagory_name'] ;
            // echo ('<br>');
            // echo $row['catagory_description'];
            // echo ('<br>');
            $code_id = $row['catagory_id'];
            $code_name = $row['catagory_name'];
            $code_description = $row['catagory_description'];
            echo '
                  <div class="col-md-3 d-flex m-4 p-0 justify-content-center align-items-center">
                        <div class="card"
                        >
                              <img src="https://source.unsplash.com/random/1040x600/?'.$code_name.'"
                              class="card-img-top"
                              alt="...">
                              <div class="card-body">
                                    <h5 class="card-title"><a href="threadlist.php?code_id='.$code_id .'">'.$code_name .'</a></h5>
                                    <p class="card-text">'. substr($code_description,0,99).'</p>
                                    <a href="threadlist.php?code_id='.$code_id .'"
                                    class="btn btn-success"> Go somewhere</a>';
                                    if (isset($_SESSION['username']) && $_SESSION['username']=='mahi') {
                                          echo "<button class='btn ms-4 m-0 btn-success' ><a class='nav-link' href='./partial/_delete.php?code_id=".$code_id."'>Delete</a></button></h6>";
                                      }
                                    
                              echo '</div>
                        </div>
                  </div>';
      }

                  echo "</div>";
     ?>
     
     

      </div>

      <?php include 'C:\xampp\htdocs\forumsite\partial\_footer.php' ?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
              crossorigin="anonymous"></script>
              <script src="main.js"></script>
</body>

</html>