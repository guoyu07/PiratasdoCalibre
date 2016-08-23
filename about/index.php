<?php
	
	function __autoload($File)
	{
		require_once '../php/'.$File.'.class.php';
	}
	
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>História - Piratas do Calibre</title>
        <link rel="stylesheet" href="../css/normalize.css" />
        <link rel="stylesheet" href="../css/stylenew.css" />
        <link rel="stylesheet" href="../css/include.css" />
       	<script src="../js/jquery.min.js"></script>
    </head>
    <body>
    	<div class="top">
        	<div class="name">
            	Piratas do Calibre
                <img src="../img/pdc.png" width="40px" height="auto" alt="pdc" title="Piratas do Calibre" />
            </div>
            <nav>
            	<section class="menu">
                	<ul>
                    	<li><a title="Início" href="../">Início <span class="icon-anchor"></span></a></li>
                        <li><a class="active" href="./" title="Sobre o jogo">Sobre <span class="icon-info"></span></a></li>
                        <li><a href="../register/" title="Cadastre-se">Cadastro <span class="icon-user-plus"></span></a></li>
                        <li><a href="../download/" title="Faça download do jogo">Baixe o jogo <span class="icon-download"></span></a></li>
                        <li><a href="https://www.facebook.com/piratasdocalibre/" title="Visite nossa página no facebook" target="_blank"><span class="icon-facebook-1"></span></a></li>
                        <li><a href="https://twitter.com/pdcalibre" title="Siga-nos no twitter" target="_blank"><span class="icon-twitter"></span></a></li>
                    </ul>
                </section>
            </nav>
        </div>
        <section class="container">
            <header>
                <h1>Sobre o Jogo</h1>
                <hr />
            </header>
            <div class="hst">
            	<h2>História do jogo</h2>
                <br />
                <p>
                    Rato era apenas um na grande tripulação do Queen Anne's Revenge, navio do grande pirata Edward Teach, porém cometeu erros que Edward não perdoaria, entrou em um bote no meio da noite e fugiu desesperadamente. A maré violenta o arrastou, o virou e o apagou.
                </p>
                <p>
        Mas não, Rato não tinha tido seu fim, ao acordar olhou para os lados e viu que estava em uma praia, não uma praia comum, havia ouro por toda a parte. Rato então pulava de alegria, mas havia um problema: como ele sairia dali com todo aquele ouro!?
        O vil homem se entranhou o mais profundo que podia na ilha em busca de qualquer coisa que o ajudasse a voltar para a civilização, já desanimado com sua falta de sorte. Eis que ouve uma voz sombria lhe falar, teve medo de ser o temido Barba Negra que o viera buscar, mas não, parecia algo pior, algo de além mundo.
                </p>
                <p>
        Nada mais se soube do homem com aparência desprezível desde que sumiu do navio de Barba Negra.
        Rato com um olhar sombrio, observa-se chegar a um porto sem saber muito onde estava, apenas com um punhado de ouro dentro de um bote que levou meses pra reconstruir, este sabia que tinha de retornar para a ilha, mas sem um navio seria impossível trazer todo aquele ouro.
                </p>
                <p>
        Entrou em um bar onde as coisas estavam calmas para um local cheio de piratas embriagados, pediu uma bebida e se sentou próximo a uns piratas e começou a dissertar sobre a ilha e como nela havia ouro a transbordar, de canto de olho avistou um homem levantando e vindo em sua direção, mas ignorou, meio segundo depois o homem o agarrava pelo colarinho indagando sobre a ilha e onde ele conseguiria um navio. Um vulto se levanta ao fundo, cochicha algo e simplesmente sai, rato sentiu a força do homem diminuir, assim como o interesse em estrangular. O homem soltou rato e seguiu a pessoa que o havia lhe falado ao ouvido. Enquanto recuperava o folego, olhou em volta para ver se tinha chamado muita atenção,  todos agora olhavam para ele.
                </p>
                <p>
    O boato do tesouro se espalhou tanto que chegou do sul até o norte da Europa, mas ninguém sabia a localização certa do Arquipélago Dourado, poucos se arriscariam a enfrentar o Oceano Atlântico e seus mistérios, até então apenas se ouvira falar de dois navios partindo em procura da ilha. O Kraken Bretão e a Donzela de fogo.
                </p>
            </div>
            <br /><br />
            <div class="times">
            	<h2>Times</h2>
                <br />
                <p>
                    <a href="javascript:void(0);" title="Oceânicos"><img class="a" src="../img/oceanicoscard.png" alt="" /></a>
                    <a href="javascript:void(0);" title="Náuticos"><img src="../img/nauticoscard.png" alt="" /></a>
                </p>
            </div>
            <br /><br />
            <div class="pers">
            	<h2>Personagens</h2>
                <br />
                <p>
                	<a href="javascript:void(0);" title="Capitã Betta"><img src="../img/bettacard.png" alt="" /></a>
                    <a href="javascript:void(0);" title="Almirante Galleon"><img src="../img/galleoncard.png" alt="" /></a>
                    <br />
                	<a href="javascript:void(0);" title="Capitã Eloise "><img src="../img/eloisecard.png" alt="" /></a>
                    <a href="javascript:void(0);" title="Almirante Carrack"><img src="../img/carrackcard.png" alt="" /></a>
                </p>
            </div>
		</section>
    	<footer>
        	<a class="up transition" title="Voltar ao topo" href="javascript:void(0);" id="up"><span class="icon-up-open"></span></a>
        	<div class="social-bar">
            	<h3>Siga-nos em nossas redes sociais</h3>
                <div class="icons">
                    <a href="https://www.facebook.com/piratasdocalibre/" title="Curta nossa página no facebook" class="fb transition" target="_blank"><span class="icon-facebook-1"></span></a>
                    <a href="https://twitter.com/pdcalibre" title="Siga-nos no twitter" class="twt transition" target="_blank"><span class="icon-twitter"></span></a>
                </div>
            </div>
            <br />
            <p>Contato&nbsp;<span class="icon-right-dir"></span><a href="mailto:pdcalibre@gmail.com">pdcalibre@gmail.com</a></p>
            <p class="t"><a href="../terms/">Leia nossos termos</a></p>
            <p>&copy; Piratas do Calibre &ndash; TCP III 2015-2</p>
        </footer>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#up').click(function()
				{ 
					$('html, body').animate({scrollTop:0}, 'slow');
					return false;
				});
			});
        </script>
    </body>
</html>