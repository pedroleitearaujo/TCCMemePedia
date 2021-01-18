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
          <p class="ttlIntroducao">É Verdade Esse Bilete</p>
          
          <!-- Imagem -->
          <div class="ImgMeme"> 
          <img src="../imagens/Memes/bilehte.jpg" width="1050px" height="600px" margin="px" >
          </div>
          <p class="topicoArt">
                   Origem
              </p>
           
	      	<p class="Arttexto">
              Fazer maratonas assistindo a séries tornou-se um hábito muito difundido entre os usuários da internet, dada a possibilidade de não precisar esperar dias pela exibição dos próximos capítulos do seu programa favorito. No fim da tarde do último dia 20 de agosto, na cidade de Bocaina, em São Paulo, um pequeno estudante de 5 anos, chamado Gabriel Lucca, teve o desejo de não ir à escola no dia seguinte por querer fazer uma maratona da série de animação Caçador de Trolls.
              Como estratégia o menino escreveu um bilhete para simular o envio de um comunicado da escola sobre a possibilidade de não ter aulas no dia seguinte, pois poderia ser feriado. Endereçou o bilhete aos “senhores paes” e o assinou como “tia Paulinha”, sua professora. Além disso, para dar autenticidade ao comunicado, escreveu: “é verdade esse bilete”.
              Obviamente, o cuidado do menino ao desenvolver uma estrutura próxima de um comunicado escolar em seu bilhete não enganou sua mãe, Geovana Santos. Surpresa e bem humorada, ela enviou, pelo whatsapp, uma foto do pedaço de folha de caderno (mal cortado, com erros de ortografia, letra mal feita, assinatura curiosa e autenticação mais inusitada ainda) para a professora de seu filho.
              A professora, Paula Renata Robardelli, também se surpreendeu com a astúcia do menino. Na manhã de 21 de agosto, o dia seguinte, ela postou em sua conta no Facebook a foto do bilhete e uma legenda que aponta Gabriel como muito jovem leitor e escritor que tentou trollar sua professora e sua mãe. Em seguida, elogia a esperteza da geração do menino e posta um sequência de emoticons que vão gradualmente das reações de raiva para o pavor, passando para o choro triste e, em seguida, para o choro de alegria, finalizando com um olhar apaixonado e um elogio ao menino. Este post viralizou e logo os internautas já criavam seus próprios memes a partir do bilhete de Gabriel.
              </p>
              <p class="topicoArt">
                   Difusão e Repercussão
              </p>
              <p class="Arttexto1">
              No dia 23, começam a surgir as primeiras matérias online sobre o meme. Desde então, quase um mês se passou até a redação deste texto e continuam surgindo novas postagens em jornais e revistas online. O Google Trends indica o dia 23 de agosto como momento de surgimento do catchphrase e de aumento da presença do termo “bilete”.
              Também segundo o Google Trends, os picos do interesse pelo meme até agora foram nos dias 01 de setembro e 09 do mesmo mês. Além de aparições em programas de auditório de exibição nacional (como no Encontro com Fátima Bernardes, onde se discutiu o caso e a Hora do Faro, para o qual Gabriel e sua mãe foram convidados), o meme, Gabriel, sua mãe e sua professora apareceram em jornais locais, pelo menos de emissoras afiliadas à Rede Record e à Rede Globo. 
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
