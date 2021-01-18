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
          <p class="ttlIntroducao">Canarinho Pistola</p>
          
          <!-- Imagem -->
          <div class="ImgMeme"> 
          <img src="../imagens/Memes/Pistola.jpeg" width="1050px" height="600px" margin="px" >
          </div>

          <p class="topicoArt">
                   Origem
              </p>
           
	      	<p class="Arttexto">
              Em outubro de 2017, antes do jogo entre Brasil e Bolívia, a CBF apresentou a nova figura do Canarinho, agora com um rosto diferente, mais semelhante à raiva, seriedade e irritação do que a comum felicidade e amistosidade dos mascotes pelo mundo. Essa mudança radical acabou sendo recebida, a princípio, com certa desconfiança pela CBF, que chegou até a formar uma versão mais alegre do personagem para comparecer a ações sociais com crianças e eventos em escolas. Foi a partir da repercussão contra essa possível mudança que o Canarinho começou a ganhar notoriedade e importância para o público, sendo, rapidamente, apelidado de Canarinho “Pistola” ou Canarinho “Putaço” (adjetivos que são gírias utilizadas para chamar alguém de nervoso).
                O sucesso do personagem começou a partir de maio, com o crescimento do clima de Copa do Mundo e a maior aparição do personagem dentre as transmissões ao grande público. Em junho, o mascote atingiu seu auge em procuras na internet -como aponta o Google Trends-, tendo alta participação muito bem espalhada por todo território brasileiro, afirmando-se assim como um fenômeno nacional, não expressivamente fechado a uma região.
              </p>
              
              <p class="Arttexto1">
              A expansão foi enorme no Twitter, onde dezenas de perfis foram criados assimilados à figura do mascote; todos adotando um tom irritado e grosso do personagem para com diferentes situações e pessoas, sempre relacionados à imagem tensionada do desenho do rosto do boneco. Contra o uso do termo “pistola”, o marketing da CBF prefere o termo “enfezado”. Os fãs instantâneos ganhados pelo mascote relacionaram essa figura enfezada também a questões que remetem à discussão de futebol raiz X futebol moderno (que seria um período de menor mercantilização do futebol e organização dos eventos e maior seriedade dos atletas). Dentro desse pensamento, a falta do sorriso remeteria à uma posição de respeito e moral da seleção brasileira com todos que passarem pela sua frente.
                A alta e rápida identificação do brasileiro com o mascote pode ser compreendida por algumas razões, dentre elas, a de que a representação desta versão enfezada tem relação com o sentimento do brasileiro, no momento, sobre realidade conturbada do país.
                A intenção do canarinho, já na concepção dessa figura irritada, era de representar o torcedor que -na palavra dos publicitários envolvidos- “não gosta de perder”, mas quando se alinha ao período de tempo que o canarinho tomou esse semblante (logo após a copa de 2014), é clara a relação com a derrota de 7×1 do Brasil para a Alemanha. Assim, ele viria para expressar claramente a relação do torcedor com a seleção nesse período, e até mesmo, como apontado anteriormente, a relação do brasileiro com o país em geral.
                Esta figura de crítica colocada ao mascote não é admitida pela CBF como uma intenção direta, mas mesmo assim o marketing da CBF tentou aproveitar esse sucesso, incentivando as páginas que se espalharam, no Twitter principalmente, a homenagear ou personificar o mascote para que continuassem a divulgação.
                Apesar de ter sido, inicialmente, tratado com certo pudor -já que a CBF entende que o termo pode causar confusão pelo duplo sentido e que poderia ser entendido com uma conotação negativa e até mesmo por ter sido barrada a sua presença nos jogos da copa da FIFA de 2018 por questões comerciais-, quase houve uma rejeição ao termo “pistola” (que se tornou praticamente o sobrenome inserido ao personagem), que de acordo com a gíria, refere-se apenas a algo ou alguém irritadiço.  Contudo, o mascote continua a receber a atenção do público, muito maior no Brasil que qualquer tipo de identificação ao mascote oficial da copa, o russo Zabivaka.<!-- Sidebar -->
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

  