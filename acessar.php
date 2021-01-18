<?php 
require_once'classes/Funcoes.php';
require_once'classes/Usuario.php';

$Funcoes= new Funcoes();
$Usuario= new Usuario();

session_start();

if(isset($_POST['btnLogin'])){
	$Usuario->loginUsuario($_POST);
}
if(!empty($_SESSION["logado"]) == "sim"){
	header('location:/TccMemePedia');	
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/style-acessar.css"> 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="js/toastr/build/toastr.css"/> 
	<title>Acessar</title>
</head>
<body>
	<div class="divAcessar">
		<h1 class="ttlAcessar">Acessar</h1>
		<p class="txtFacaLogin">Faça o login com sua conta para ter acesso ao site</p>

		<form class="form-signin" method="POST">
			<div class="col-md-6  offset-md-3">
				<p class="txtEmail">E-mail</p>
				<input type="Email" id="email" class="frmEmail" name="email" 
				placeholder="seuemail@exemplo.com.br" value="" required="" 
				data-toggle="tooltip" data-placement="top" title="seuemail@exemplo.com.br"
				autofocus="">
			</div> 

			<div class="col-md-6  offset-md-3">
				<p class="txtSenha">Senha</p>
				<input type="password" id="inputPassword" name="senha" 
				class="frmSenha"  placeholder="Digite sua senha" value="" 
				required="" data-toggle="tooltip" data-placement="top" 
				title="Digite sua senha">
			</div>

			<div class="col-md-6  offset-md-3">
				<input type="submit" name="btnLogin" 
				class="btnAcessar" role="button" value="Acessar">
				<?php if(isset($_GET["login"])=="error"){ 
			  		echo '<script type="text/javascript">
					toastr.error("Senha ou email errados!","Erro");
					</script>';
				}
				if(!empty($_GET['alteracao'])=='sim'){
			  		echo '<script type="text/javascript">
					toastr.success("Senha alterada com sucesso!","Parabéns");
					</script>';
				}
				?>
			</div>

			<div class="col-md-6  offset-md-3">
          		<a href="EmailRecuperaSenha.php" class="linkEsqueceuSuaSenha">
				Esqueceu sua senha?
		  		</a>
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
  	<script type="text/javascript" src="js/jquery.js"></script> 
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/toastr/toastr.js"></script>
</body>
</html>
