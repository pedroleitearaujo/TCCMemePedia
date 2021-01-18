<?php
 require_once'classes/Funcoes.php';
require_once'classes/Usuario.php';
$Usuario= new Usuario();


if(!empty($_POST['email'])){
    $email = $_POST['email'];
	if($resultado = $Usuario->buscaPalavra($email) != 'error'){
	$resultado = $Usuario->buscaPalavra($email);
 	}else{
  	header('location: EmailRecuperaSenha.php?email=error');
 	}
}else{
 	header('location: acessar.php');
}


if(isset($_POST['btnSecreta'])){
	$email = $_POST['email'];
    if(!empty($_POST['palavraSecreta'])){
	$palavraSecreta = $_POST['palavraSecreta'];
		if($palavraSecreta == $resultado['palavra_Secreta']){
			header('location: alterarsenha.php?email='.$email.'');		
		}
		else{
			echo '<script type="text/javascript">alert("Palavra Secreta errada, Tente novamente!");</script>';
			
		}
    }
     else{
     	echo "dd";
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


	<title>Recuperar Senha</title>

</head>
<body class="bg-light">
	<a class="btn btn-outline-dark" href="index.php" role="button">Voltar</a>

	<div class="container">

		<form name ="validador" class="form-signin" method="post"> 

			<div class="text-center mb-5 my-5">

				<h1 class="h3 mb-3 font-weight-normal">Verificação da palavra secreta</h1>

				<p class="lead">

					coloque a resposta da palavra secreta para recuperar sua senha
				</p>
			</div>

			<div class="form-label-group mb-3 col-md-4 offset-md-4">
				<label for="Email"><?php echo $resultado['pergunta_Secreta'];?></label>
				<input type="text" id="palavraSecreta" class="form-control" name="palavraSecreta" placeholder="Digite a palavra secreta" required="" autofocus="">
				<input class=""name="email" type="hidden" id="email" value="<?php echo $_POST['email']?>">
			</div>

			 <div class="col-md-4 offset-md-4">
			
			<input type="submit" name="btnSecreta" class="btn btn-outline-dark btn-lg btn-block" role="button" value="Verificar">

			</div>
			
			<p class="mt-5 mb-3 text-muted text-center">© 2019 MemePédia</p>
		</form>

	</div>

</body>
</html>



