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
        <title>Sucesso - Piratas do Calibre</title>
        <link rel="stylesheet" href="../css/normalize.css" />
        <link rel="stylesheet" href="../css/stylenew.css" />
        <link rel="stylesheet" href="../css/include.css" />
        <style>body{background:url(../img/LogoFinal.png)no-repeat bottom;background-attachment:fixed;background-size:cover;}</style>
        <meta http-equiv="refresh" content="10; url=../download/">
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
                        <li><a href="./" title="Cadastre-se">Cadastro <span class="icon-user-plus"></span></a></li>
                        <li><a href="../download/" title="Faça download do jogo">Baixe o jogo <span class="icon-download"></span></a></li>
                        <li><a href="https://www.facebook.com/piratasdocalibre/" title="Visite nossa página no facebook" target="_blank"><span class="icon-facebook-1"></span></a></li>
                        <li><a href="https://twitter.com/pdcalibre" title="Siga-nos no twitter" target="_blank"><span class="icon-twitter"></span></a></li>
                    </ul>
                </section>
            </nav>
        </div>
        <section class="container">
        	<br />
            <div class="post-ok">
                <h2>Ahoy!<span class="icon-beer"></span></h2>
                <p>Bem-vindo a tripulação, marujo.</p>
                <p>Aguarde ser redirecionado para a página de download.</p>
            </div>
        </section>
        <footer>
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
    </body>
</html>