<?php
session_start();
 include("includes/connection.php");
 include("includes/conex.php");

 $userID = $_GET['uid'];

$sql = mysql_query("SELECT * FROM  users WHERE id = '$userID'");  
           while ($dados = mysql_fetch_array($sql)) 
           {  
           $enabled =  $dados['enabled'];  
           } 

if ($enabled == '1'){

$result= mysql_query("UPDATE users SET enabled = '0' WHERE id = '$userID'")OR DIE(mysql_error());
$_SESSION["msg"]= "<div class='alert alert-danger'>USUARIO BLOQUEADO</div>";
header('location:w_cliente_rel.php');
}
if($enabled == '0') {
	
$result= mysql_query("UPDATE users SET enabled = '1' WHERE id = '$userID'")OR DIE(mysql_error());
$_SESSION["msg"]= "<div class='alert alert-danger'>USUARIO LIBERADO</div>";
header('location:w_cliente_rel.php');
}






?>