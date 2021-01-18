<?php
require_once'classes/Funcoes.php';
require_once'classes/Usuario.php';
$Usuario= new Usuario();

if(isset($_GET['email'])){
	if(isset($_POST['btnUpdate'])){	
		$confirmaSenha = $_POST['confirmaSenha'];	
		$senha = $_POST['senha'];
		$_POST['email']=$_GET['email'];
			if($senha == $confirmaSenha){
				$resultado = $Usuario->UpdateSenha($_POST);
				if($resultado == 'ok'){
					header('location: acessar.php?alteracao=sim');
				}
			}
			else{
				echo "Senhas diferentes";
			}
	}
}else{
	header('location: acessar.php');
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

	
	<title>Esqueci a senha</title>

</head>
<body class="bg-light">
	<a class="btn btn-outline-dark" href="acessar.php" role="button">Voltar</a>

	<div class="container">

		<form class="form-signin" method="post"> 

			<div class="text-center mb-5 my-5">


				<h1 class="h3 mb-3 font-weight-normal">Esqueci a senha</h1>

				<p class="lead">

					Alteração de senha
				</p>
			</div>

			<input type="hidden" name="email" value="<?php echo $_GET['email']?>">

			<div class="form-label-group mb-3 col-md-4 offset-md-4">
				<label for="senha">Nova senha</label>
				<input type="password" id="senha" class="form-control" name="senha" placeholder="Digite sua nova senha" required="" autofocus="">
			</div>

			<div class="form-label-group mb-3 col-md-4 offset-md-4">
				<label for="inputPassword">Confirmação de Senha</label>
				<input type="password" id="confirmaSenha" name="confirmaSenha" class="form-control" placeholder="Digite sua confirmação senha" required="">
			</div>

			 <div class="col-md-4 offset-md-4">
			
			<input type="submit" name="btnUpdate" class="btn btn-outline-dark btn-lg btn-block" role="button" value="Alterar">
			<?php if(isset($_GET["login"])=="error"){ 
			  echo '<script type="text/javascript">alert("Ops! E-mail ou Senha estão errado");</script>';
			}?> 
			</div>

			<p class="mt-5 mb-3 text-muted text-center">© 2019 MemePédia</p>
		</form>

	</div>


</body>
</html>