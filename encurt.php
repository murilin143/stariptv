<?php
session_start();
require_once("funcao/funcao.php");
 get_header();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
 
$user = $_SESSION['usuario'];
$id = $_SESSION['id'];
?>



      <div id="content-wrapper">

<div class="container">
<div class="box">
<div align="center">

         	<form method="GET" action="c_encurtador.php">
			   <div class="form-group row">
			    <label for="text" class="col-sm-2 col-form-label">Encurtador</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="text" name="enc" placeholder="Digite o Link">
			    </div>
			  </div>
			  <button type="submit" class="btn btn-primary mb-2">Encurtar</button>
			</form>



         </div> 
         </div> 
         </div> 

        <div class="container-fluid">

     




          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <tr>
                      <th>Id</th>
                      <th>Usuario</th>
                      <th>Senha</th>
                      <th>Vencimento</th>
                      <th>Actions</th>
                       <th>obs</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Usuario</th>
                      <th>Senha</th>
                      <th>Vencimento</th>
                      <th>Actions</th>
                      <th>obs</th>
                  </tr>
                  </tfoot>
                  <tbody>
                     <?php
                include('includes/connection.php');
                                include('includes/conex.php');


                $sql = mysql_query("SELECT * FROM cronjobs WHERE id = '2'");  
                     while ($dados = mysql_fetch_array($sql)) 
                     {  
                       $tempo_real =  $dados['timestamp'];  
                     }  

                $sql = "SELECT * FROM users WHERE member_id = '$id' ORDER BY id DESC";
                $result=mysql_query($sql); //rs.open sql,con

              while ($row=mysql_fetch_array($result))
              { 
              $data_venc = $row['exp_date'];
              $resultado = $data_venc - $tempo_real;
              $resut_final = $resultado /'86400';
                                                        $retirar = number_format($resut_final, 0 );
              $vencimento2 = date('d/m/Y', $data_venc);


                             $vencido = 'Vencido';                        
              ?><!--open of while -->
              

              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php 
                if ($retirar < '0'){
                                  echo $vencido;  


                }else{

                echo $vencimento2;  
              }

?>
                                    </td>
                
                <td class="center">

                                       
                      <a class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $row['id']; ?>">Link</a>
                      <div class="modal fade bd-example-modal-lg<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <h5 align="center "class="modal-title" id="exampleModalLabel">lista M3u</h5>
                        
                          <?php
                          $user = $row['id'];
                                              


                        $sql = mysql_query("SELECT * FROM users WHERE id = '$user'");
                        while ($dados = mysql_fetch_array($sql)) 
                                   {  
                                     $username =  $dados['username'];  
                                     $senha =  $dados['password'];
                                     $status =  $dados['enabled'];
 
                                   }  

                        $n1 = 'http://62.210.139.212:8888/get.php?username=';
                        $n2 = '&password=';
                        $n3 = '&type=m3u_plus&output=hls';
                        $total = $n1.$username.$n2.$senha.$n3;
                                                echo $total;

                        



                          ?>
                        </div>
                      </div>
                    </div>

                   <?php $botao = 'Block'; 

                  if ($status == 0)
              {             
              
              $botao = 'Desbloquear';
                   
               
              }else{

              $botao = 'Block';
                 

              }

 ?>


                      <a class="btn btn-success" href="btn_editar_user.php?uid=<?php echo $row['id']; ?>">Edit</a>
                                                                            <a class="btn btn-info"    href="w_renovacao.php?uid=<?php echo $row['id']; ?>">Renov</a>
                      <a class="btn btn-warning" href="btn_bloquear_user.php?uid=<?php echo $row['id']; ?>"><?php echo  $botao; ?></a>
                      <a class="btn btn-danger " onclick="return confirmDel()" href="btn_del_user.php?delID=<?php echo $row['id']; ?>">Del</a>
                    
        

                  </td>
                       <td>
                    
                      <a>
                                            

                                              


                      </a>
                    </td>
                
              </tr>
              <?php
                 } //close of while
              ?>
                
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

          <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
          </p>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>

  </body>

</html>
