<?php
	error_reporting(1);
	ini_set("display_errors", 1 );
	
	function __autoload($File)
	{
		require_once '../php/'.$File.'.class.php';
	}
	
	$post = new Post();
	
	$title = "";
	$message = "";
	
	if(isset($_GET['idPost']) && $_GET['idPost'] != "")
	{
		$article = $_GET['idPost'];
		
		$post->setId($article);
		$return = $post->RequestPost();
		
		if($return[0] === false)
		{
			$title = "404";
			$message = "Ops! Parece que esse post foi removido ou nunca existiu!";
			$imgbg = "LogoFinal.png";
		}
		else
			if($return[0])
			{
				foreach($return[1] as $line):
					
					$id = $line->idpost;
					$title = $line->titulopost;
					$imgbg = $line->imgpost;
					$texto = $line->textopost;
					$datahora = $line->datahorapost;
					$area = $line->areapost;
					$desc = $line->descpost; 
					
					$profileTwitter = "pdcalibre";
					$imgbg = $imgbg ? $imgbg : "LogoFinal.png";
					
					$dH = explode(" ", $datahora, 2);
					
					$date = explode("-", $dH[0], 3);
					list($ano, $mes, $dia) = $date;
					$data = $dia."/".$mes."/".$ano;
					
					$hour = explode(":", $dH[1], 3);
					list($hr, $min, $seg) = $hour;
					$hora = $hr.":".$min;
					
					$t = $post->SelectArea($area);
					
					foreach($t as $a):
						$tag = str_replace(" ", "-", strtolower($t->areapost));
						$titleTag = utf8_encode($t->areapost);
					endforeach;
				endforeach;
			}
	}
	else
	{
		header("Location: ../?response=NOTparamfromARTICLE&return=HOMEpage");
	}
	
	$server  = $_SERVER['SERVER_NAME'];
	$address = $_SERVER['REQUEST_URI'];
	$url = "http://".$server.$address;
?>
<!doctype html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <link rel="shortcut icon" href="../img/" />
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="../css/normalize.css" />
        <link rel="stylesheet" href="../css/stylenew.css" />
        <link rel="stylesheet" href="../css/include.css" />
        <style>body{background:url(../img/post/<?php echo $imgbg; ?>) no-repeat;background-attachment:fixed;background-size:cover;}</style>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/jquery-1.12.0.js"></script>
        <script src="../js/jquery.easing.js"></script>
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
                        <li><a href="../about/" title="Sobre a empresa">Sobre <span class="icon-info"></span></a></li>
                        <li><a href="../register/" title="Cadastre-se">Cadastro <span class="icon-user-plus"></span></a></li>
                        <li><a href="../download/" title="Faça download do jogo">Baixe o jogo <span class="icon-download"></span></a></li>
                        <li><a href="https://www.facebook.com/piratasdocalibre/" title="Visite nossa página no facebook" target="_blank"><span class="icon-facebook-1"></span></a></li>
                        <li><a href="https://twitter.com/pdcalibre" title="Siga-nos no twitter" target="_blank"><span class="icon-twitter"></span></a></li>
                    </ul>
                </section>
            </nav>
        </div>
        <section class="container">
        	<?php
				if($message != "")
				{
					echo "<h1>{$message}</h1>";
				}
				else
				{
					echo '
					<header>
							<h1>'.$titulo.'</h1>
							<h3>'.$desc.'</h3>
							<hr />
							<p>Tag<span class="icon-tag"></span> <a href="./?'.$tag.'" title="Veja todos os posts com esta tag">'.$titleTag.'</a> | Postado em <span class="icon-calendar"></span> '.$data.' às <span class="icon-clock"></span> '.$hora.'</p>
						</header>
						<article>
							<p>'.$texto.'</p>
						</article>
						<hr />
						<div class="social">
						<h2>Compartilhe este post</h2>
						<a href="javascript:void(0);" class="fb" onclick="window.open(\'http://www.facebook.com/sharer.php?u='.$url.'\',\'compartilhar\', \'toolbar=0, status=0, width=650, height=450\');"><span class="icon-facebook-1"></span></a>
						<a href="javascript:void(0);" class="twt" onclick="window.open(\'https://twitter.com/intent/tweet?original_referer='.$url.'&source=tweetbutton&text='.$titulo.'&url='.$url.'&via='.$profileTwitter.'\',\'compartilhar\', \'toolbar=0, status=0, width=650, height=450\');"><span class="icon-twitter"></span></a>
					</div>';
				}
            ?>
        </section>
        <footer>
            <a class="up transition" title="Voltar ao topo" href="javascript:void(0);" id="up"><span class="icon-up-open"></span></a>
            <div class="social-bar">
                <h3>Siga-nos em nossas redes sociais</h3>
                <div class="icons">
                	<a href="https://www.facebook.com/piratasdocalibre/" class="fb transition" target="_blank"><span class="icon-facebook-1"></span></a>
                	<a href="https://twitter.com/pdcalibre" class="twt transition" target="_blank"><span class="icon-twitter"></span></a>
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
				$("#up").click(function()
				{ 
					$("html, body").animate({scrollTop:0}, "slow");
					return false;
				});
			});
        </script>
    </body>
</html>