<?php
require_once 'includes/config.php';
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:login.php');
  }

$categoria = $_GET['cat'];
 
$logado = $_SESSION['usuario'];
$senhaa = $_SESSION['senha'];
$ids = $_SESSION['id'];



  require_once("funcao/funcao.php");
  get_web_header();
  
        
?>

      <div id="content-wrapper">

        <div class="container-fluid">
                  <!-- comeco do site-->

 <div class="row">
<!-- Grid column -->
      <?php
       
$sql="SELECT * FROM streams WHERE category_id = '$categoria' ORDER BY id DESC "; 
$result=mysql_query($sql);

while ($dados= mysql_fetch_array($result)) {
  $legenda = $dados ["stream_display_name"];
    $result1 = explode('","', $dados ["movie_propeties"]);
    $result1 = str_replace('\/\/', '//' , $result1); 
    $result1 = str_replace('\/', '/' , $result1);
    $result1 = str_replace('{"director":"', ' ' , $result1);      
    $novo_texto = str_replace('{"movie_image":"', ' ' , $result1);
  $nome = $novo_texto[0];
$ids = $dados['id'];

$fort = $dados['target_container_id'];

$formato = '';
 
if ($fort == '1'){

$formato = '.MP4';
}elseif ($fort == '3') {
  $formato = '.MKV';

}

//$barra = '/';
//$linkplay = $link_movie.$barra.$logado.$barra.$senhaa.$barra;

  
 ?>
    
    <div class="col-xs-3 col-sm-4 col-lg-2 col-md-3">
      <div class="thumbnail">       
        <a data-value="<?php echo $ids; ?>"  data-toggle="modal" data-target="#myModal<?php echo $ids; ?> " >
         <img  class="border border-light img-responsive" src="<?php echo $nome; ?>"  width='200' height='300' style="width:100%" ;>
         <span><?php echo $dados['stream_display_name']; ?></span>
          </a>       
      </div>
    </div>
 
  

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $ids; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

    

      <h4 align="center" class="modal-title" id="myModalLabel"><?php echo $linkplay ?><?php echo $ids ?><?php echo $formato ?></h4>
      </div>
      <div class="modal-body">
        <video style="width: 100%; height: auto; margin:0 auto; frameborder:0;"
id="video1"
class="video-js"
controls="controls"
autoplay="true" 
preload="auto"
poster="<?php echo $nome; ?>"
data-setup='{}'>
<source src="http://62.210.139.212:8888/movie/<?php echo $logado; ?>/<?php echo $senhaa; ?>/<?php echo $ids ?><?php echo $formato ?>"></source>
<p class="vjs-no-js">
To view this video please enable JavaScript, and consider upgrading to a
web browser that
<a href="http://videojs.com/html5-video-support/" target="_blank">
  supports HTML5 video
</a>
</p>
</video>
      </div>
      <div class="modal-footer">
        <a href="#fechar" type="button" class="btn btn-default" data-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>


<?php } ?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php
          // fim do site-->


        get_footer()

?>