<?php


    include("includes/connection.php");
    include("includes/conex.php");

    $userID = $_GET['uid'];
	$sql = mysql_query("SELECT * FROM users WHERE id = '$userID'");
	while ($dados=mysql_fetch_array($sql))
							{ 
 	$user = $dados['username'];


}


?>		


<?php
	require_once("funcao/funcao.php");
	get_header();
	
        
?>

    <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Renovacao de Clientes:</h2>
						<div class="box-icon">
							<a href="users.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="btn_renovacao.php">
							<fieldset>
								
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Username: <?php echo $user ?></label>
							 </div>
							  <br>
								<select name="renovacao">
								<option value="30">30 Dias - 1 Credito</option>
								<option value="60">60 Dias - 2 Creditos</option>
								<option value="90">90 Dias - 3 Creditos</option>
								<option value="180">180 Dias - 6 Creditos</option>
								<option value="365">365 Dias - 12 Creditos</option>
								</select>
													
							  <div class="form-actions">
							  	<br>
								<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary">Save Changes</button>
								<input type="hidden" name="hid" value="<?php echo $userID ?>">
							  </div>
							</fieldset>
						</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->







     <!-- fim-->    

    <?php

        get_footer()

?>