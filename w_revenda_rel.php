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
?>

<?php
	require_once("funcao/funcao.php");
	get_header();
	
        
?>
    <div id="wrapper">


        <div class="container-fluid">

       

          <div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Relatorio dos Revendedores</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Revendedores</th>
								  <th>Email</th>
								  <th>creditos</th>
								  <th>Actions</th>
								  <th>Status</th>
								  <th>Descricao</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");
						
								$sql = "SELECT * FROM reg_users WHERE notes = '$id'";
								$result=mysql_query($sql); //rs.open sql,con

							while ($row=mysql_fetch_array($result))
							{ ?><!--open of while -->
                                                         
                                                         	

							<tr>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['credits']; ?></td>
								<td class="center">

                                                <?php
$sta = $row['status'];
$botao = 'Block'; 

                  if ($sta == 0)
              {             
              
              $botao = 'Desbloquear';
                   
               
              }else{

              $botao = 'Block';
                 

              }


?>

									    
									    <a class="btn btn-success" href="btn_edit_rev.php?uid=<?php echo $row['id']; ?>">Edit</a>
                                        <a class="btn btn-info"    href="btn_credito_rev.php?uid=<?php echo $row['id']; ?>">Credits</a>
									    <a class="btn btn-warning" href="btn_bloquear_rev.php?uid=<?php echo $row['id']; ?>"><?php echo $botao; ?></a>
									    <a class="btn btn-danger " onclick="return confirmDel()" href="btn_del_rev.php?delID=<?php echo $row['id']; ?>">Del</a>
								    
										</td>
									     <td>
										
											
											</td>
								
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            

    <?php

        get_footer()

?>