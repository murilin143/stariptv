<?php
include 'includes/connection.php';

session_start();

$user = $_POST['username'];
$senha1 = $_POST['password'];

$sql = mysql_query ("SELECT * FROM users WHERE username='$user' And password='$senha1'");

$num = mysql_num_rows($sql);

if($num==1)
$sql2 = mysql_query ("SELECT * FROM users WHERE username='$user' and enabled = '1'");
if  ($dados = mysql_fetch_array($sql2))
{
$_SESSION["id"]= $dados["id"]; 
$_SESSION["usuario"] = $dados["username"]; 
$_SESSION["senha"]= $dados["password"]; 
$_SESSION["email"]= $dados["email"];
$_SESSION["credits"]= $dados["credits"];

header('location:web_cat.php');
}

else
{
  unset ($_SESSION['login']);
  unset ($_SESSION['senha']);
  header('location:web_login.php'); 
 
}





?>
