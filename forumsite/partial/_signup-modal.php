<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupmodal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-ledby="signupmodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="signupmodal">sign up for iDiscuss account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/forumsite/partial/_handel_signup.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="signupname" name="signupname" aria-describedby="emailHelp">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
      <form action="/forumsite/partial/_handal_signup.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="signup_password" id="signup_password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm signup_Password</label>
    <input type="password" class="form-control" name="signup_cpassword" id="signup_cpassword">
  </div>
  
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>