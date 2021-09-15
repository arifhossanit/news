<footer class="my-5 container">
      <div class="row">
        <div class="col-sm-12">
          <div class="d-flex justify-content-between">
            <h1 class="footer-logo fw-bold">NEWS ROOM</h1>
            <!-- <img src="images/logo.svg"  alt="" /> -->

            <div class="d-flex justify-content-end footer-social align-items-center">
              <h5 class="fw-bold me-3 d-none d-lg-flex">Follow on</h5>
              <ul class="d-flex list-unstyled social">
                <?php
                  $sql="SELECT link_icon, link_url FROM mysocial_link WHERE is_active='1'";
                  $result=$db_config->query($sql);
                  while ($data=$result->fetch_object()) {
                ?>
                <li>
                  <a href="<?php echo $data->link_url; ?>" target="_blank" class="me-2">
                    <i class="fab <?php echo $data->link_icon; ?>"></i>
                  </a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div
            class="d-lg-flex justify-content-between align-items-center border-top"
          >
            <ul class="d-lg-flex footer-horizontal-menu list-unstyled">
              <li><a href="#">Terms of Use.</a></li>
              <li><a href="#">Privacy Policy.</a></li>
              <li><a href="#">Accessibility & CC.</a></li>
              <li><a href="#">AdChoices.</a></li>
              <li><a href="#">Advertise with us Transcripts.</a></li>
              <li><a href="#">License.</a></li>
              <li><a href="#">Sitemap</a></li>
            </ul>
            <p class="font-weight-medium">
              © 2021 <a href="https://www.bootstrapdash.com/" target="_blank" class="text-dark text-decoration-none">@ NEWSROOM</a>, Inc.All Rights Reserved.
            </p>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
</body>
</html>