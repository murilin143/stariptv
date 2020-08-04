<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
 
$logado = $_SESSION['usuario'];
?>

<?php
	require_once("funcao/funcao.php");
	get_header();
	
        
?>

      <div id="content-wrapper">

        <div class="container-fluid">

       		
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Cadastrar usuario</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						
                                                <form action="user_cadastrar.php" method="post">

<?php
					    if(isset($_SESSION['msg']))
					    {
					      
					      echo $_SESSION['msg'];
					      unset($_SESSION['msg']);

					    }
?>

  <div class="form-group">
    <label for="nome">usuario:</label>
    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite o login do usuario">
  </div>
  <div class="form-group">
    <label for="senha">senha:</label>
    <input type="text" class="form-control" name="senha" id="senha" placeholder="Digite a Senha do usuario">
  </div>
  <select name="planos">
   <option>Planos</option>
   <?php
         include("includes/connection.php");

     $planos = "SELECT * FROM packages";
     $resultado = mysql_query ($planos); //rs.open sql,con
     while ($result = mysql_fetch_array ($resultado)){ ?>
        <option value="<?php echo $result ['id']; ?>">
        <?php echo $result['package_name']; ?>
        </option> <?php
     
     }
   ?>
      
  </select> <br><br>
  <select name="conexao">
  <option value="1">01 Conexao</option>
  <option value="2">02 Conexao</option>
  <option value="3">03 Conexao</option>
  <option value="4">04 Conexao</option>
  </select> <br><br>

  <button type="submit" class="btn btn-default">cadastrar</button>
</form>










  <?php

        get_footer()

?>