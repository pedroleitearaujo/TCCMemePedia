<?php 
require_once'classes/Funcoes.php';
require_once'classes/Usuario.php';

$Funcoes= new Funcoes();
$Usuario= new Usuario();

$erro = false;
if(isset($_POST['btnCadUsuario'])){
  if($Usuario->buscaEmail($_POST['email'])=='erro'){
    if($Usuario->queryInsert($_POST)=='ok'){
      header('location: /TccMemePedia');
    }else{
      echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
    }
  }else{
    $erro=true;
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>  
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style-cadastrar.css"> 
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="js/toastr/build/toastr.css"/> 
  <title>Cadastrar-se</title>
</head>
<body>
  <div class="divCadastrarSe">
    <h1 class="ttlCadastrarSe">Cadastrar-se</h1>
    <p class="txtCrieSuaContaNaMemepedia">Crie sua conta na Memepédia</p>

    <form class="form-signin" method="POST">
      <div class="col-md-6 offset-md-3">
        <p class="lblNome">Nome</p>
        <input type="text" name="nome" class="frmNome" id="Nome" 
        placeholder="Digite seu nome" value="" required="" autofocus="" 
        data-toggle="tooltip" data-placement="top" title="Digite seu nome">
      </div>

      <div class="col-md-6  offset-md-3">
        <p class="lblEmail">E-mail</p>
        <input type="email" name="email" class="frmEmail" id="Email" 
        placeholder="seuemail@exemplo.com.br" value="" required="" data-toggle="tooltip" 
        data-placement="top" title="seuemail@exemplo.com.br">
      </div>

      <div class="col-md-6  offset-md-3">
        <p class="lblUsuario">Usuário</p>
        <input type="usuario" name="usuario" class="frmUsuario" id="Usuario" 
        placeholder="Digite seu usuário" value="" required="" data-toggle="tooltip" 
        data-placement="top" title="Digite seu usuário">
      </div>

      <div class="col-md-6  offset-md-3">
        <p class="lblPerguntaDeSeguranca">
          Responda à sua pergunta de segurança.
        </p>
        <p class="lblPerguntaDeSeguranca2">
            Estas perguntas nos ajudam a identificar sua identidade.
        </p>
        <select class="selectPerguntaDeSeguranca" name="pergunta_Secreta"  
        value="pergunta_Secreta"> 
          <option value=" ">
          </option>
          <option value="Qual é o nome de sua mãe?">
            Qual é o nome de minha mãe?
          </option>
          <option value="Qual foi o meu primeiro animal de estimação?">
            Qual foi o meu primeiro animal de estimação?
          </option>
          <option value="Qual é o nome de meu pai?">
            Qual é o nome de meu pai?
          </option>
          <option value="Qual é minha cor favorita?">
            Qual é minha cor favorita?
          </option>
          <option  value="Qual foi o meu primeiro carro?">
            Qual foi o meu primeiro carro?
          </option>
        </select>
        <input type="text" name="palavra_Secreta" class="frmPerguntaDeSeguranca" 
        id="palavra_Secreta" placeholder="Resposta" value="" required="" 
        data-toggle="tooltip" data-placement="top" title="Responda à sua pergunta de segurança">
      </div>

      <div class="col-md-6  offset-md-3">
        <p class="lblSenha">Senha</p>
        <input type="password" name="senha" class="frmSenha" id="Password" 
        placeholder="Digite sua senha" value="" required="" data-toggle="tooltip" 
        data-placement="top" title="Digite sua senha">
      </div>

      <div class="col-md-6  offset-md-3">
        <input type ="submit" class="btnCriarConta"  
        name="btnCadUsuario" role="button" value="Criar Conta">
      </div>
    </form>

      <div class="col-md-6  offset-md-3">
        <p class="txtJaPossuiUmaConta">
          Já possui uma conta?
          <a href="acessar.php" class="linkJaPossuiUmaConta">
            Acessar
          </a>
        </p>
      </div>

      <footer class="ftrMemepedia2019">
        <p class="txtMemepedia2019">© 2019 Memepédia</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#" class="list-inline-item">Privacidade</a></li>
            <li class="list-inline-item"><a href="#" class="list-inline-item">Termos</a></li>
            <li class="list-inline-item"><a href="#" class="list-inline-item">Suporte</a></li>
          </ul>
      </footer>
  </div>

<?php 
  if($erro){
    echo '<script type="text/javascript">
    toastr.error("Email já cadastrado","Erro");
          </script>';
  }
?>
  <script src="js/toastr/toastr.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>