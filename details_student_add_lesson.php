<?php
require './core/auth.php';
require './core/library.php';
require './common/alert.php';
$app = new Library();
if( isset($_GET["id"]) ) 
{
  $student_id = $_GET["id"];
  $form_link= "details_student_add_lesson.php?id=".$student_id;
}
else
{
    //404 page
}
//get student
$student = $app->get_student($student_id);
if ($student != [])
{
  //get student name
  $name = $student->stu_name;
  //get student avail lessons 
  $avail_lessons = $app->available_lessons($student_id);
}
else
{
    //404 page
}
$error_message = "";
$success_message = "";
// check register request
if (!empty($_POST['submit'])) 
  {
      extract($_POST);
      if (!isset($lesson) )
      {
          $error_message = "Επιλέξτε μάθημα ";
      }  
      else 
      {

          $app->attends($student_id, $lesson);
          $lesson_name = $app->get_lesson($lesson)->le_name;
          $avail_lessons = $app->available_lessons($student_id);
          $success_message = "Προστέθηκε το μάθημα <strong>".$lesson_name."</strong>";  
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

  <title>Δήλωση μαθήματος</title>

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
          <!-- request response -->
          <?php 
            if($success_message != "")
            {
              echo success($success_message);
            }
            if($error_message != "")
            {
              echo failure($error_message);
            }
          ?>
          
    
          <!-- Basic Card Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Φόρμα δήλωσης μαθήματος για τον μαθητή: <?php echo $name; ?></h6>
            </div>
            <div class="card-body">
                <form class="user" method="post">
                    <div class="form-group row">
                    <div class="col-sm-12">
                        <select class="form-control custom-select" name="lesson" id="lesson">
                            <option selected disabled>Επιλέξτε μάθημα</option>
                            <?php 
                                foreach ($avail_lessons as $option) {
                            ?>
                                <option value='<?php echo $option->le_id; ?>' ><?php echo $option->le_name; ?></option>
                            <?php
                                    
                                }
                            ?>                    
                        </select>
                    </div>
                </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Προσθήκη">
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
