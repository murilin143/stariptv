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

 
<div  class = "gallery">
    

     <?php

include("includes/connection.php");
$sql="SELECT * FROM streams ORDER BY id DESC LIMIT 500 "; 
$result=mysql_query($sql);

while ($dados= mysql_fetch_array($result)) {
	$legenda = $dados ["stream_display_name"];
    $result1 = explode('","', $dados ["movie_propeties"]);
    $result1 = str_replace('\/\/', '//' , $result1); 
    $result1 = str_replace('\/', '/' , $result1);
    $result1 = str_replace('{"director":"', ' ' , $result1);      
    $novo_texto = str_replace('{"movie_image":"', ' ' , $result1);
    $nome = $novo_texto[0];
  
    

    echo "<img class='border border-warning' width='200' height='300' src='$nome'>";

   
    
}
?>

</div >
         
  <?php

        get_footer()

?>