<?php
include 'includes/config.php';


?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $site; ?></title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

<br>
<br>
<br>
<br>
<br>
<br>
                        
   <div align="center">
  <img src="img/logo_peq.png" class="img-rounded" alt="Cinque Terre">
    </div>
                                 


    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="verifylogin.php" method="post" >
            <?php
              if(isset($_SESSION['msg']))
              {
                
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
              }
              
              if(isset($_SESSION['require']))
              {
                echo $_SESSION['require'];
                unset($_SESSION['require']);
              }
            ?>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="Username" class="form-control" name ="username"  autofocus="autofocus" placeholder="Digite seu login">
                
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="password" class="form-control" name ="password"  autofocus="autofocus" placeholder="Digite sua senha">
                
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
          </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
