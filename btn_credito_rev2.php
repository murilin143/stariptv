<?php

  include("includes/connection.php");
  include("includes/conex.php");
  session_start ();
  $member_id = $_SESSION['id'];

  $uid = $_POST['uid'];
  $credito = trim($_POST['credito']);

if($credito != is_numeric($credito)){
   $_SESSION["msg"]= "<div class='alert alert-danger'>O Campo credito so aceita numeros</div>";
header('location:btn_credito_rev.php');
break;  
}

// verificar os credito do revendedor
$sql = mysql_query("SELECT * FROM  reg_users WHERE id = '$member_id'");  
           while ($dados = mysql_fetch_array($sql)) 
           {  
             $rev_credito =  $dados['credits'];  
           } 

// verificar os credito cliente revendedor
$sql = mysql_query("SELECT * FROM  reg_users WHERE id = '$uid'");  
           while ($dados = mysql_fetch_array($sql)) 
           {  
             $credito2 =  $dados['credits'];  
           }            
// comparar o minimo de cadastra credito do revendedor
if ($credito > $rev_credito){
  $_SESSION["msg"]= "<div class='alert alert-danger'>você nao tem credito suficiente para cadastrar</div>";
header('location:btn_credito_rev.php');
break;
}    

if ($credito <= '4'){
  $_SESSION["msg"]= "<div class='alert alert-danger'>O Minimo para criar uma conta e 5 creditos</div>";
header('location:btn_credito_rev.php');
break;
}    

// comparar o minimo do credito do revendedor
if ($rev_credito <= '4'){
  $_SESSION["msg"]= "<div class='alert alert-danger'>voce nao tem credito suficiente para add uma revenda</div>";
header('location:btn_credito_rev.php');
break;
}           

if ($credito == ''){
  $_SESSION["msg"]= "<div class='alert alert-danger'>Digite o valor do credito </div>";
header('location:btn_credito_rev.php');
break;
}


$retirar = trim($rev_credito - $credito);
$somar = trim($credito2 + $credito);



 $sql= mysql_query("UPDATE reg_users SET credits = '$retirar' WHERE id ='$member_id'")OR DIE(mysql_error());

  if ( $sql === TRUE ) {
           $sql = mysql_query("UPDATE reg_users SET credits = '$somar' WHERE id ='$uid'")OR DIE(mysql_error());
              
echo "<script>
  alert('creditos enviado com Sucesso'); location= './btn_credito_rev.php';
  </script>";



} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

mysqli_close($connect);
?>


