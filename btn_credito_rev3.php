<?php

  include("includes/connection.php");
  include("includes/conex.php");
  session_start ();
  $member_id = $_SESSION['id'];

  $uid = $_POST['uid'];
  $credito = trim($_POST['retirar']);

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


if ($credito == ''){
  $_SESSION["msg"]= "<div class='alert alert-danger'>Digite o valor do credito </div>";
header('location:btn_credito_rev.php');
break;
}

if ($credito <= 0){
  $_SESSION["msg"]= "<div class='alert alert-danger'>VOCE NAO PODE TIRAR MAIS CREDITOS </div>";
header('location:btn_credito_rev.php');
break;
}

if ($credito > $credito2){
  $_SESSION["msg"]= "<div class='alert alert-danger'>VOCE NAO PODE TIRAR A  MAIS CREDITOS </div>";
header('location:btn_credito_rev.php');
break;
}


$somar = trim($rev_credito + $credito );



 $sql= mysql_query("UPDATE reg_users SET credits = '$somar' WHERE id ='$member_id'")OR DIE(mysql_error());

  if ( $sql === TRUE ) {
           $sql = mysql_query("UPDATE reg_users SET credits = credits - '$credito' WHERE id ='$uid'")OR DIE(mysql_error());
              
echo "<script>
  alert('creditos enviado com Sucesso'); location= './btn_credito_rev.php';
  </script>";



} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

mysqli_close($connect);
?>


