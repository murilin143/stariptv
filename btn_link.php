<?php
include("includes/connection.php");
include("includes/conex.php");
session_start();
$member_id = $_SESSION['id'];

$user = $_GET ['uid'];


$sql = mysql_query("SELECT * FROM users WHERE id = '$user'");
while ($dados = mysql_fetch_array($sql)) 
           {  
             $username =  $dados['username'];  
             $senha =  $dados['password'];
           }  

$n1 = 'http://188.165.247.72:8100/get.php?username=';
$n2 = '&password=';
$n3 = '&type=m3u_plus&output=mpegts';
$total = $n1.$username.$n2.$senha.$n3;

$_SESSION["msg"]= $total;
header('location:w_cliente_rel.php');

?>

