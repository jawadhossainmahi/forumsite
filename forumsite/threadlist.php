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
    <?php include 'C:\xampp\htdocs\forumsite\partial\_dbconnect.php' ?>
    <?php include 'C:\xampp\htdocs\forumsite\partial\_header.php' ?>


    <?php
    $id = $_GET['code_id'];
    $sql = "SELECT * FROM `catagory` WHERE catagory_id=$id ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $cat_name = $row['catagory_name'];
        $cat_description = $row['catagory_description'];
    }
    ?>


    <?php
    // problem post php 
if (isset($_SESSION['login']) && $_SESSION['login'] = true) {
    $username = $_SESSION['username'];
        $showalert = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $thread_post_title = $_POST['title'];
            $thread_post_desc = $_POST['desc'];
            $thread_post_title = str_replace('<', '&lt', $thread_post_title);
            $thread_post_title = str_replace('>', '&gt', $thread_post_title);
            $thread_post_desc = str_replace('<', '&lt', $thread_post_desc);
            $thread_post_desc = str_replace('>', '&gt', $thread_post_desc);

            $showalert = true;
            $sql2 = "SELECT * FROM `users` WHERE username='$username'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $name_sno = $row2['sno'];

            $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$thread_post_title', '$thread_post_desc', '$id', '$name_sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
        }

        if ($showalert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your porblem is submited
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    }
    ?>




    <!-- slider starts here -->

    <!-- catagory starts here -->
    <div class="container my-4 justify-content-center ">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to
                <?php echo $cat_name; ?> forums
            </h1>
            <p class="lead">
                <?php echo $cat_description; ?>
            </p>
            <hr class="my-4">
            <p>This is a perr to perr forum to share kncowledge each other.
            <ul>
                <h6> Forum rules and posting guidelines </h6>
                <li> Keep it friendly. </li>
                <li>Be courteous and respectful. Appreciate that others may have an opinion different from yours.</li>
                <li>Stay on topic. ... </li>
                <li>Share your knowledge. ...</li>
                <li>Refrain from demeaning, discriminatory, or harassing behaviour and speech.. </li>
            </ul>
            </p>
            <button class="btn btn-success btn-lg"
                    type="button">Learn More</button>
        </div>
    </div>
<?php
if (isset($_SESSION['login']) && $_SESSION['login']== true) {
    echo '<div class="container">
    <h1>Start a Discussion</h1>
    <form action="'.$_SERVER["REQUEST_URI"] .'"
          method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                   class="form-label">Problem title</label>
            <input type="text"
                   class="form-control"
                   id="title"
                   name="title">
            <div id="nameHelp"
                 class="form-text">Please keep your title as short and crisp as possible</div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1"
                   class="form-label">Elaborate Your concern</label>
            <textarea class="form-control"
                      id="desc"
                      name="desc"
                      rows="3"></textarea>
        </div>
        <button type="submit"
                class="btn btn-success">Submit</button>
    </form>
</div>';
}
else {
    echo '<div class="container">
    <h4>Hello sir</h4>
          <p class="bold"> Sir please log in if you want to submit your porblem.</p>
          </div>
    ';
    }
?>
    <div id="jfif"
         class="container">
        <h1>Brouse Question</h1>
        <?php
        // session_start();
        $id = $_GET['code_id'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $thread_id = $row['thread_id'];
            $thread_title = $row['thread_title'];
            $thread_description = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT * FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $user_fetch_sno = $row2['sno'];
            $user_fetch_name = $row2['username'];


            echo " <div class='d-flex my-4'>
       <div class='flex-shrink-0'>
           <img src='img/user.png'
           width='54px'
           alt='...'>
       </div>
       <div class='flex-grow-1 ms-3'>
       <h5 class='my-0'><a class='text-dark' href='thread.php?thread_id=" . $thread_id . "'>" . $thread_title . "</a></h5>
       " . $thread_description . "
       </div>
       <h6 class='font-weight-bold my-0'>" . $user_fetch_name . " at " . $thread_time . " ";

            if ((isset($_SESSION['username']) && $_SESSION['username']=='mahi')||(isset($_SESSION['user_sno']) && $_SESSION['user_sno'] == $thread_user_id)){
                echo "<button class='btn btn-success' ><a class='nav-link' href='./partial/_delete.php?thread_id=".$thread_id."&code_id=".$id."'>Delete</a></button></h6>";
            }
            echo "</div>";
        }
        if ($noResult) {
            echo "<div class='col-sm-6'>
            <div class='h-100 p-5 bg-light border rounded-3'>
              <h2 >No threads found</h2>
              <p>Be the first person to ask a quistion.</p>
            </div>
          </div>
        </div> ";
        }
        ?>



        <!--  <div class="flex-grow-1 ms-3">
                <h5> Unable to use pyaudio install in windows? </h5>
                This is some content from a media component. You can replace this with any content and adjust it as
                needed.This is some content from a media component. You can replace this with any content and adjust it
                as needed.
                This is some content from a media component. You can replace this with any content and adjust it as
                needed.This is some content from a media component. You can replace this with any content and adjust it
                as needed.
            </div>
        </div> -->
    </div>

    <?php include 'C:\xampp\htdocs\forumsite\partial\_footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
</body>

</html>