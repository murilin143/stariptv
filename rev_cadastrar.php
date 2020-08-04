<?php

  include("includes/connection.php");
  include("includes/conex.php");
  session_start ();
  $member_id = $_SESSION['id'];

  $user = $_POST['usuario'];
  $senha = $_POST ['senha'];
  $email = $_POST ['email'];
  $credito = trim($_POST['credito']);

if($credito != is_numeric($credito)){
   $_SESSION["msg"]= "<div class='alert alert-danger'>O Campo credito so aceita numeros</div>";
header('location:w_revenda.php');
break;	
}


// verificar se existe revendedor com o mesmo nome
  $sql = mysql_query ("SELECT * FROM reg_users WHERE username ='$user'");
  $num = mysql_num_rows($sql);
if($num==1)
{
$_SESSION["msg"]= "<div class='alert alert-danger'>este usuario ja esta cadastrado</div>";
header('location:w_revenda.php');
break;	
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
             $status =  $dados['status'];
           } 
// comparar o minimo de cadastra credito do revendedor
if ($credito >= $rev_credito){
	$_SESSION["msg"]= "<div class='alert alert-danger'>você nao tem credito suficiente para cadastrar</div>";
header('location:w_revenda.php');
break;
}  

if ($status == '0'){
	$_SESSION["msg"]= "<div class='alert alert-danger'>SUA REVENDA FOI BLOQUEADA FALA COM ADMIN</div>";
header('location:w_revenda.php');
break;
}      

if ($credito <= '9'){
	$_SESSION["msg"]= "<div class='alert alert-danger'>O Minimo para criar uma conta e 10 creditos</div>";
header('location:w_revenda.php');
break;
}    

// comparar o minimo do credito do revendedor
if ($rev_credito <= '9'){
	$_SESSION["msg"]= "<div class='alert alert-danger'>voce nao tem credito suficiente para add uma revenda</div>";
header('location:w_revenda.php');
break;
}           

// comparar se o texto ta em brancoA|	
if ($user == ''){
	$_SESSION["msg"]= "<div class='alert alert-danger'>Digite o login do revendedor</div>";
header('location:w_revenda.php');
break;
}
if ($senha == ''){
	$_SESSION["msg"]= "<div class='alert alert-danger'>Digite o senha do revendedor</div>";
header('location:w_revenda.php');
break;
}
if ($email == ''){
	$_SESSION["msg"]= "<div class='alert alert-danger'>Digite o senha do revendedor</div>";
header('location:w_revenda.php');
break;
}
if ($credito == ''){
	$_SESSION["msg"]= "<div class='alert alert-danger'>Digite o senha do revendedor</div>";
header('location:w_revenda.php');
break;
}

$date_registered = $tempo_real;
$member_group_id = '5';
$verified = '1';
$notes = $member_id;
$status = '1';
$default_lang = 'English';
$verify_key = 'NULL';
$retirar = $rev_credito - $credito;


$sql = "INSERT INTO reg_users (username, senha, email, date_registered, member_group_id, verified, credits, notes, status,default_lang, verify_key )  
VALUES ('$user', '$senha', '$email' , '$date_registered' , '$member_group_id' ,'$verified' ,'$credito' ,'$notes' , '$status' ,'$default_lang' , '$verify_key')";


if ($connect->query($sql) === TRUE) {
    $sql= mysql_query("UPDATE reg_users SET credits = '$retirar' WHERE id ='$member_id'")OR DIE(mysql_error());


echo "<script>
	alert('cadastro realizado com sucesso'); location= './w_revenda.php';
	</script>";



} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

mysqli_close($connect);
?>
