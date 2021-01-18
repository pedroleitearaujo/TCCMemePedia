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
  <link rel="stylesheet" type="text/css" href="css/styleArt.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top navbarMemePedia">

    <a class="navbar-brand" href="index.php"data-toggle="tooltip" data-placement="top" 
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
          <a class="nav-link" href="edicao.php">Edição</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="navegacao.php">Navegação</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="normas-de-conduta.php">Normas de conduta</a>
        </li>
        
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link navLinkCadastrar" href=1
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
          <a class="btn btn-outline btnAcessar" href=
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
  <div class="container-fluid" >
		<div class="row m-5">
			<div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
	      	<p class="ttlIntroducao">Introdução</p>

	      	<p class="fonte lead">
	      	Há um campo de pesquisa no canto superior esquerdo de cada página, com a palavra pesquisar. Escreva aquilo à procura e clique.
	      	</p>
			</div>
			<!-- Sidebar -->
	    	  <div class="col-sm-2 col-md-2 sidebar teste m-5">

				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Pesquisar.." title="">

				<ul id="myUL">
				  <li><a href="Memes/PaiDeFamilia.php">Pai de Família</a></li>
				  <li><a href="Memes/Ronaldinho.php">Ronaldinho nos rolês aleatórios</a></li>
				  <li><a href="#">É Verdade Esse Bilete</a></li>

				  <li><a href="#">André Marques DJ</a></li>
				  <li><a href="#">Serjão berranteiro</a></li>

				  <li><a href="#">Rei do camarote</a></li>
				  <li><a href="#">Quero café</a></li>
				  <li><a href="#">Pelézinho, o gênio da matemática</a></li>

				  <li><a href="#">Bambam bodybuilder</a></li>
				  <li><a href="#">Rato tomando banho</a></li>
				  <li><a href="#">Greve dos caminhoneiros</a></li>

				  <li><a href="#">Aquele salgado é de que?</a></li>
				  <li><a href="#">O Feiticeiro do Hexa</a></li>
				  <li><a href="#">Copa do Mundo de 2018</a></li>

				  <li><a href="#">Agora Pabllo Vittar foi longe demais</a></li>
				  <li><a href="#">Canarinho Pistola</a></li>
				  <li><a href="#">Greve dos caminhoneiros</a></li>

				  <li><a href="#">Raiz x Nutella</a></li>
				  <li><a href="#">Fadas do Deboche</a></li>
				  <li><a href="#">Akon Aconselha</a></li>

				  <li><a href="#">Adriana Lima</a></li>
				  <li><a href="#">Glória Maria na Jamaica</a></li>
				  <li><a href="#">Iutubiu – Fala Sônia</a></li>

				  <li><a href="#">Gato Entrevistado</a></li>
				  <li><a href="#">Sanduíche-iche</a></li>
				  <li><a href="#">Caindo no “Casos de Família”</a></li>

				  <li><a href="#">Gato Entrevistado</a></li>
				  <li><a href="#">Sanduíche-iche</a></li>
				  <li><a href="#">Caindo no “Casos de Família”</a></li>

				  <li><a href="#">Missionária Vitória de Deus</a></li>
				  <li><a href="#">Choque de Cultura</a></li>
				  <li><a href="#">Levanta a cabeça, princesa</a></li>
				</ul>

				<script>
				function myFunction() {
				    var input, filter, ul, li, a, i, txtValue;
				    input = document.getElementById("myInput");
				    filter = input.value.toUpperCase();
				    ul = document.getElementById("myUL");
				    li = ul.getElementsByTagName("li");
				    for (i = 0; i < li.length; i++) {
				        a = li[i].getElementsByTagName("a")[0];
				        txtValue = a.textContent || a.innerText;
				        if (txtValue.toUpperCase().indexOf(filter) > -1) {
				            li[i].style.display = "";
				        } else {
				            li[i].style.display = "none";
				        }
				    }
				}
				</script>
	    	</div>
	    	</div>
		</div>
</body>
</html>


  


