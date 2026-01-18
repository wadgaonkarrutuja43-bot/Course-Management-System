<!-- Header -->
<?php 
include('includes/header.php');
?>
<!-- Header -->

<!-- courses banner -->
<div class="container-fluid bg-dark ">
  <div class="row">
    <img src="course.jpg" alt="Courses" style="height:520px; width: 100%; object-fit:cover; box-shadow:10px; margin-top: 10px;">
  </div>
</div>
<!-- End courses Banner -->

<!-- Start Main content -->
<div class="container">
  <h2 class="text-center my-4">Payment Status</h2>
  <form action="" method="post" class="mx-auto" style="max-width: 30rem;">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label" style="font-weight:bolder;">Order ID:</label>
        <div class="col-sm-6">
          <input type="text" class="form-control mx-3" placeholder="Enter Order ID">
        </div>
        <div class="col-sm-3">
          <input type="submit" class= "btn btn-primary mx-4" value="View">
        </div>
    </div>
  </form>
</div>
<!-- End Main content -->

<!-- Footer -->
<?php 
include('includes/footer.php');
?>
<!-- Footer -->