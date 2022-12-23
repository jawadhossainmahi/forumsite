<?php
// signup alerts are here
if (isset($_GET["signup_success"]) && $_GET['signup_success'] == 'used_name') {
  echo "<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
    <strong>Sorry sir</strong> This username is already in used please input another username
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
} elseif (isset($_GET["signup_success"]) && $_GET['signup_success'] == 'null_name') {
  echo "<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
      <strong>Alert</strong> sir you can't set username or email null you must input a valid username and email so that we could contact you.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  } elseif (isset($_GET["signup_success"]) && $_GET['signup_success'] == 'null_pass') {
    echo "<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
      <strong>Alert</strong> sir you can't set password null
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  
  } elseif (isset($_GET["signup_success"]) && $_GET['signup_success'] == 'true') {
  echo "<div class='alert alert-success alert-dismissible fade show my-0' role='alert'>
    <strong>Success!</strong> Your account has been created
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
} elseif (isset($_GET["signup_success"]) && $_GET['signup_success'] == 'false') {
  echo "<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
    <strong>Oops</strong> sir your password do not match please type confirm pasword correctly
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}


// login alerts are here
if (isset($_GET["pass"]) && $_GET['pass'] == 'correct' && isset($_SESSION['username']) && $_SESSION['username']=='mahi') {
  echo "<div class='alert alert-success alert-dismissible fade show my-0' role='alert'>
      <strong>Wellcome back again ".$_SESSION['username']."</strong> 
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } 
elseif (isset($_GET["username"]) && $_GET['username'] == 'null') {
  echo "<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
      <strong>Empty username</strong> you must input a valid username
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } 
    elseif (isset($_GET["username"]) && $_GET['username'] == 'none') {
      echo "<div class='alert alert-warning alert-dismissible fade show my-0' role='alert'>
        <strong>Sorry sir</strong> we don't have any account on this username please create a new account then try to log in. 
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
 elseif (isset($_GET["pass"]) && $_GET['pass'] == 'none') {
  echo "<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
      <strong>Empty pass</strong> you must input a valid pass
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
} elseif (isset($_GET["pass"]) && $_GET['pass'] == 'correct') {
  echo "<div class='alert alert-success alert-dismissible fade show my-0' role='alert'>
      <strong>Welcome</strong> sir for visiting us again.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
} elseif (isset($_GET["pass"]) && $_GET['pass'] == 'false') {
  echo "<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
    <strong>Oops</strong> wrong password
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}

// catagogry alert

if (isset($_GET['catagory']) && $_GET['catagory'] == 'exist') {
  echo "<div class='alert alert-danger alert-dismissible fade show my-0' role='alert'>
    <strong>Sir</strong> Your catagory already exist try another catagory
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
elseif(isset($_GET['catagory']) && $_GET['catagory'] == 'created'){
  echo "<div class='alert alert-success alert-dismissible fade show my-0' role='alert'>
    <strong>Sir</strong> your catagory has been submitted
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}