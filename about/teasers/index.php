<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Teasers - Piratas do Calibre</title>
        <link rel="stylesheet" href="../css/normalize.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/include.css" />
        <script src="../js/jquery-1.12.0.js"></script>
        <script src="../js/jquery.easing.js"></script>
    </head>
    <body>
        <section class="menu transition">
        	<ul>
                <li><a title="Início" href="../">Início <span class="icon-anchor"></span></a></li>
                <li><a href="../register/" title="Cadastre-se">Cadastro <span class="icon-user-plus"></span></a></li>
                <li><a href="../download/" title="Faça download do jogo">Baixe o jogo <span class="icon-down-circled2"></span></a></li>
                <li>
                	<a class="active" href="javascript:void(0);">O Jogo <span class="icon-down-open"></span></a>
                    <ul>
                        <li><a href="../historia/" title="Veja a história do jogo">História <span class="icon-doc-text"></span></a></li>
                        <li><a href="../personagens/" title="Veja a história dos personagens do jogo">Personagens <span class="icon-users"></span></a></li>
                        <li><a class="active" href="./" title="Veja nossos teasers">Teasers <span class="icon-videocam"></span></a></li>
                    </ul>
                </li>
                <li><a href="https://www.facebook.com/piratasdocalibre/" title="Visite nossa página no facebook" target="_blank"><span class="icon-facebook-squared"></span>facebook</a></li>
            </ul>
        </section>
        <section class="page">
        	<br /><br />
        </section>
        <footer>
        	<span class="lt">&copy; 2015-2. TCPIII &ndash; Piratas do Calibre.</span>
            <span class="rg">IFRJ Campus Paulo de Frontin</span>
        </footer>
        <style>
			footer {position: fixed; bottom: 15px;}
		</style>
        <script>
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