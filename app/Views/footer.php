<?php
$Date = date("d-m-Y");
$Year2 = date("Y");

?>
<?php if ($docente) { ?>
  </div>
  </div>
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-lg-6">
          <div class="copyright text-center  text-lg-left  text-muted">
            &copy; <?php echo "$Year2"; ?> <a href="https://www.jlpintado.com" class="font-weight-bold ml-1" target="_blank">Jose Pintado</a>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="<?php echo base_url() . '/docente'; ?>" class="nav-link">Docente</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url() . '/docente'; ?>" class="nav-link" target="_blank">Test</a>
            </li>
            <li class="nav-item">
              <a href="https://cepreuni.net.pe/" class="nav-link" target="_blank">CEPRE-UNI</a>
            </li>
            <!-- <li class="nav-item">
          <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
        </li> -->
          </ul>
        </div>
      </div>
    </div>
  </footer>
<?php } else { ?>
  <footer class="footer pt-0">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6">
        <div class="copyright text-center  text-lg-left  text-muted">
          &copy; <?php echo "$Year2"; ?> <a href="https://www.jlpintado.com" class="font-weight-bold ml-1" target="_blank">Jose Pintado</a>
        </div>
      </div>
      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="<?php echo base_url() . '/docente'; ?>" class="nav-link">Docente</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url() . '/docente'; ?>" class="nav-link" target="_blank">Test</a>
          </li>
          <li class="nav-item">
            <a href="https://cepreuni.net.pe/" class="nav-link" target="_blank">CEPRE-UNI</a>
          </li>
          <!-- <li class="nav-item">
          <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
        </li> -->
        </ul>
      </div>
    </div>
  </footer>
  </div>
  </div>

<?php }  ?>
<!-- Argon Scripts -->
<!-- Core -->
<script src="<?php echo base_url(); ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="<?php echo base_url(); ?>/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>