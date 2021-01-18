<?php
require_once'classes/Funcoes.php';
require_once'classes/Usuario.php';
$Usuario= new Usuario();

session_start();

if(!empty($_SESSION["logado"]) == "sim"){
  $Usuario->usuariologado($_SESSION['usu']);
  $logado=true;
}else{
  $logado=false;
}

if($logado){
if(isset($_POST['btnAvaliar'])){
	$titulo = $_POST['titulo'];
	$artigo = $_POST['artigo'];
$resultado = $Usuario->inserirArtigo($_POST);
	if($resultado == 'ok'){
		echo '<script type="text/javascript">alert("Obrigado, avaliaremos em breve o artigo!");</script>';
			
		}
	}
}
else{
	header('location: /TccMemePedia/acessar.php');
}	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/style-inserirArtigo.css"> 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="js/toastr/build/toastr.css"/>
	<script src="js/toastr/toastr.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script> 
	<script type="text/javascript" src="js/bootstrap.js"></script> 
	<title>Inserir artigo</title>
</head>
<body>
	<div class="divInserirArtigo">
		<h1 class="ttlEnviarArtigo">Envie-nos um novo artigo</h1>
		<p class="txtAvaliacaoArtigos">
			Nós avaliaremos o artigo enviado e incluiremos no site assim que possível.
		</p>

		<form class="form-signin" method="post">
			<div class="col-md-6  offset-md-3">
				<p class="ttlArtigo">Titulo do artigo</p>
				<input type="text" id="email" class="iptArtigo" name="titulo" 
				placeholder="Digite o titulo do artigo" required="" autofocus="">
			</div>

			<div class="col-md-6  offset-md-3">
				<p class="ttlArtigo">Artigo</p>
				<textarea class="txtAreaArtigo" placeholder="Digite o artigo" 
				name="artigo" cols="100" rows="15"></textarea>
			</div>

			<div class="col-md-6  offset-md-3">
			<input type="submit" name="btnAvaliar" class="btnEnviarArtigo" role="button" 
			value="Enviar artigo">
			</div>
		</form> 

		<footer class="ftrMemepedia2019">
        <p class="txtMemepedia2019">© 2019 Memepédia</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#" class="list-inline-item">Privacidade</a></li>
            <li class="list-inline-item"><a href="#" class="list-inline-item">Termos</a></li>
            <li class="list-inline-item"><a href="#" class="list-inline-item">Suporte</a></li>
          </ul>
      </footer>
	</div>

</body>
</html>
