<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
 
 $uid = $_POST['uid'];
 $senha = $_POST['senha'];
 $email = $_POST['email'];



//senha
if ($senha == ''){
  echo "<script>
  alert('para alterar precisar digita a nova senha'); location= './w_revenda_rel.php';
  </script>";
 
}else{

  include('includes/connection.php'); 
  $sql="UPDATE reg_users SET senha = '$senha' WHERE id ='$uid'";
      if(mysql_query($sql))
        echo "<script>
  alert('Senha Alterada com Sucesso'); location= './w_revenda_rel.php';
  </script>";


   

}

//email
if ($email == ''){
echo "<script>
  alert('para alterar precisar digita o novo email'); location= './w_revenda_rel.php';
  </script>";

}else{
 include('includes/connection.php');
$sql="UPDATE reg_users SET email = '$email' WHERE id ='$uid'";
      if(mysql_query($sql))
        echo "<script>
  alert('Email Alterada com Sucesso'); location= './w_revenda_rel.php';
  </script>";

   
}




?>