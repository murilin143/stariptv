<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }
 
$logado = $_SESSION['usuario'];
$ids = $_SESSION['id'];


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
            <h2><i class="halflings-icon white user"></i><span class="break"></span>Tickets</h2>
            <div class="box-icon">
              <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
              <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
              <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
            </div>
          </div>
          <div class="box-content">

           
<br>
 <form class="form-horizontal" enctype="multipart/form-data" action="cod_tickets.php" method="post">
        <?php
             session_start();
              if(isset($_SESSION['msg']))
              {
                
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
              }
              
              if(isset($_SESSION['require']))
              {
                echo $_SESSION['require'];
                unset($_SESSION['require']);
              }
            ?>
     <div class="form-group">
      <label for="ind">Login</label>
       <input type="text" id="ind" class="form-control -label col-sm-4" name="ind" readonly="readonly" value=<?php echo $logado ?>
     </div>
     <br>
     <div class="form-group">  
       <input type="text" class="form-control -label col-sm-4" id="text"  placeholder="titulo do tickets" name="titulo">
      </div> 
      <br>    
    <div class="form-group">     
      <textarea class="form-control -label col-sm-4" rows="7" id="comment" placeholder="Digite o nome do filme ou seriado:" name="msg"></textarea>
         </div> 

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-4">
        <button type="submit" class="btn btn-default">Enivar</button>
      </div>
    </div>
  </form>

  <?php

        get_footer()

?>