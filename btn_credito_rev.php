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
						
     <form action="btn_credito_rev2.php" method="post">

     	<?php 
     include('includes/connection.php');
     $sql = "SELECT * FROM reg_users WHERE id = '$uid'";
     $resultado = mysql_query ($sql); //rs.open sql,con
     while ($result = mysql_fetch_array ($resultado)){ 
        
        $lg = $result['username']; 
        
       
     
     }


?>
            
						 <div class="form-group">
    <label for="nome">Revendedor: <?php echo $lg ?> </label>
    <input type=hidden name=uid value="<?php echo $uid ?>">
    </div>
     
    <div class="form-group">
    <label for="credito">credito:</label>
    <input type="text" class="form-control" name="credito" maxlength="5" id="credito" placeholder="Digite a quantidade de credito">
    </div>
    <button type="submit" class="btn btn-default">Atualizar</button>
   </form>
<br>
<br>

 <form action="btn_credito_rev3.php" method="post">

     	<?php 
     include('includes/connection.php');
     $sql = "SELECT * FROM reg_users WHERE id = '$uid'";
     $resultado = mysql_query ($sql); //rs.open sql,con
     while ($result = mysql_fetch_array ($resultado)){ 
        
        $lg = $result['username']; 
        
       
     
     }


?>
            
						 <div class="form-group">
    <label for="nome">Revendedor: <?php echo $lg ?> </label>
    <input type=hidden name=uid value="<?php echo $uid ?>">
    </div>
     
    <div class="form-group">
    <label for="credito">credito:</label>
    <input type="text" class="form-control" name="retirar" maxlength="5" id="credito" placeholder="Retirar credito">
    </div>
    <button type="submit" class="btn btn-default">Retirar</button>
   </form>





    <?php

        get_footer()

?>