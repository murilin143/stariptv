<?php
include("includes/connection.php");
include("includes/conex.php");
session_start();
$member_id = $_SESSION['id'];

$user = $_POST ['usuario'];
$pass = $_POST ['senha'];
$planos = $_POST ['planos'];
$conex = $_POST ['conexao'];

$sql = mysql_query ("SELECT * FROM users WHERE username ='$user'");
$num = mysql_num_rows($sql);
if($num==1)
{
$_SESSION["msg"]= "<div class='alert alert-danger'>este usuario ja esta cadastrado</div>";
header('location:w_cliente.php');
break;  
}

$sql = mysql_query("SELECT * FROM cronjobs WHERE id = '2'");  
           while ($dados = mysql_fetch_array($sql)) 
           {  
             $tempo_real =  $dados['timestamp'];  
           }  

$sql = mysql_query("SELECT * FROM  reg_users WHERE id = '$member_id'");  
           while ($dados = mysql_fetch_array($sql)) 
           {  
             $rev_credito =  $dados['credits']; 
             $status =  $dados['status']; 
           } 

if ($status == '0'){
       
$_SESSION["msg"]= "<div class='alert alert-danger'>SUA REVENDA FOI BLOQUEADA FALE COM O ADMIN</div>";
header('location:w_cliente.php');
break;
}


 if ($rev_credito <= 1){
$_SESSION["msg"]= "<div class='alert alert-danger'>você nao tem credito suficiente para cadastrar cliente</div>";
header('location:w_cliente.php');
break;
}
           
echo $planos;
if ($planos == 'Planos'){
       
$_SESSION["msg"]= "<div class='alert alert-danger'>escolha um plano para continuar o cadastro</div>";
header('location:w_cliente.php');
break;
}

if ($member_id == ''){
echo "erro";
break;
}

if ($rev_credito == ''){
echo "erro";
break;
}

if ($user == ''){
$_SESSION["msg"]= "<div class='alert alert-danger'>digite o login do usuario</div>";
header('location:w_cliente.php');
break;
}
if ($pass == ''){
$_SESSION["msg"]= "<div class='alert alert-danger'>digite a senha do usuario</div>";
header('location:w_cliente.php');
break;
}
if ($planos == ''){
echo "erro";
header('location:w_cliente.php');

break;
}else{
$sql = "SELECT * FROM packages WHERE id = '$planos'";
$resultado = mysql_query ($sql);
while ($result = mysql_fetch_array ($resultado)){
$pacote = $result['package_name'];
$credito_pac = $result['official_credits']; // credito do pacote
$durac = $result['official_duration'];
$bouquets = $result['bouquets'];
$trial = $result['is_trial'];
$offic = $result['is_official'];
$mes = $result['official_duration_in'];
$trialc = $result['trial_credits'];

}
}

$duracao2 = '';

// TRIAL DO PACOTE

if ($trial >= 1){

// creditos

 $retirar = $rev_credito -  $trialc;

 // tempo

 if ($mes == 'hours'){

$duracao2 = $durac * 3600;

}elseif ($mes == 'days'){

$duracao2 = $durac * 86400;

}elseif ($mes == 'months') {

$duracao2 = $durac * 30 * 86400;

}elseif ($mes == 'years') { 

$duracao2 = $durac * 365 * 86400;

}


}else{

// OFICIAL PACOTE

  if($conex == 1){

$retirar = $rev_credito - $credito_pac;

  }else{

$retirar = $rev_credito - $conex - $credito_pac  ;

  }

  

// tempo 

  if ($mes == 'hours'){

$duracao2 = $durac * 3600;

}elseif ($mes == 'days'){

$duracao2 = $durac * 86400;

}elseif ($mes == 'months') {

$duracao2 = $durac * 30 * 86400;

}elseif ($mes == 'years') { 

$duracao2 = $durac * 365 * 86400;

}


}

$tempo = $tempo_real + $duracao2;

$admin_enabled = '1';
$max_connections = $conex;
$is_restreamer = '0';
$is_isplock = '1';
$is_trial = $trial;
$offic2 = $offic;





$sql2 = "INSERT INTO users (member_id, username, password, exp_date, admin_enabled, bouquet, max_connections, is_restreamer, created_at, created_by, is_isplock, is_trial)  
VALUES ('$member_id', '$user', '$pass' , '$tempo' , '$admin_enabled' ,'$bouquets' ,'$max_connections' ,'$is_restreamer' ,'$tempo_real' , '$member_id' , '$is_isplock', '$trial')";


if ($connect->query($sql2) === TRUE) {

$sql= mysql_query("UPDATE reg_users SET credits = '$retirar' WHERE id ='$member_id'")OR DIE(mysql_error());

$sql = mysql_query("SELECT * FROM  users WHERE username = '$user'");  
           while ($dados = mysql_fetch_array($sql)) 
           {  
             $ids =  $dados['id']; 
              
           } 

$sql3 = "INSERT INTO user_output (user_id, access_output_id))
VALUES ('$ids','1')";
if ($connect->query($sql3) === TRUE) {
  
} 

$sql3 = "INSERT INTO user_output (user_id, access_output_id))
VALUES ('$ids','2')";
if ($connect->query($sql3) === TRUE) {

 }  


echo "<script>
  alert('cadastro realizado com sucesso'); location= './w_cliente.php';
  </script>";
   
} else {
    echo "Error: " . $sql2 . "<br>" . $connect->error;
}

mysqli_close($connect);

?>