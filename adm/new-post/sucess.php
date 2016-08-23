<?php
	
	function __autoload($File)
	{
		require_once '../../php/'.$File.'.class.php';
	}
	
	if(isset($_GET['post']) && $_GET['post'] != "")
	{
		$post = $_GET['post'];
	}
	else
	{
		$post = "../";
	}
	
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sucesso - Piratas do Calibre</title>
        <link rel="stylesheet" href="../../css/normalize.css" />
        <link rel="stylesheet" href="../../css/stylenew.css" />
        <link rel="stylesheet" href="../../css/include.css" />
        <style>body{background:url(../../img/sucess.jpg)no-repeat;background-attachment:fixed;background-size:cover;}</style>
    </head>
    <body>
    	<div class="top">
        	<div class="name">
            	Área Administrativa
            </div>
            <nav>
            	<section class="menu">
                	<ul>
                    	<li><a href="../" title="Início">Início <span class="icon-anchor"></span></a></li>
                        <li><a href="./" title="Novo post">Novo Post <span class="icon-doc"></span></a></li>
                        <li><a href="../../" title="Site" target="_blank">Site <span class="icon-home"></span></a></li>
                        <li><a href="./?logout=true" title="Sair">NomeUsuario [Sair] <span class="icon-user"></span></a></li>
                    </ul>
                </section>
            </nav>
        </div>
        <section class="container">
        	<br />
            <div class="post-ok">
                <h2>Postado com sucesso!</h2>
                <p>Seu post foi criado e publicado sem erros.</p>
                <p>Para vê-lo, <a href="../../article/?p=<?php echo $post; ?>">Clique aqui<span class="icon-doc-text"></span></a></p>
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