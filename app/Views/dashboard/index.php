<?php echo view("includes/header"); ?>
<body>
    <?php echo view("dashboard/headerWelcome"); ?>
    <?php echo view("dashboard/sidebar"); ?> 
    <?php echo $this->renderSection('main'); 
    //all pages going to be charged here
    ?> 
    
       <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>THUMAN</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Developped by <a href="https://bootstrapmade.com/">Christian By</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <?php echo view("includes/footer"); ?>
</body>
</html>