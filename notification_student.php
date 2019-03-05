<?php
ob_start();
session_start();

if(empty($_SESSION['id']))
{
    header("Location: login.php");
}
  require './core/library.php';
  require './common/alert.php';
  $app = new Library();
  $success_message = "";
  $error_message = "";
  //get students 
  $students = $app->get_all_students();
  //get lessons
  $lessons = $app->get_all_lessons();
  //get tags
  $tags = $app->get_all_tags();
  if(!empty($_POST['submit']) )
  {
    extract($_POST);
    // prepei na exei epilexthei enas mathitis kai ena keimeno
    if ( isset($student) && $text != "" ) 
    {
      // proeretika ena mathima 
      if(isset($lesson))
      {
        
      }
      else
      {
        
        $lesson = -1;
      }
      
      // proeretika mia etiketa 
      if(isset($tag))
      {
        
      }
      else
      {
        
        $tag = -1;
      }
      
      $success_message = "Δημοσιεύτηκε η ανακοίνωση με κωδικό ".$app->insert_notification(1, $tag, $student, $lesson, $text);
    }  
    else{
      $error_message = "Μη συμπληρωμένη φόρμα";
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



  <link href="vendor/summernote/summernote-bs4.css" rel="stylesheet">
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
                <h6 class="m-0 font-weight-bold text-primary">Φόρμα δημιουργίας ανακοίνωσης</h6>
            </div>
            <div class="card-body">
                <form method="post">
                    <!-- student select -->
                    <div class="form-group">
                        <select class="form-control custom-select" name="student">
                           <option value="-1" selected disabled>Επιλέξτε μαθητή</option>
                           <?php 
                                foreach ($students as $option) {
                            ?>
                                <option value='<?php echo $option['stu_id']; ?>' ><?php echo $option['stu_name']; ?></option>
                            <?php
                                    
                                }
                           ?>                    
                        </select>
                    </div>  
                    <!-- lesson and tag -->
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select class="form-control custom-select" name="lesson">
                                <option  value="-1" selected disabled>Επιλέξτε μάθημα</option>
                                <?php 
                                        foreach ($lessons as $option) {
                                    ?>
                                        <option value='<?php echo $option['le_id']; ?>' ><?php echo $option['le_name']; ?></option>
                                    <?php
                                            
                                        }
                                ?>                    
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control custom-select" name="tag">
                                <option  value="-1" selected disabled>Επιλέξτε ετικέτα</option>
                                <?php 
                                        foreach ($tags as $option) {
                                    ?>
                                        <option value='<?php echo $option['tag_id']; ?>' ><?php echo $option['tag_name']; ?></option>
                                    <?php
                                            
                                        }
                                ?>                    
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea id="summernote" name="text"></textarea>
                    </div>


                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Εισαγωγή">
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

  <script src="vendor/summernote/summernote-bs4.js"></script>
  <!-- include summernote-el-GR -->
    <script src="vendor/summernote/lang/summernote-el-GR.js"></script>
  <script>
      $('#summernote').summernote({
        placeholder: 'Κείμενο ενημέρωσης',
        tabsize: 4,
        height: 250,
        lang: 'el-GR',
        toolbar: [
            ['misc', ['undo','redo']],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'table', 'hr']]
            
        ]
      });
    </script>
</body>

</html>
