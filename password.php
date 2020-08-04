<?php
session_start ();
$member_id = $_SESSION['id'];
$pw = $_POST['txtpassword'];

 include("includes/connection.php");
 include("includes/conex.php");


$sql = "UPDATE reg_users SET senha ='$pw' WHERE id='$member_id'";

if(mysql_query($sql))
{
echo "<script>
  alert('Senha cadastrada com Sucesso'); location= './btn_credito_rev.php';
  </script>";

	header('location:login.php');
}
else
{
	die('Unable to update record: ' .mysql_error());
}
?>