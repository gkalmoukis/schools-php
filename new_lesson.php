<?php
ob_start();
session_start();

if(empty($_SESSION['id']))
{
    header("Location: login.php");
}
require './core/library.php';
$app = new Library();

$error_message = "";
$success_message = "";
// check register request
if (!empty($_POST['submit_lesson'])) 
{
    extract($_POST);
    if ($name == "") 
    {
        $error_message = "Μη Συμπληρωμένη φόρμα";
    }  
    else 
    {
        $app->new_lesson($name);
        $success_message = "Ολα γκούντ!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include './common/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include './common/topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- error alert -->
          <?php
            if ($error_message != "") {
          ?>
            <div class="card mb-4 py-3 border-left-danger">
            <div class="card-body">
                <?php echo $error_message; ?>
            </div>
            </div>
            <?php
            }
            ?>
            <!-- /error alert -->

            <!-- success alert -->
            <?php
            if ($success_message != "") {
            ?>
            <div class="card mb-4 py-3 border-left-success">
            <div class="card-body">
                <?php echo $success_message; ?>
            </div>
            </div>
            <?php
            }
            ?>
            <!-- /success alert -->  
          
    
          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Φόρμα εισαγωγής νέου μαθήματος</h6>
            </div>
            <div class="card-body">
                <form class="user" method="post">
                    <div class="form-group">
                        <input type="text" id="name" name="name" placeholder="Όνομα μαθήματος" class="form-control form-control-user">
                    </div>
                    <input type="submit" name="submit_lesson" class="btn btn-primary btn-user btn-block" value="Εισαγωγή">
                    <hr>
                </form>
            </div>
          </div>

          
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include './common/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php  include './common/logout_modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
