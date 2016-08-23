<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Início - Piratas do Calibre</title>
        <link rel="stylesheet" href="css/normalize.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/include.css" />
        <script src="js/jquery-1.12.0.js"></script>
        <script src="js/jquery.easing.js"></script>
    </head>
    <body>
    	<section class="img-top">
        </section>
        <section class="menu2 transition">
        	<ul>
                <li><a class="active" title="Início" href="./">Início <span class="icon-anchor"></span></a></li>
                <li><a href="register/" title="Cadastre-se">Cadastro <span class="icon-user-plus"></span></a></li>
                <li><a href="download/" title="Faça download do jogo">Baixe o jogo <span class="icon-down-circled2"></span></a></li>
                <li>
                	<a href="javascript:void(0);">O Jogo <span class="icon-down-open"></span></a>
                    <ul>
                        <li><a href="historia/" title="Veja a história do jogo">História <span class="icon-doc-text"></span></a></li>
                        <li><a href="personagens/" title="Veja a história dos personagens do jogo">Personagens <span class="icon-users"></span></a></li>
                        <li><a href="teasers/" title="Veja nossos teasers">Teasers <span class="icon-videocam"></span></a></li>
                    </ul>
                </li>
                <li><a href="https://www.facebook.com/piratasdocalibre/" title="Visite nossa página no facebook" target="_blank"><span class="icon-facebook-squared"></span>facebook</a></li>
            </ul>
        </section>
        <!--<div class="jump">
        	<span class="icon-down-open" onClick="_Jump();" title="Clique aqui ou role para baixo"></span>
        </div>-->
        <br />
        <br />
        <section class="page">
        	<header>
            	<h2>Gameplay</h2>
            </header>
            <div class="artc">
            	<img src="img/LogoFinal.png" alt="" class="img-artc" title="" />
                <h3>Gameplay do jogo Piratas do Calibre</h3>
                <span class="info-datetime">Postado em 11/02 às 15:13</span><br /><br />
            	<p>Confira o Gameplay do jogo desenvolvido pelos alunos do 3º período do curso Superior em Tecnologia de Jogos Digitais do IFRJ.<br /><br />
                <a href="https://www.facebook.com/piratasdocalibre/videos/1680715815546424/" target="_blank">Clique aqui e assista <span class="icon-videocam"></span></a></p>
            </div>
        	<header>
            	<h2>Lançamento do Teaser</h2>
            </header>
            <div class="artc">
            	<img src="img/LogoFinal.png" alt="" class="img-artc" title="" />
                <h3>Primeiro teaser do jogo</h3>
                <span class="info-datetime">Postado em 12/01 às 18:26</span><br /><br />
            	<p>O Arquipélago Dourado nunca mais será o mesmo!<br />
				Estão preparados, marujos?<br /><br />
                <a href="https://www.facebook.com/piratasdocalibre/videos/vb.1648385238779482/1669853936632612/" target="_blank">Clique aqui e assista <span class="icon-videocam"></span></a></p>
            </div>
        </section>
        <footer>
        	<span class="lt">&copy; 2015-2. TCPIII &ndash; Piratas do Calibre.</span>
            <span class="rg">IFRJ Campus Paulo de Frontin</span>
        </footer>
        <script>
			/*function _Jump()
			{
				$('html, body').animate(
				{
					scrollTop: 470
				},
				1000,
				'easeInOutCirc');
			}*/
			
			jQuery("document").ready(function($)
			{
				var nav = $('.menu');
				
				$(window).scroll(function()
				{
					if($(this).scrollTop() > window.screenY + 450)
					{
						nav.addClass("menu-top");
					}
					else
					{
						nav.removeClass("menu-top");
					}
				});
			});
		</script>
    </body>
</html>