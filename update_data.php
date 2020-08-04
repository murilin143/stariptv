<?php
$userID = $_POST['hid'];
$senha = $_POST['senha'];

include('includes/connection.php');

$sql = "UPDATE users SET password = '$senha' WHERE id='$userID'";

if(mysql_query($sql))
{
	echo "<script>
  alert('Senha Alterada com Sucesso'); location= './w_cliente_rel.php';
  </script>";}
else
{
	die('Unable to update record: ' .mysql_error());
}
?>


echo "<script>
  alert('Senha Alterada com Sucesso'); location= './w_cliente_rel.php';
  </script>";
