      <footer class="footer px-4">
        <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io/product/free-bootstrap-admin-template/">Bootstrap Admin Template</a> &copy; 2025 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
      </footer>
    </div>

    <script src="<?php echo base_url(); ?>assets/coreui-free/js/jquery-3.7.1.js"></script>

    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo base_url(); ?>assets/coreui-free/js/coreui.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/coreui-free/js/simplebar.min.js"></script>
    <script>
      const header = document.querySelector('header.header');
      
      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
      
    </script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?php echo base_url(); ?>assets/coreui-free/js/chart.umd.js"></script>
    <script src="<?php echo base_url(); ?>assets/coreui-free/js/coreui-chartjs.js"></script>
    <script src="<?php echo base_url(); ?>assets/coreui-free/js/index.js"></script>
    <script src="<?php echo base_url(); ?>assets/coreui-free/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/coreui-free/js/dataTables.js"></script>
    <script>
      new DataTable('#example');
    </script>
  </body>
</html>