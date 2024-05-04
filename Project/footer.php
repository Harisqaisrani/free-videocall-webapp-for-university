<br><br>
<br><br>
<div class="container">
  <footer class="py-5">
    <div class="row">


     <div div div class="col-md-3">
        <h5>More</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Team</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>
      
      <div class="col-md-3">
        <h5>Social Media</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="https://www.isp.edu.pk" class="nav-link p-0 text-muted">Website</a></li>
          <li class="nav-item mb-2"><a href="https://www.facebook.com/ispmul" class="nav-link p-0 text-muted">Facebook</a></li>
          <li class="nav-item mb-2"><a href="https://www.linkedin.com/school/institute-of-southern-punjab-multan/" class="nav-link p-0 text-muted">LinkedIn</a></li>
          <li class="nav-item mb-2"><a href="https://www.instagram.com/ispmultanofficial" class="nav-link p-0 text-muted">Instagram</a></li>
          <li class="nav-item mb-2"><a href="https://www.youtube.com/channel/UChB42o66i5x1u8Ry4Ci1Uhg" class="nav-link p-0 text-muted">YouTube</a></li>
        </ul>
      </div>

      <div class="col-md-4 offset-1">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of whats new and exciting from us.</p>
          <div class="d-flex w-100 gap-2">
            <form method="post">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <input name="newsletter" type="email" class="form-control" placeholder="info@isp.edu.pk">
              <input type="submit" class="btn btn-primary" name="sub" value="Connect">
            </form>
          </div>
        </form>
      </div>
    </div>
    <div class="d-flex justify-content-between py-4 my-4 border-top">
      <p>&copy; 2023 Muhammad Haris, All rights reserved.</p>
    </div>
  </footer>
</div>

<?php
if(isset($_POST["sub"])) {
  $subs = $_POST["newsletter"];
  $sqli = "INSERT INTO contacts(email, username) VALUES ('$subs','$name')";
  mysqli_query($con,$sql);
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>