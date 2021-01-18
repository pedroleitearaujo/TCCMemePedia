<?php 
require_once'classes/Funcoes.php';
require_once'classes/Usuario.php';
require_once'classes/Comentario.php';


$Funcoes= new Funcoes();
$Usuario= new Usuario();
$Coment= new Comentario();

session_start();

$idMeme=1;

if(!empty($_SESSION["logado"]) == "sim"){
  $Usuario->usuariologado($_SESSION['usu']);
  $logado=true;
}else{
  $logado=false;
}

if(isset($_POST['btnComentario'])){
	if($logado){
	  if($_POST['comentario']!=""){
		if($Coment->queryInsertComentario($_POST)=='ok'){
			ECHO 'COMENTARIO INSERIDO';
			header('location:/tccmemepedia/comentario.php');
		}else{
			echo 'erro ao inserir o comentario';
		}
	  }
	 }else{
	 	echo 'PRECISA ESTAR LOGADO PARA COMENTAR!!';
	 }
}
if(!empty($_GET['alterar'])){
	$alterar=$_GET['alterar'];
}else{
$alterar='';
}

if(isset($_POST['btnEnviar'.$alterar])){
	ECHO 'EAE CARLAHOI';
	if($logado){
	  if($_POST['comentario2']!=""){
		if($Coment->updateComentario($_POST)=='ok'){
			ECHO 'COMENTARIO ALTERADO';
			header('location:/tccmemepedia/comentario.php');
		}else{
			echo 'erro ao ALTERAR o comentario';
		}
	  }
	 }else{
	 //	echo 'PRECISA ESTAR LOGADO PARA COMENTAR!!';
	 }
}

if($Coment->querySelecionaComentario($idMeme)!=0){
$comentario=$Coment->querySelecionaComentario($idMeme);
}

if(isset($_GET['excluir'])){
	if($Coment->deleteComentario($_GET['excluir'])=='ok'){
		ECHO 'COMENTARIO EXCLUIDO';
		header('location:/tccmemepedia/comentario.php');
	}else{
		echo 'erro ao EXCLUIR o comentario';
	}	
}
if(isset($_GET['alterar'])){
	$_POST['idComentario'] = $_GET['alterar'];
	//$_POST['comentario'] = $_GET['comentario'];

	/*if($Coment->updateComentario($_POST)=='ok'){
		header('location:/tccmemepedia/comentario.php');
	}else{
		echo 'erro ao EXCLUIR o comentario';
	}*/	
}
?>
<html>
<head>
	<title>Comentario</title>
</head>
<body>
<form method="POST">
	<input type="hidden" id="idUsu" name="usu" value="<?php echo $_SESSION['usu'] ?>">
	<input type="hidden" id="idMeme" name="idMeme" value="<?php echo $idMeme; ?>">
	<input type="hidden" id="idMeme" name="idComentario" value="<?php if(!empty($_GET['alterar'])){echo $_GET['alterar'];} ?>">
	<input type="text" 	 id="comentario" name="comentario" placeholder="Digite um Comentario">
	<input type="submit" name="btnComentario" role="button" value="Enviar Comentario">
	<?php if(!empty($comentario)) { 
		$Coment->mostrarComentario($comentario);
	}
	?>
</form>
</body>
</html>


