<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Download - Piratas do Calibre</title>
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
                        <li><a href="../about/" title="Sobre o jogo">Sobre <span class="icon-info"></span></a></li>
                        <li><a href="../register" title="Cadastre-se">Cadastro <span class="icon-user-plus"></span></a></li>
                        <li><a class="active" href="./" title="Faça download do jogo">Baixe o jogo <span class="icon-download"></span></a></li>
                        <li><a href="https://www.facebook.com/piratasdocalibre/" title="Visite nossa página no facebook" target="_blank"><span class="icon-facebook-1"></span></a></li>
                        <li><a href="https://twitter.com/pdcalibre" title="Siga-nos no twitter" target="_blank"><span class="icon-twitter"></span></a></li>
                    </ul>
                </section>
            </nav>
        </div>
        <section class="container">
            <header>
                <h1>Baixe agora o jogo, marujo!</h1>
                <hr />
            </header>
        	<div class="dld">
            	<h2>Escolha sua plataforma</h2>
                <br /><br />
                <a href="javascript:alert('Desculpe-nos!\nO jogo está em fase de testes, portanto ainda não estamos disponibilizando para download.\nCadastre-se para que possamos enviar um link assim que o download estiver disponível!')" >
                    <section class="new transition">
                        <span class="w icon-windows"></span>
                        <h2>Windows<span class="icon-download"></span></h2>
                    </section>
                </a>
                <a href="javascript:alert('Desculpe-nos!\nO jogo está em fase de testes, portanto ainda não estamos disponibilizando para download.\nCadastre-se para que possamos enviar um link assim que o download estiver disponível!')" >
                    <section class="new transition">
                        <span class="m icon-apple"></span>
                        <h2>MAC<span class="icon-download"></span></h2>
                    </section>
                </a>
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