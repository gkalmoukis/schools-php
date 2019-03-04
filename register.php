<?php
session_start();

if(empty($_SESSION['id']))
{
    header("Location: login.php");
}
require './core/library.php';
$app = new Library();

$register_error_message = "";
$register_success_message = "";
// check register request
if (!empty($_POST['submit_register'])) 
{
    extract($_POST);
    if ($firstname == "" || $lastname == "" || $email == "" || $password == "" || $repassword == "") 
    {
        $register_error_message = "Μη Συμπληρωμένη φόρμα";
    }  
    else if ($password != $password) 
    {
        $register_error_message = "Οι κωδικοί δεν ταιρίαζουν";
    } 
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        $register_error_message = 'Λανθασμένη μορφή email';
    } 
    else if ($app->isEmail($_POST['email'])) 
    {
        $register_error_message = 'Το email υπάρχει';
    } 
    else 
    {
        $app->Register($firstname, $lastname, $email, $password, 1);
        $register_success_message = "Ολα γκούντ!";
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

  <title>Δημιουργία λογαριασμού</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Δημιουργία λογαριασμού</h1>
              </div>
              
              <!-- error alert -->
              <?php
              if ($register_error_message != "") {
              ?>
              <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                  <?php echo $register_error_message; ?>
                </div>
              </div>
              <?php
              }
              ?>
              <!-- /error alert -->

              <!-- success alert -->
              <?php
              if ($register_success_message != "") {
              ?>
              <div class="card mb-4 py-3 border-left-success">
                <div class="card-body">
                  <?php echo $register_success_message; ?>
                </div>
              </div>
              <?php
              }
              ?>
              <!-- /success alert -->

              <form class="user" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" id="firstname" name="firstname" placeholder="Όνομα" class="form-control form-control-user">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" id="lastname" name="lastname" placeholder="Επώνυμο" class="form-control form-control-user">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" id="email" name="email" placeholder="Email" class="form-control form-control-user">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" id="password" name="password" placeholder="Κωδικός" class="form-control form-control-user">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" id="repassword" name="repassword"  placeholder="Επαλήθευση κωδικού" class="form-control form-control-user">
                  </div>
                </div>
                <input type="submit" name="submit_register" class="btn btn-primary btn-user btn-block" value="Εγγραφή">
                <hr>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login.html">Έχετε ήδη λογαριασμό;</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
