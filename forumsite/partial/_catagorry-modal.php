<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#catagorymodal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="catagorymodal" tabindex="-1" aria-ledby="catagorymodal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="catagorymodal">Add new catagory</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action="/forumsite/partial/_handel_catagory.php" method="post">
  <div class="mb-3">Catagory Name </label>
    <input type="text" class="form-control" id="catagory_name" name="catagory_name" aria-describedby="emailHelp">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
      <form action="/forumsite/partial/_handal_signup.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Catagory Description</label>
    <input type="text" class="form-control" id="catagory_description" name="catagory_description" aria-describedby="emailHelp">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>