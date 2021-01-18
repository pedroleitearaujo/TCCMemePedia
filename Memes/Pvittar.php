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
          <p class="ttlIntroducao">Agora Pabllo Vittar foi longe demais</p>
          
          <!-- Imagem -->
          <div class="ImgMeme"> 
          <img src="../imagens/Memes/PVittar.jpg" width="1050px" height="600px" margin="px" >
          </div>

          <p class="topicoArt">
                   Origem
              </p>
           
	      	<p class="Arttexto">
              Se você esteve presente na internet nos últimos meses, com certeza em algum momento se deparou com alguma corrente estapafúrdia sobre a cantora Pabllo Vittar. De acordo com as correntes, que posteriormente viraram memes, a cantora estaria envolvida com o Partido dos Trabalhadores (PT) em algum plano mirabolante contra a moral e os bons costumes. Nos textos, se repete a frase “dessa vez Pablo Vittar foi longe demais”, mas parece que a cada nova corrente, a cantora consegue ultrapassar mais um vez o limite da audácia.
              A corrente original foi criada pelo analista de sistemas Gilmar Lopes, que é responsável pelo site E-farsas. Criado em 2002, o site tem como objetivo desmascarar boatos da internet, as famigeradas “fake news”. Em entrevista, Gilmar diz que queria entender como nasce uma fake news e para isso, resolveu criar uma.
                E assim nasceu a primeiríssima corrente sobre Pablo Vittar. O início de uma era, não é mesmo?
                 </p>
              
              <p class="Arttexto1">
              O criador, Gilmar Lopes, usou o Twitter para proliferar a falsa notícia. Em pouquíssimo tempo, a corrente já tinha viralizado não só no Twitter, mas também no Facebook e WhatsApp. A partir daí, novas correntes foram surgindo nas mesmas redes. Entretanto, não se sabe ao certo se quem as cria e compartilha realmente quer manchar a imagem da Pablo, ou está debochando das pessoas que acreditam nessas correntes.<!-- Sidebar -->
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

  