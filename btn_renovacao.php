<?php


    include("includes/connection.php");
    include("includes/conex.php");
    session_start ();
    $member_id = $_SESSION['id'];
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
  {
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }

$userID = $_POST['hid'];
$numero = $_POST['renovacao'];
// convertendo os dias em crerditos
$cred = 0;

if ($numero == '30'){

	$cred = '1';
}	
if ($numero == '60'){

	$cred = '2';
}	
if ($numero == '90'){

	$cred = '3';
}	
if ($numero == '180'){

	$cred = '6';
}	
if ($numero == '365'){

	$cred = '12';
}	


// verificar o tempo original
$sql = mysql_query("SELECT * FROM cronjobs WHERE id = '2'");  
           while ($dados = mysql_fetch_array($sql)) 
           {  
             $tempo_real =  $dados['timestamp'];  
           }  


// verificar os credito do revendedor
$sql = mysql_query("SELECT * FROM  reg_users WHERE id = '$member_id'");  
           while ($dados = mysql_fetch_array($sql)) 
           {  
             $rev_credito =  $dados['credits'];  
           } 


$retirar =  $rev_credito - $cred;           
// comparar o minimo de cadastra credito do revendedor
if ($rev_credito <= '0'){
	$_SESSION["msg"]= "<div class='alert alert-danger'>O Minimo de renovar a conta e 1 creditos</div>";
header('location:w_cliente_rel.php');
break;
}    

if ($numero == ''){
echo 'voce nao selecionou a renovacao';
}

$soma = $numero * 86400;


$sql = mysql_query("SELECT * FROM  users WHERE id='$userID'");  
           while ($dados = mysql_fetch_array($sql)) 
           {  
             $exp_date =  $dados['exp_date'];  
           } 

 $date =  $exp_date + $soma;         

$sql = "UPDATE users SET exp_date = '$date' WHERE id='$userID'";

if(mysql_query($sql))
{

    $sql= mysql_query("UPDATE reg_users SET credits = '$retirar' WHERE id ='$member_id'")OR DIE(mysql_error());
    header('location:w_cliente_rel.php');
}
else
{
	die('Unable to update record: ' .mysql_error());
}
?>

