<?php
 require_once'classes/Funcoes.php';
require_once'classes/Usuario.php';
$Usuario= new Usuario();

if(!empty($_GET['email']) =='error'){
	ECHO 'TA SEM ESSE EMAIL NO BANCO IRMAO';
}

?>
<html lang="pt-br">
<meta charset="utf-8">
<html>
<head>
<title> Recuperar Senha </title>
</head>
<body>

<form name="form1" method="post" action="validador.php">
<font face=Tahoma size=2 color=black><br>
<div align="center"><b></b> 

 	<input class="" name="email" type="text1" id="email" placeholder="Digite seu email de cadastro !" size="40" autofocus required />
 	<input type="submit" name="btnVerificar" value="Verificar">


</p>
</form>
</div>

</style>
</form>

</body>
</html>
