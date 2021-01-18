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
  $logado=false;
}

if(isset($_GET['sair']) == "sim"){
  $Usuario->sairUsu(); 
}

?>
<!DOCTYPE html>
<html lang="pt-br">  
<head>
  <meta charset="utf-8">
  <title>MemePédia</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top navbarMemePedia">

    <a class="navbar-brand" href="index.php" data-toggle="tooltip" data-placement="top" 
      title="Memepédia">
      <img src="../TccMemePedia/imagens/logo-memepedia.svg" width="35" height="35" 
      class="d-inline-block align-top" alt="" data-toggle="tooltip" data-placement="top" 
      title="MemePédia">
      Memepédia
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" 
    data-target="#navbarMemepedia" aria-controls="navbarMemepedia" 
    aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMemepedia">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="inserirArtigo.php">Inserir artigo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="navegacao.php">Navegação</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="normas.php">Normas de conduta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Artigos.php">Memes</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link navLinkCadastrar" href=
          <?php 
          if($logado){
            echo '?sair=sim';
          }else{
            echo "cadastrar.php";
          }
          ?>>
          <?php 
          if($logado){
            echo 'Sair';
          }else{
            echo 'Cadastrar';
          }
          ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline btnAcessar" href="editar.php"
          <?php 
          if($logado){
            $Usuario->usuariologado($_SESSION['usu']);
            echo 'login.php';
          }else{
            echo 'acessar.php';
          } 
          ?>>
          <?php
          if($logado){
            echo $_SESSION['nome'];
          }else{
            echo 'Acessar';
          } 
          ?>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="divBoasVindas">
    <h1 class="ttlBemVindos">
      Bem-vindos à MemePédia
    </h1>
    <p class="txtBemVindos1">
      A primeira enciclopédia virtual de virais nacionais
    </p>
    <p class="txtBemVindos2">
      Boas-vindas à MemePédia, a primeira enciclopédia online de virais<br>
      brasileiros escrita em colaboração pelos seus leitores
    </p>
    <a class="btn btn-outline btnNavegar" href="#">
      Apresentação
    </a>
  </div>

  <div class="divDescricaoMemepedia">
    <h1 class="ttlMemepedia">
      Memepédia - Enciclopédia virtual de virais
    </h1>
    <p class="txtMemepedia1">
      A Memepédia começou em janeiro de 2019, criada pelos alunos do curso técnico de<br> 
      informatica da Etec Albert Einstein Caio Arakaki, Cleberson Teixeira, Pedro Leite, 
      Rodrigo Fantibon<br> e Thiago Dantas. Como todos projetos do grupo, buscamos um mundo em 
      que cada ser<br> humano tenha livre acesso à soma de todos os conhecimentos. Assim, 
      incentivamos<br> que todos editem e tenham acesso a esse conteúdo.     
    </p>>
      <video controls>
        <source src="../TccMemePedia/video/Pitch.mp4" type="video/mp4">
        <source src="../TccMemePedia/video/Pitch.ogg" type="video/ogg">
        <video src="../TccMemePedia/video/Pitch.webm" type="video/webm">
      </video>
  </div>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>