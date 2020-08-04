<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
 
$logado = $_SESSION['usuario'];
$ids = $_SESSION['id'];



	require_once("funcao/funcao.php");
	get_web_header();
	
        
?>

      <div id="content-wrapper">

        <div class="container-fluid">
                  <!-- comeco do site-->

       

 

            <!-- fim do site-->
<?php

        get_footer()

?>