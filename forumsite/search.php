

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
                  #jfif{
                        min-height: 90vh;
                  }
            </style>
</head>
<body>
    <?php include 'C:\xampp\htdocs\forumsite\partial\_dbconnect.php' ?>
      <?php include 'C:\xampp\htdocs\forumsite\partial\_header.php' ?>
      <?php
    $search = $_GET['search'];
    $search = str_replace('<', '&lt', $search);
    $search = str_replace('>', '&gt', $search);
    ?>
      



          <div class="container  my-3">
            <h2 class="text-center">Search results for <em>"<?php echo $search?>"</em></h2>
            <?php
      $search_result = true;
    $sql = "SELECT * FROM threads WHERE MATCH (thread_title, thread_desc) against('$search')";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $thread_id = $row['thread_id'];
        $title = $row['thread_title'];
        $thread_description = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];
        $thread_time = $row['timestamp'];
        $sql2 = "SELECT * FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $num_row = mysqli_fetch_assoc($result2);
        $user_email = $num_row['user_email'];
        $search_result = false;
    echo " 
    <div class='d-flex my-4'>
<div class='flex-shrink-0'>
   <img src='img/user.png'
   width='54px'
   alt='...'>
</div>
<div class='flex-grow-1 ms-3'>
<h5 class='my-0'><a class='text-dark' href='thread.php?threadid=" . $thread_id . "'>" . $title . "</a></h5>
" . $thread_description . "
</div>
<h6 class='font-weight-bold my-0'>". $user_email ." at " . $thread_time . " </h6>
</div>
          </div>";
}
if ($search_result) {
                        echo "
                        <div class='col-sm-6 d-flex '>
      <div class='h-100 p-5 bg-light border rounded-3'>
        <h2>No result found</h2>
        <p>Be the first person to post about this.</p>
      </div>
    </div>
    </div>
  </div>";

    }

    ?>
            
            <!-- <div class="result">
                <h3><a href="/catagory/ddf" class="text-dark">Cant't install py audio</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae quam dignissimos praesentium voluptatibus, adipisci corrupti assumenda dolores animi. Doloremque, accusantium aliquam? Quae, autem in. Laborum repellendus quasi maiores sint voluptatem minima deleniti cum aspernatur eius minus, nesciunt accusantium repellat nihil, numquam, veritatis quaerat deserunt sit blanditiis modi nobis. Nulla maiores beatae adipisci eum! Doloribus eos, neque commodi odio voluptas nihil molestias minus dignissimos, autem recusandae aliquam dolorem et, minima quo culpa quod rerum pariatur accusamus veniam voluptatibus suscipit quibusdam? Nisi deserunt ratione, quae distinctio dolore tempore enim earum modi!</p>
</div> -->
          </div>
      

      
      <?php include 'C:\xampp\htdocs\forumsite\partial\_footer.php' ?>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
              integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
              crossorigin="anonymous"></script>
</body>

</html>
