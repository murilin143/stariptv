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

        
     <table class="table table-striped table-bordered bootstrap-datatable datatable">

						  <thead>
							  <tr>
								  <th>Id </th>
								  <th>Usuario </th>
								  <th>Ip</th>
								  <th>Assistindo</th>
								  <th>Pais</th>
								  
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include('includes/connection.php');
                                include('includes/conex.php');


								
					            

							$sql = "SELECT * FROM users WHERE member_id = '$id'";
							$result=mysql_query($sql); //rs.open sql,con

							while ($row=mysql_fetch_array($result))
							{ 
 							
                            $userid = $row['id'];
                            $username = $row['username'];

                              
                             $sql = mysql_query("SELECT * FROM  user_activity_now WHERE user_id = '$userid'");  
					           while ($dados = mysql_fetch_array($sql)) 
					           { 
					             $user_id = $dados['user_id']; 
					             $stream_id = $dados['stream_id']; 
                                 $ip = $dados['user_ip'];
                                 $pais = $dados['geoip_country_code'];
                                 
                              

                               $sql = mysql_query("SELECT * FROM  streams WHERE id = '$stream_id'");  
					           while ($dados = mysql_fetch_array($sql)) 
					           {  
					             $movie = $dados['stream_display_name']; 


							?><!--open of while -->
							

							<tr>
								<td><?php echo $user_id; ?></td>
								
								<td><?php echo $username; ?></td>
								
								<td><?php echo $ip;?> </td>   
										
								<td><?php echo $movie;?></td>
								<td><?php echo $pais;?></td>
							</tr>
							<?php
							   } 
							    }
							    }  //close of while
							?>
						  </tbody>
					  </table> 



</div>






   <?php

        get_footer()

?>