<?php
 require_once'classes/Funcoes.php';
require_once'classes/Usuario.php';
$Usuario= new Usuario();


session_start();



if(isset($_POST['btnExcluir'])){
	$resultado = $Usuario->buscaSenha($_POST);
	if($resultado == 'ok'){
		if($Usuario->queryDelete($_POST)=='ok'){
		$Usuario->usuariologado($_SESSION['usu']);
		echo 'Excluido com sucesso';
	}
	}
	
	}




?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>

	<link rel="stylesheet" type="text/css" href="css/style.css"/> 

	<link rel="stylesheet" href="js/toastr/build/toastr.css"/>

	<script type="text/javascript" src="js/jquery.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>

	<script src="js/toastr/toastr.js"></script>


	<title>Acessar</title>

</head>
<body class="bg-light">
	<a class="btn btn-outline-dark" href="index.php" role="button">Voltar</a>

	<div class="container">

		<form class="form-signin" method="post" > 

			<div class="text-center mb-5 my-5">

				<h1 class="h3 mb-3 font-weight-normal">Confirmar a senha</h1>

				<p class="lead">
					Corfirme sua senha para excluir os dados!
				</p>
			</div>

			<div class="form-label-group mb-3 col-md-4 offset-md-4">
				<label for="Email">Senha</label>
				<input type="Password" id="senha1" class="form-control" name="senha1" placeholder="Digite sua senha" required="" autofocus="">
			</div>

			 <div class="col-md-4 offset-md-4">
			
			<input type="submit" name="btnExcluir" value="Verificar" class="btn btn-outline-dark btn-lg btn-block" role="button">

			</div>

			<p class="mt-5 mb-3 text-muted text-center">© 2019 MemePédia</p>
		</form>

	</div>

</body>
</html>
