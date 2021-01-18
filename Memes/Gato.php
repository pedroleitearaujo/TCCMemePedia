<?php

require_once'../classes/Funcoes.php';
require_once'../classes/Usuario.php';

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
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/styleArt.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top navbarMemePedia">

    <a class="navbar-brand" href="../index.php"data-toggle="tooltip" data-placement="top" 
      title="Memepédia">
      <img src="../imagens/logo-memepedia.svg" width="35" height="35" 
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
          <a class="nav-link" href="../edicao.php">Edição</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../navegacao.php">Navegação</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../normas-de-conduta.php">Normas de conduta</a>
        </li>
        
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link navLinkCadastrar" href=../cadastrar.php
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
          <a class="btn btn-outline btnAcessar" href=../acessar.php
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
        <!-- Titulo -->
          <p class="ttlIntroducao">Gato Entrevistado</p>
          
          <!-- Imagem -->
          <div class="ImgMeme"> 
          <img src="../imagens/Memes/gato.jpg" width="1050px" height="600px" margin="px" >
          </div>

          <p class="topicoArt">
                   Origem
              </p>
           
	      	<p class="Arttexto">
              O Gato Entrevistado é um meme protagonizado por um felino cujo nome é Tião. Seu irmão, Chico, já era uma figura notória na internet desde 2013, devido a sua página do Facebook “Cansei de Ser Gato”. Lá, as donas dos gatos postam diversas fotos de Chico fantasiado, acompanhadas da frase: “Cansei de ser gato. Agora sou…..”, que variam de acordo com o figurino do bichano.
                Apesar de o meme só ter viralizado em meados de 2016, sua foto foi tirada dois anos antes, quando suas donas gravaram uma entrevista para a Band explicando como a página foi criada e como elas trabalham.
                Não se sabe ao certo o porquê na demora da viralização do meme, que foi mais utilizado no Facebook e Twitter.</p>
              <p class="topicoArt">
              Difusão e Repercussão
              </p>
              <p class="Arttexto1">
              O Gato Entrevistado é um meme famoso apenas no Brasil, porém, há algumas postagens isoladas em outros países. Um pequeno número de marcas utilizaram-se deste meme para vender produtos para gatos, como a Cat Design, loja de arranhadores que criou diversas versões dele para divulgar seu negócio. Atualmente, esse meme não é muito utilizado, porém, algumas páginas sobre gatos no Facebook ainda aproveitam deste meme para fazer humor, embora isso ocorra esporadicamente.</p>

            </p>
			</div>
			<!-- Sidebar -->
	    	  <div class="col-sm-2 col-md-2 sidebar teste m-5">

				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Pesquisar.." title="">

				<ul id="myUL">
        <li><a href="PaiDeFamilia.php">Pai de Família</a></li>
				  <li><a href="Ronaldinho.php">Ronaldinho nos rolês aleatórios</a></li>
				  <li><a href="bilete.php">É Verdade Esse Bilete</a></li>

				 
				  <li><a href="Serjão.php">Serjão berranteiro</a></li>

				  <li><a href="Rcamorote.php">Rei do camarote</a></li>
				  <li><a href="Qcafe.php">Quero café</a></li>
				  <li><a href="pelezinho.php">Pelézinho, o gênio da matemática</a></li>

				  <li><a href="Bodybuilder.php">Bambam bodybuilder</a></li>
				  <li><a href="RatoBanho.php">Rato tomando banho</a></li>
				  <li><a href="Greve.php">Greve dos caminhoneiros</a></li>

				  <li><a href="Salgado.php">Aquele salgado é de que?</a></li>
				  <li><a href="Feiticeiro.php">O Feiticeiro do Hexa</a></li>
				  <li><a href="Copa.php">Copa do Mundo de 2018</a></li>

				  <li><a href="Pvittar.php">Agora Pabllo Vittar foi longe demais</a></li>
				  <li><a href="Pistola.php">Canarinho Pistola</a></li>

				  <li><a href="RxN.php">Raiz x Nutella</a></li>
				  <li><a href="Fada.php">Fadas do Deboche</a></li>
				  <li><a href="Akon.php">Akon Aconselha</a></li>

				  <li><a href="Adri.php">Adriana Lima</a></li>
				  <li><a href="GloriaMaria.php">Glória Maria na Jamaica</a></li>
				  <li><a href="Iutubiu.php">Iutubiu – Fala Sônia</a></li>

				  <li><a href="Gato.php">Gato Entrevistado</a></li>
				  <li><a href="SAnduiche.php">Sanduíche-iche</a></li>
				  <li><a href="CasosFamilia.php">Caindo no “Casos de Família”</a></li>

				  <li><a href="Deus.php">Missionária Vitória de Deus</a></li>
				  <li><a href="Choque.php">Choque de Cultura</a></li>
				  <li><a href="Princesa.php">Levanta a cabeça, princesa</a></li>
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

  