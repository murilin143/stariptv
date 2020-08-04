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
include("includes/connection.php");
$sql = "SELECT * FROM reg_users WHERE username = '$logado'";
    $result=mysql_query($sql); //rs.open sql,con
    while ($row=mysql_fetch_array($result)){
      $credito = $row['credits'];
    }

$sql =  mysql_query("SELECT COUNT(member_id) as total  FROM users WHERE member_id = '$ids'");
$cont =  mysql_fetch_assoc($sql);
$conta = $cont['total'];
  
$sql =  mysql_query("SELECT COUNT(id) as total  FROM users");
$cont =  mysql_fetch_assoc($sql);
$conta1 = $cont['total'];

$sql =  mysql_query("SELECT COUNT(id) as total  FROM streams");
$cont =  mysql_fetch_assoc($sql);
$ativo = $cont['total'];

$sql =  mysql_query("SELECT COUNT(id) as total  FROM streams WHERE type = '1'");
$cont =  mysql_fetch_assoc($sql);
$live = $cont['total'];


  require_once("funcao/funcao.php");
  get_header();
  
        
?>

      <div id="content-wrapper">

        <div class="container-fluid">
                  <!-- comeco do site-->

       

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-70">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><h3><?php echo $conta1; ?></h3>TOTAL DE CLIENTES</div>
                </div>
                

              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-secondary o-hidden h-70">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><h3><?php echo $conta; ?></h3>SEUS CLIENTES</div>
                </div>
                
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-70">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5"><h3><?php echo $ativo; ?></h3>TOTAL DE VODS</div>
                </div>
                
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-secondary o-hidden h-70">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div><h3><?php echo $live; ?></h3>TOTAL DE CANAIS</div>
                </div>
                </div>
            </div>
          </div>

        
<p align="center">BEM VINDO A</p>
<p align="center"><em><strong><span style="color: #ff0000;"><?php echo $site; ?></span></strong></em></p>
<p align="center">&nbsp;______</p>
<p align="center">PARA SOLICITAR CONTEUDOS FAVOR ABRIR TICKET.</p>
<p align="center">FILMES: PRAZO DE 24 A 48 HORAS.<br />S&Eacute;RIES: PRAZO DE 72 A 96 HORAS.</p>
<p align="center"><span style="color: #ff0000;">ATEN&Ccedil;&Atilde;O REVENDEDORES&nbsp;</span></p>
<p align="center">Novidades</p>
<p align="center"><span style="text-decoration: underline;"><em><strong><span style="color: #ff0000; text-decoration: underline;">CRIACAO DE SUB-REVENDAS</span></strong></em></span></p>
<p align="center">S&Oacute; SER&Aacute; ACEITO A CRIA&Ccedil;&Atilde;O DE PAINEL&nbsp;</p>
<p align="center">&nbsp;SUB-REVENDEDORES ACIMA DE 10 CR&Eacute;DITOS&nbsp;.</p>
<p align="center">&nbsp; &nbsp;A equipe Sisine iptv</p>
<p align="center">Agradece</p>
<p align="center">-------------------------------------------------------------------</p>
<p align="center">NOVIDADE TEMOS APP PR&Oacute;PRIO NO PLAY STORE!</p>
<p align="center">NESTE APP S&Oacute; &Eacute; NECESS&Aacute;RIO GERAR LOGIN E SENHA</p>
<p align="center">EM BREVE
<p align="center">-------------------------------------------------------------------</p>
<p align="center">USE APENAS O NOSSO ENCURTADOR:&nbsp; &nbsp;</p>
<p align="center">EM BREVE
<p align="center">--------------------------------------------------------------------&nbsp;</p>
<p align="center">TUTORIAL PARA OS DISPOSITIVOS ABAIXO:</p>
<p align="center">&nbsp;</p>
<p align="center">SMARTPHONE E TV BOX E ANDROIDS EM GERAL:</p>
<p align="center">https://youtu.be/PdE4W1dPgOQ</p>
<p align="center">&nbsp;</p>
<p align="center">PC, NOTEBOOK, COMPUTADOR:</p>
<p align="center">http://borpas.info/iptvplayer-get</p>
<p align="center">-----------------------------------------------------------------------</p>
<p align="center">SMART TV</p>
<p align="center">&nbsp;</p>
<p align="center"><span lang="EN-US">SMARTV PHILIPS:</span></p>
<p align="center"><span lang="EN-US">https://www.youtube.com/watch?v=QN6q-HRUmXI</span></p>
<p align="center"><span lang="EN-US">&nbsp;</span></p>
<p align="center"><span lang="EN-US">SMARTV PANASONIC:</span></p>
<p align="center"><span lang="EN-US">https://youtu.be/qDSgEuApdF8</span></p>
<p align="center"><span lang="EN-US">&nbsp;</span></p>
<p align="center"><span lang="EN-US">SMARTV SAMSUNG:</span></p>
<p align="center"><span lang="EN-US">https://youtu.be/nNU-cpbXLOI</span></p>
<p align="center"><span lang="EN-US">&nbsp;</span></p>
<p align="center"><span lang="EN-US">SMARTV LG:</span></p>
<p align="center"><span lang="EN-US">https://youtu.be/B_cPpBaCp2I</span></p>
<p align="center"><span lang="EN-US">&nbsp;</span></p>
<p align="center"><span lang="EN-US">SMARTV ALTERNATIVAS:</span></p>
<p align="center"><span lang="EN-US">https://www.youtube.com/watch?v=2ZXErGUgePI</span></p>
<p align="center"><span lang="EN-US">--------------------------------------------------------------------&nbsp;</span></p>
<p align="center">OUTROS DISPOSITIVOS:</p>
<p align="center">&nbsp;</p>
<p align="center">ESPELHAMENTO NA SMARTV</p>
<p align="center">https://youtu.be/Xp-RA09I_tk</p>
<p align="center">&nbsp;</p>
<p align="center">XBOX 360</p>
<p align="center">https://youtu.be/McT_j_o7lW4</p>
<p align="center">&nbsp;</p>
<p align="center">LAZY IPTV</p>
<p align="center">https://youtu.be/rhbUBklz4U8</p>
<p align="center">&nbsp;</p>
<p align="center"><span lang="EN-US">KODI</span></p>
<p align="center"><span lang="EN-US">https://youtu.be/sTTcwvOILFU</span></p>
<p align="center"><span lang="EN-US">&nbsp;</span></p>
<p align="center"><span lang="EN-US">Ps3, Ps4</span></p>
<p align="center">https://youtu.be/BBXWUXhTw8Q</p>
<p align="center">&nbsp;</p>
<p align="center">CHROMECASTE EXTREME IPTV</p>
<p align="center">https://youtu.be/oCY6wI_Bqmg</p>
<p align="center">&nbsp;</p>
<p align="center">IPTVPLAYER</p>
<p align="center">https://youtu.be/gdKqbskGPRU</p>
<p align="center">&nbsp;</p>
<p align="center">IPHONE/IPAD/APPLE EM GERAL:</p>
<p align="center">https://itunes.apple.com/br/app/gse-smart-iptv-pro/id1028734023?mt=8</p>
<p align="center">&nbsp;</p>
<p align="center">-------------------------------------------------------------------</p>

            <!-- fim do site-->
<?php

        get_footer()

?>