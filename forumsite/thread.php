<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscus-coading-forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
    $thread_id = $_GET['thread_id'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$thread_id ";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $description = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];
        $sql2 = "SELECT * FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $num_row = mysqli_fetch_assoc($result2);
        $user_sno = $num_row['sno'];
        $user_fetch_name = $num_row['username'];
    }

    ?>

    <?php
    // comment post php 
    if (isset($_SESSION['login']) && $_SESSION['login'] = true) {


        $showalert = false;
        $thread_id = $_GET['thread_id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $thread_post_comment = $_POST['comment'];
            $thread_post_comment = str_replace('<', '&lt', $thread_post_comment);
            $thread_post_comment = str_replace('>', '&gt', $thread_post_comment);
            $showalert = true;


            $sql = "INSERT INTO `comments` ( `comments_content`, `thread_id`, `comment_by`, `comments_time`) VALUES ( '$thread_post_comment', '$thread_id', '$user_sno', current_timestamp())";

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


    <div class="container my-4 justify-content-center ">
        <div class="jumbotron">
            <h1 class="display-4">
                <?php echo $title; ?> forums
            </h1>
            <p class="lead">
                <?php echo $description; ?>
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
            <p><b>Posted by : <?php echo $user_fetch_name; ?></b></p>
        </div>
    </div>



    <?php
    if (isset($_SESSION['login']) && $_SESSION['login'] = true) {
        echo "<div class='container'>
    <h1>Post a comment</h1>

    <form action='" . $_SERVER['REQUEST_URI'] . "'
          method='post'>

        <div class='mb-3'>
            <label for='exampleFormControlTextarea1'
                   class='form-label'>Type your comment</label>
            <textarea class='form-control'
                      id='comment'
                      name='comment'
                      rows='3'></textarea>
        </div>
        <button type='submit'
                class='btn btn-success'>Post your comment</button>
    </form>
</div>";
    } else {
        echo '<div class="container">
    <h4>Hello sir</h4>
          <p class="bold"> Sir please log in if you want to submit your comment.</p>
          </div>
    ';
    }

    ?>

    <div id="jfif" class="container">
        <h1>Discussion</h1>

        <?php
        $id = $_GET['thread_id'];
        $noResult = true;
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['thread_id'];
            $comment_id = $row['comments_id'];
            $content = $row['comments_content'];
            $comments_time = $row['comments_time'];
            $comments_by = $row['comment_by'];
            $sql2 = "SELECT * FROM `users` WHERE sno='$comments_by'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);


            echo " <div class='d-flex my-4'>
       <div class='flex-shrink-0'>
           <img src='img/user.png'
           width='54px'
           alt='...'>
       </div>
       <div class='flex-grow-1 ms-3'>
           <h5 class='font-weight-bold my-0'>" . $row2['username'] . "</h5>
           " . $content . "
       </div>
       <h6 class='font-weight-bold my-0'>Comment time" . $comments_time. " ";

       if ((isset($_SESSION['username']) && $_SESSION['username']=='mahi') ||(isset($_SESSION['user_sno']) && $_SESSION['user_sno'] == $comments_by)) {
           echo "<button class='btn btn-success' ><a class='nav-link' href='./partial/_delete2.php?comments_id=".$comment_id."&thread_id=".$id."'>Delete</a></button></h6>";
       }
   echo "</div>";
        }
        if ($noResult) {
            echo "<div class='col-sm-6'>
            <div class='h-100 p-5 bg-light border rounded-3'>
              <h2>No comment found</h2>
              <p>Be the first person to post a comment.</p>
            </div>
          </div>
        </div>";
        }

        ?>
    </div>

    <?php include 'C:\xampp\htdocs\forumsite\partial\_footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>