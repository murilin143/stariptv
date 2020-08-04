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
$nanda = $_GET['uid'];
?>

<?php
	require_once("funcao/funcao.php");
	get_header();
	
        
?>

     <!-- comeco -->

<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Muda a senha do Usuario</h2>
						<div class="box-icon">
							<a href="users.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">

<form class="form-horizontal" method="post" action="user_update_data.php">
<?php
					    if(isset($_SESSION['msg']))
					    {
					      
					      echo $_SESSION['msg'];
					      unset($_SESSION['msg']);
					    }
?>
							<fieldset>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Usuario:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="user" id="focusedInput" type="text" placeholder="Digite sua Senha"
								  
								</div>
							  </div>
							  
							  <div class="form-actions">
<br>
								<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary">Salvar</button>
								<input type="hidden" name="hid" value="<?php echo $nanda?>">
							  </div>
							</fieldset>
						</form>
<br>



						<form class="form-horizontal" method="post" action="update_data.php">
<?php
					    if(isset($_SESSION['msg']))
					    {
					      
					      echo $_SESSION['msg'];
					      unset($_SESSION['msg']);
					    }
?>
							<fieldset>
							  
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Password:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="senha" id="focusedInput" type="text" placeholder="senha"
								  
								</div>
							  </div>
							  
							  <div class="form-actions">
<br>
								<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary">Salvar</button>
								<input type="hidden" name="hid" value="<?php echo $nanda?>">
							  </div>
							</fieldset>
						</form>
<br>



					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->









     <!-- fim-->    

   <?php

        get_footer()

?>