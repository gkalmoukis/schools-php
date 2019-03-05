<?php 
  ob_start();
  session_start();

  if(empty($_SESSION['id']))
  {
    header("Location: login.php");
  }

  require './core/library.php';
  $app = new Library();
  $notification =  $app->get_notifications($_GET['id']);

  

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    
  <!-- Sidebar -->
  <?php include './common/gurardian_front_sidebar.php' ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="c1ntent">

        <!-- top1ar -->
        <?php include './common/topbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          

        <div class="card mb-4  border-left-primary">
            <div class="card-body">
                <?php echo $notification["not_date"]; ?>
            </div>
        </div>

        <div class="card mb-4 py-4 border-left-primary">
            
            <div class="card-body">
                <?php
                if($notification["not_tag_id"] != -1)
                {
                    
                    echo "<span class='badge badge-pill badge-primary'>"
                         .$app->get_tag($notification["not_tag_id"])->tag_name
                         ."</span>";
                }
                if($notification["not_lesson_id"] != -1)
                {
                   
                    echo "<span class='badge badge-pill badge-info'>"
                         .$app->get_lesson($notification["not_lesson_id"])["le_name"]
                         ."</span>";
                }  
                ?>
                <?php echo "<br>".$notification["not_text"]; ?>
            </div>
        </div>
          
        



        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
                
      

    </div>
    <!-- End of Content Wrapper -->

    <!-- Footer -->
    <?php include './common/footer.php'; ?>
      <!-- End of Footer -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include './common/logout_modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
   <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  
  <script src="js/demo/datatables-demo.js"></script>


</body>

</html>
