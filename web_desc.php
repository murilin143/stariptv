<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }

$categoria = $_GET['cat'];
 
$logado = $_SESSION['usuario'];
$ids = $_SESSION['id'];



  require_once("funcao/funcao.php");
  get_web_header();
  
        
?>

      <div id="content-wrapper">

        <div class="container-fluid">
                  <!-- comeco do site-->

<div class="container">
      <div class="row">

<!-- title -->
        <div class="col-12">
          <h1 class="details__title">TITULO DO FILME</h1>
        </div>
<!-- end title -->
<!-- content -->
<div class="col-12 col-xl-6">
    <div class="card card--details">
            <div class="row">
              <!-- card cover -->
              <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
                <div class="card__cover">
                  <img src="http://clienteworld.com:8080/images/kyisfNtn0cmQA4e39H9VCa5CkN6_small.jpg" alt="">
                </div>
              </div>
              <!-- card content -->
              

                   

          </div>
              </div>
</div>
<!-- FIM content -->
   </div>
  </div>
 </div>
</div>
 
<?php
          // fim do site-->


        get_footer()

?>