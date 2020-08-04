<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
 
$user = $_SESSION['usuario'];
$id = $_SESSION['id'];
$uid = $_GET['uid'];
?>

<?php
	require_once("funcao/funcao.php");
	get_header();
	
        
?>
    

  <div class="row-fluid sortable">		
				<div class="box box-solid box-danger">
					<div class="box-header with-border" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Editar Revendedor</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						
                                                <form action="btn_edit_rev2.php" method="post">

<?php
					    if(isset($_SESSION['msg']))
					    {
					      
					      echo $_SESSION['msg'];
					      unset($_SESSION['msg']);
					     
					    }
?>

<?php 
     include('includes/connection.php');
     $sql = "SELECT * FROM reg_users WHERE id = '$uid'";
     $resultado = mysql_query ($sql); //rs.open sql,con
     while ($result = mysql_fetch_array ($resultado)){ 
        
        $lg = $result['username']; 
        $em = $result['email'];
        $sh = $result['senha'];
        $credit = $result['credits'];

     
     }


?>
  <div class="form-group">
    <label for="nome">usuario: <?php echo $lg; ?></label>
    <input type=hidden name=uid value="<?php echo $uid ?>">
  </div>
  <div class="form-group">
    <label for="senha">senha:</label>
    <input type="text" class="form-control" name="senha" id="senha" placeholder="<?php echo $sh; ?>">
  </div>
  <button type="submit" class="btn btn-default">Atualizar Senha</button>
  </form>
<br>

<form action="btn_edit_rev2.php" method="post">

<?php
					    if(isset($_SESSION['msg']))
					    {
					      
					      echo $_SESSION['msg'];
					      unset($_SESSION['msg']);
					     
					    }
?>

 <div class="form-group">
 	<input type=hidden name=uid value="<?php echo $uid ?>">
 	</div>
  <div class="form-group">
    <label for="email">email:</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="<?php echo $em; ?>">
  </div>
  <button type="submit" class="btn btn-default">Atualizar email</button>
  </form>





    <?php

        get_footer()

?>