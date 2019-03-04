<?php  
session_start();

if(empty($_SESSION['id']))
{
    header("Location: login.php");
}
  require './core/library.php';
  $app = new Library();
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

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Κατάλογος Μαθητών</h1>
          <p class="mb-4">Για την εισαγωγή νέου μαθητή επισκεφτείτε την φόρμα <a href="new_student.php">εισαγωγής νέου μαθητή</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Διαθέσιμοι Μαθητές</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Όνομα</th>
                      <th>Κηδεμόνας</th>
                      <th>Ενέργειες</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Όνομα</th>
                      <th>Κηδεμόνας</th>
                      <th>Ενέργειες</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    if($app->get_all_students() == 0)
                    {
                        // todo na paei auth i sinthiki panw apo ton pinaka
                    } 
                    else
                    {
                      foreach ($app->get_all_students() as $key) 
                      {
                          $profile_link = "student_profile.php?id=".$key["stu_id"];
                  ?>
                        <tr>
                          <td><?php echo $key["stu_name"]; ?></td>
                          <td><?php echo $app->get_user_name($key["stu_guardian_id"]); ?></td>
                          <td>
                            <a href="<?php echo $profile_link; ?>" class="btn btn-primary btn-circle">
                                <i class="fas fa-chalkboard"></i>
                            </a>
                          </td>
                        </tr>
                  <?php
                      }
                    }  
                  ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include './common/footer.php';  ?> 
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

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
