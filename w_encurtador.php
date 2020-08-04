<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
 
$logado = $_SESSION['usuario'];
?>

   <?php
	require_once("funcao/funcao.php");
	get_header();
	
        
?>


    <div class="container">
<div class="box">

      <iframe  style="border: 0;" src="http://ulttv.xyz/" width="800px" height="2650px" frameborder="0" scrolling="no"></iframe>




</div>
 </div>        

   <?php

        get_footer()

?>