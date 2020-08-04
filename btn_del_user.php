<?php
$id = $_GET['delID'];

include('includes/connection.php');

$sql = "DELETE FROM users WHERE id=$id";
if(mysql_query($sql))
{
	header('location:w_cliente_rel.php');
}
else
{
	die('Could not delete record:' .mysql_error());
}
?>