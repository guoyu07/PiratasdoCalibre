<?php
	error_reporting(1);
	ini_set("display_errors", 1 );
	
	function __autoload($File)
	{
		require_once '../php/'.$File.'.class.php';
	}
	
	$post = new Post();
	$showS = true;
	$title = "Artigos e Notícias";
	
	if(isset($_GET['p']) && $_GET['p'] != "")
	{
		$article = $_GET['p'];
		
		header("Location: read.php?idPost={$article}");
		
	}
	else
		if(isset($_GET['q']) && $_GET['q'] != "")
		{
			$param = $_GET['q'];
		
			$post->setParam($param);
			$return = $post->SearchPost();
			
			if($return[0] === false)
			{
				$title = "Artigos e Notícias";
				$message = "Nenhum post encontrado para a sua pesquisa!";
			}
			else
				if($return)
				{
					$title = "Pesquisa sobre '{$article}'";
					$message = "Aqui estão os resultados para '{$article}'";
					$show = array(0 => "search", 1 => $return[1]);
				}
		}
		else
		{
			$showS = false;
		}
	
	$imgbg = "";
	
	$profileTwitter = "pdcalibre";
	$imgbg = $imgbg ? $imgbg : "LogoFinal.png";
	
	/*$dH = explode(" ", $datahoraPost, 2);
	
	$date = explode("-", $dH[0], 3);
	list($ano, $mes, $dia) = $date;
	$data = $dia."/".$mes."/".$ano;
	
	$hour = explode(":", $dH[1], 3);
	list($hr, $min, $seg) = $hour;
	$hora = $hr.":".$min;
	
	$t = $SelectArea($areaPost);
	foreach($t as $a):
		$tag = str_replace(" ", "-", strtolower($t->areapost));
		$titleTag = $t->areapost;
	endforeach;*/
	
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
        <style>body{background:url(../img/<?php echo $imgbg; ?>) no-repeat;background-attachment:fixed;background-size:cover;}</style>
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
		if($showS === true)
		{
			//ORGANIZAR
			//COLOCAR ISSO PARA CIMA
			switch($show[0]):
				case "select":
				foreach($show[1] as $line):
					$imgpost = $line->imgpost == NULL || $line->imgpost == "" ? "LogoFinal.png" : $line->imgpost;
					echo $line->linkpost;
					echo $imgpost;
					echo $line->titulopost;
					echo $line->descpost;
					echo $line->linkpost;
				endforeach;
				break;
				case "search":
					foreach($show[1] as $line):
						$imgpost = $line->imgpost == NULL || $line->imgpost == "" ? "LogoFinal.png" : $line->imgpost;
				?>
					<section class="new">
						<a href="article/<?php echo $line->linkpost; ?>">
							<figure>
								<img src="img/<?php echo $imgpost; ?>" alt="img" title="imagem" />
							</figure>
						</a>
						<h2><?php echo $line->titulopost; ?></h2>
						<p><?php echo $line->descpost; ?></p>
						<a class="link transition" href="article/<?php echo $line->linkpost; ?>">Leia mais <span class="icon-plus"></span></a>
					</section>
				<?php
					endforeach;
				break;
			endswitch;
		}
		else
		{
			echo "<h1>{$message}</h1>";
		?>
		<?php
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

<!--
<header>
                <h1><?php //echo $tituloPost; ?></h1>
                <h3><?php //echo $descPost; ?></h3>
                <hr />
                <p>Tag<span class="icon-tag"></span> <a href="?<?php //echo $tag; ?>" title="Veja todos os posts com esta tag"><?php //echo $titleTag; ?></a> | Postado em <span class="icon-calendar"></span> <?php //echo $data; ?> às <span class="icon-clock"></span> <?php //echo $hora; ?></p>
            </header>
            <article>
            	<p><?php //echo $textoPost; ?></p>
            </article>
            <hr />
            <div class="social">
                <h2>Compartilhe este post</h2>
                <a href="javascript:void(0);" class="fb" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php //echo $url; ?>','compartilhar', 'toolbar=0, status=0, width=650, height=450');"><span class="icon-facebook-1"></span></a>
                <a href="javascript:void(0);" class="twt" onclick="window.open('https://twitter.com/intent/tweet?original_referer=<?php //echo $url; ?>&source=tweetbutton&text=<?php //echo $tituloPost; ?>&url=<?php //echo $url; ?>&via=<?php //echo $profileTwitter; ?>','compartilhar', 'toolbar=0, status=0, width=650, height=450');"><span class="icon-twitter"></span></a>
            </div>
-->