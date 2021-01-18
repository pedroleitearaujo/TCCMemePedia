<?php
require_once'classes/Funcoes.php';
require_once'classes/Usuario.php';
$Usuario= new Usuario();

if(!empty($_GET['email']) =='error'){
	echo'<script type="text/javascript">
		 toastr.success("Sem esse email no banco","Não Encontrado");
		 </script>';
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/style-emailRecuperacao.css"/> 
	<link rel="stylesheet" href="js/toastr/build/toastr.css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/toastr/toastr.js"></script>
	<title>Acessar</title>
</head>
<body>
	<div class="divEmailRecuperacao">
		<h1 class="ttlEsqueciMinhaSenha">Esqueci minha senha</h1>
		<p class="txtDigiteSeuEmail">Digite seu e-mail para recuperar sua senha</p>

		<form class="form-signin" method="post" action="validador.php">
			<div class="col-md-6  offset-md-3">
				<p class="txtEmail">E-mail</p>
				<input type="Email" id="email" class="frmEmail" name="email" 
				placeholder="Digite seu e-mail" required="" autofocus="">
			</div> 

			<div class="col-md-6  offset-md-3">
				<input type="submit" name="btnEnviar" class="btnEnviar" role="button">
			</div>
			<?php 
			if(!empty($_GET['email']) =='error'){
				echo'<script type="text/javascript">
					 toastr.error("Sem esse email no banco","Não Encontrado");
					 </script>';
					}
			?>

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
