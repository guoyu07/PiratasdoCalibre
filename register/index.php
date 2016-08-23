<?php
	
	function __autoload($File)
	{
		require_once '../php/'.$File.'.class.php';
	}
	
	$mensagem = "";
	
	$user = new User();
	
	if(isset($_POST['email']) && $_POST['email'] != "" &&
	   isset($_POST['login']) && $_POST['login'] != "" &&
	   isset($_POST['pass'])  && $_POST['pass']  != "")
	{
		$user->setEmail($_POST['email']);
		$user->setLogin($_POST['login']);
		$user->setSenha($_POST['pass']);
		
		$return = $user->Register();
		
		if($return[0])
		{
			//Enviar um email falando sobre o cadastro e enviar o login
			header("Location: sucess.php");
		}
		else
		{
			switch($return[1]):
				case "DE":
					//header("Location: err.php?log=email-d");
					$mensagem = "Desculpe-nos. Este e-mail já está cadastrado em nosso sistema! <span class=\"icon-attention\"></span>";
				break;
				case "DN":
					$mensagem = "Ops... Este login já está cadastrado! <span class=\"icon-attention\"></span>";
				break;
				case "ENE":
				default:
					$mensagem = "Hmm, parece que nós tivemos um probleminha. Tente novamente mais tarde. <span class=\"icon-attention-circled\"></span>";
				break;
			endswitch;
		}
			
	}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro - Piratas do Calibre</title>
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
                        <li><a class="active" href="./" title="Cadastre-se">Cadastro <span class="icon-user-plus"></span></a></li>
                        <li><a href="../download/" title="Faça download do jogo">Baixe o jogo <span class="icon-download"></span></a></li>
                        <li><a href="https://www.facebook.com/piratasdocalibre/" title="Visite nossa página no facebook" target="_blank"><span class="icon-facebook-1"></span></a></li>
                        <li><a href="https://twitter.com/pdcalibre" title="Siga-nos no twitter" target="_blank"><span class="icon-twitter"></span></a></li>
                    </ul>
                </section>
            </nav>
        </div>
        <section class="container">
            <header>
                <h1>Junte-se a nós, marujo!</h1>
                <hr />
            </header>
            <div class="reg">
            	<h2></h2>
                <!--<p class="error"><?php //echo $mensagem; ?></p>-->
                <form action="./" method="post">
                    <input type="email" name="email" required class="transition" autofocus placeholder="Digite seu e-mail" maxlength="100" />
                    <input type="text" name="login" required class="transition" placeholder="Crie um login" autocomplete="off" maxlength="100">
                    <input type="password" name="pass" required class="transition" placeholder="Crie um senha" maxlength="100">
                    <button class="transition" title="Clique aqui para criar uma conta">Cadastre-se <span class="icon-plus"></span></button>
                </form>
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