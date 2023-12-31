
</body>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<hr class="mt-2 mb-3"  style="width:100%; margin:auto; border: 1px solid black">

<section class="">
      <div class="container text-center text-md-start">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold" id="about">About Us</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <img src="images/logo.jpg" width="200">
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold">Useful Links</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="signup.php" class="text-dark text-decoration-none">Reigister Now</a>
            </p>
            <p>
              <a href="admin/signup.php" class="text-dark text-decoration-none">Pricing Plans</a>
            </p>
            <p>
              <a href="review.php" class="text-dark text-decoration-none">Write Review</a>
            </p>
            <p>
              <a href="terms.html" class="text-dark text-decoration-none">Terms & Conditions</a>
            </p>
          </div>

          <div class="col-md-3 col-lg-3 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold">Contact Us</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
              <p><i class="fa fa-phone"></i> :+91 7406492844</p>
            <p><i class="fa fa-whatsapp mr-3"></i> : 7406492844</p>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Follow Us on</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p><i class="fa fa-instagram mr-3"></i> wildcatdigitalmarketing</p>
            <p><i class="fa fa-envelope mr-3"></i> wildcat@outlook.com</p>
            <p><i class="fa fa-twitter mr-3"></i> wildcatofficial</p>
          </div>
        </div>
      </div>
    </section>
    <div class="text-center p-1" style="background: linear-gradient(to right, #28313B , #141466);">
         <p class="text-white">&copy; copyright @ <?= date('Y'); ?> all rights reserved. Designed and Developed : shravanhj@outlook.com</p>
    </div>
  </footer>
</div>
</html>