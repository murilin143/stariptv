<?php
session_start();
include('includes/connection.php');
include('includes/conex.php');
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
 
$user = $_SESSION['usuario'];
$id = $_SESSION['id'];


$uid = $_GET['delID'];

//usuario revenda
$sql = "SELECT * FROM reg_users WHERE id = '$uid'";
$result=mysql_query($sql);
while ($dados = mysql_fetch_array($result)) 
           {  
             $rev_credito =  $dados['credits'];  
           } 

if ($rev_credito == ''){

echo "<script>
	alert('nao foi possivel deletar fala com o suporte'); location= './w_revenda_rel.php';
	</script>";

}

// revendedor
$sql = "SELECT * FROM reg_users WHERE id = '$id'";
$result=mysql_query($sql);
while ($dados = mysql_fetch_array($result)) 
           {  
             $rev2_credito =  $dados['credits'];  
           } 

if ($rev2_credito == ''){

echo "<script>
	alert('nao foi possivel deletar fala com o suporte'); location= './w_revenda_rel.php';
	</script>";

}

$somar =  $rev2_credito + $rev_credito;

$sql="UPDATE reg_users SET credits = '$somar' WHERE id ='$id'";
if(mysql_query($sql))
{

$sql2 = mysql_query("DELETE FROM reg_users WHERE id=$uid");

echo "<script>
	alert('Revendedor deletado com Sucesso foi adicionado $rev_credito creditos '); location= './w_revenda_rel.php';
	</script>";	
}else{

	echo 'erro de conexao';
	
}



?>



