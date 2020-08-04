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
				<div class="box box-solid box-danger">
					<div class="box-header with-border" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Cadastrar Revendedor</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						
                                                <form action="rev_cadastrar.php" method="post">

<?php
					    if(isset($_SESSION['msg']))
					    {
					      
					      echo $_SESSION['msg'];
					      unset($_SESSION['msg']);
					     
					    }
?>

  <div class="form-group">
    <label for="nome">usuario:</label>
    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite o login do revendedor">
  </div>
  <div class="form-group">
    <label for="senha">senha:</label>
    <input type="text" class="form-control" name="senha" id="senha" placeholder="Digite a Senha do revendedor">
  </div>
  <div class="form-group">
    <label for="email">email:</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="Digite o e-mail">
  </div>
  <div class="form-group">
    <label for="credito">credito:</label>
    <input type="text" class="form-control" name="credito" maxlength="5" id="credito" placeholder="Quanto de credito">
  </div>
  <button type="submit" class="btn btn-default">cadastrar</button>
</form>






<?php

        get_footer()

?>