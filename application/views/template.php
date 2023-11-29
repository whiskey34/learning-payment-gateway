<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>E-shop | <?= $title; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('public/vendors/feather/feather.css'); ?>">
  <link rel="stylesheet" href="<?=  base_url('public/vendors/ti-icons/css/themify-icons.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('public/vendors/css/vendor.bundle.base.css'); ?>">
  <link rel="stylesheet" href="<?= base_url();?>public/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url();?>public/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('public/vendors/datatables.net-bs4/dataTables.bootstrap4.css '); ?>">
  <link rel="stylesheet" href="<?= base_url('public/vendors/ti-icons/css/themify-icons.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('public/js/select.dataTables.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url();?>public/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="<?= base_url();?>public/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css">
  <!-- End plugin css for this page -->

  <!-- datatable plugin -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('public/css/vertical-layout-light/style.css '); ?>">
  <!-- <link rel="stylesheet" href="public/css/table-style.css"> -->
  
  <!-- endinject -->
  <link rel="shortcut icon" href="#" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php $this->load->view('partials/_navbar'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <?php $this->load->view('partials/_settings-panel'); ?>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php $this->load->view('partials/_sidebar'); ?>
      <!-- partial -->
      <div class="main-panel">

        <?= $contents; ?>
      </div>
    <!-- page-body-wrapper ends -->
    </div>
  <!-- container-scroller -->


<!-- plugins:js -->
  <script src="<?= base_url('public/js/jquery.min.js'); ?>"></script>
  <!-- <script src="<?//= base_url('public/vendors/js/vendor.bundle.base.js'); ?>"></script> -->
  <script src="<?= base_url('public/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('public/js/main.js'); ?>"></script>
  <script src="<?= base_url();?>public/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="<?= base_url();?>public/vendors/select2/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>

  <!-- endinject -->

  <!-- Plugin js for this page -->
  <script src="<?= base_url('public/vendors/chart.js/Chart.min.js'); ?>"></script>
  <script src="<?//= base_url('public/vendors/datatables.net/jquery.dataTables.js'); ?>"></script>
  <script src="<?//= base_url('public/vendors/datatables.net-bs4/dataTables.bootstrap4.js'); ?>"></script>
  <script src="<?= base_url('public/js/dataTables.select.min.js'); ?>"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url('public/js/off-canvas.js'); ?>"></script>
  <script src="<?= base_url('public/js/hoverable-collapse.js'); ?>"></script>
  <script src="<?= base_url('public/js/template.js'); ?>"></script>
  <script src="<?= base_url('public/js/settings.js'); ?>"></script>
  <script src="<?= base_url('public/js/todolist.js'); ?>"></script>
  <script src="<?= base_url('public/js/popper.js'); ?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url('public/js/dashboard.js'); ?>"></script>
  <script src="<?= base_url('public/js/Chart.roundedBarCharts.js'); ?>"></script>

  <!-- Plugin js for this page -->
  
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url();?>public/js/off-canvas.js"></script>
  <script src="<?= base_url();?>public/js/hoverable-collapse.js"></script>
  <script src="<?= base_url();?>public/js/template.js"></script>
  <script src="<?= base_url();?>public/js/settings.js"></script>
  <script src="<?= base_url();?>public/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url();?>public/js/file-upload.js"></script>
  <script src="<?= base_url();?>public/js/typeahead.js"></script>
  <script src="<?= base_url();?>public/js/select2.js"></script>


  
  <!-- End custom js for this page-->
</body>

</html>