<?php
require_once'classes/Funcoes.php';
require_once'classes/Usuario.php';

$Funcoes= new Funcoes();
$Usuario= new Usuario();

session_start();

if(!empty($_SESSION["logado"]) == "sim"){
	$Usuario->usuariologado($_SESSION['usu']);
	$logado=true;	
}else{
	header('location:/TccMemePedia/acessar.php');
}

if(isset($_POST['btnAlterarSenha'])){
	if(sha1($_POST['senhaAtual']) == $_SESSION['senha']){
		if($_POST['senhaNova']==$_POST['senhaNova2']){
			if($Usuario->queryUpdateSenha($_POST)=='ok'){
				$Usuario->usuariologado($_SESSION['usu']);
				echo 'Alterado com sucesso!!';
			}
			else{
				echo 'Erro ao alterar!!';
			}
		}else{
			echo 'Senhas diferentes!!';
		}
	}else{
		echo 'Digite a senha atual correta!!';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Senha</title>
</head>
<body>
<form method="POST" action="">
	<input type="hidden" name="usu"          value="<?php if($logado){ echo $Funcoes->base64($_SESSION['usu'],1);} ?>">
	Senha Atual<br>
	<input type="password"   name="senhaAtual"  placeholder="Senha atual" value="">
	<hr>Senha nova<br>
	<input type="password"   name="senhaNova"   placeholder="Senha nova" value="">
	<br>Confirmação de senha<br>
	<input type="password"   name="senhaNova2"  placeholder="Digite a nova senha novamente" value="">
	<input type="submit" name="btnAlterarSenha" role="button" value="Alterar Senha">
</form>
</body>
</html>