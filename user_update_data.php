<?php
$userID = $_POST['hid'];
$user = $_POST['user'];

include('includes/connection.php');

$sql = "UPDATE users SET username = '$user' WHERE id='$userID'";

if(mysql_query($sql))
{
	echo "<script>
  alert('Usuario Alterada com Sucesso'); location= './w_cliente_rel.php';
  </script>";
}else{
	die('Unable to update record: ' .mysql_error());
}
?>


