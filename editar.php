<?php  

require_once'classes/Funcoes.php';
require_once'classes/Usuario.php';

$Funcoes= new Funcoes();
$Usuario= new Usuario();

session_start();
 


$logado=false;

if(!empty($_SESSION["logado"]) == "sim"){
	$Usuario->usuariologado($_SESSION['usu']);
	$logado=true;	
}else{
	header('location:/TccMemePedia/acessar.php');
}


if(isset($_POST['btnAlterar'])){
	if($Usuario->queryUpdate($_POST)=='ok'){
		$Usuario->usuariologado($_SESSION['usu']);
		echo '<script type="text/javascript">alert("Dados alterados com sucesso!");</script>';
			
	}
	else{
		echo '<script type="text/javascript">alert("Erro ao alterar os dados!");</script>';
			
	}
	
}

if(isset($_POST['btnExcluir'])){

//header('location:/TccMemePedia/confirmarSenha.php');
      
if($Usuario->queryDelete($_POST)=='ok'){
		$Usuario->usuariologado($_SESSION['usu']);
		echo 'Excluido com sucesso';
	}
	else{
		echo 'Erro ao Excluir';
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


	<title>Perfil</title>

</head>
<body class="bg-light">
	<a class="btn btn-outline-dark" href="index.php" role="button">Voltar</a>

	<div class="container">

		<form class="form-signin" method="post" action=""> 

			<div class="text-center mb-5 my-5">

				<h1 class="h3 mb-3 font-weight-normal">Perfil</h1>

				<p class="lead">
					Você podera alterar e excluir dados.
				</p>
			</div>
<form method="POST" action="">
			<div class="form-label-group mb-3 col-md-4 offset-md-4">
				<label for="Email">nome</label>
				<input type="hidden" name="usu"     value="<?php if($logado){ echo $Funcoes->base64($_SESSION['usu'],1);} ?>">	
				<input type="text" name="nome"  class="form-control"  value="<?php if($logado){ echo $_SESSION['nome'];} ?>"required="" autofocus="">
			</div>
			<div class="form-label-group mb-3 col-md-4 offset-md-4">
				<label for="Email">email</label>
				<input type="email" name="email"  class="form-control" value="<?php if($logado){ echo $_SESSION['email'];} ?>"required="" autofocus="">
			</div>
			<div class="form-label-group mb-3 col-md-4 offset-md-4">
				<label for="Email">usuario</label>
			<input type="text" name="usuario"  class="form-control" value="<?php if($logado){ echo $_SESSION['usuario'];} ?>" required="" autofocus="">
			</div>

			 <div class="col-md-4 offset-md-4">
			
			
			
			<input type="submit" name="btnAlterar" role="button" value="Alterar">
			<button type="button"  data-toggle="modal" data-target="#modalExemplo">
 			 excluir
			</button>
			<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Você realmente deseja excluir os dados ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Depois de apagagos, a alteração não podera ser desfeita!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary" onclick="sweetalertclick()" name="btnExcluir" value="excluir">excluir</button>
      </div>
    </div>
  </div>
</div>

			</div>
			

			<p class="mt-5 mb-3 text-muted text-center">© 2019 MemePédia</p>
		</form>

	</div>

</body>
</html>
