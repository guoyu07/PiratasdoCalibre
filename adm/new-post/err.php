<?php
	
	function __autoload($File)
	{
		require_once '../../php/'.$File.'.class.php';
	}
	
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Erro - Piratas do Calibre</title>
        <link rel="stylesheet" href="../../css/normalize.css" />
        <link rel="stylesheet" href="../../css/stylenew.css" />
        <link rel="stylesheet" href="../../css/include.css" />
        <style>body{background:#0301ad;}.container{margin-top:200px;}</style>
    </head>
    <body>
    	<div class="top">
        	<div class="name">
            	Área Administrativa
            </div>
            <nav>
            	<section class="menu">
                	<ul>
                    	<li><a title="Início" href="../">Início <span class="icon-anchor"></span></a></li>
                        <li><a href="./" title="Novo post">Novo Post <span class="icon-doc"></span></a></li>
                        <li><a href="../../" title="Site" target="_blank">Site <span class="icon-home"></span></a></li>
                        <li><a href="./?logout=true" title="Sair">NomeUsuario [Sair] <span class="icon-user"></span></a></li>
                    </ul>
                </section>
            </nav>
        </div>
        <section class="container">
        	<br />
            <div class="post-err">
                <h2>Desculpe-nos!</h2>
                <p>Infelizmente seu post não foi publicado! Perdão pelo transtorno.</p>
                <p>Possíveis erros:</p>
                <br />
                <ul>
                	<li><span class="icon-right-dir"></span> Já existe um post igual a este. <a href="javascript:void(0);" onClick="document.getElementById('q').focus();">Pesquise</a></li>
                    <li>
                    	<form action="../../search/" class="transition" id="f" method="get">
                            <span class="icon-right-dir"></span> <input type="search" name="q" id="q" autocomplete="on" required placeholder="Digite aqui sua pesquisa..." />
                            <button><span class="icon-search"></span></button>
                        </form>
                    </li>
                    <li><span class="icon-right-dir"></span> Não foi possível estabelecer uma conexão com o banco de dados. Tente novamente mais tarde.</li>
                    <li><span class="icon-right-dir"></span> Houve falha ao criar o arquivo do seu post. Tente novamente mais tarde.</li>
                </ul>
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
            <p>Contato <span class="icon-right-dir"></span><a href="mailto:pdcalibre@gmail.com">pdcalibre@gmail.com</a></p>
            <br />
            <p>&copy; Piratas do Calibre &ndash; TCP III 2015-2</p>
        </footer>
    </body>
</html>