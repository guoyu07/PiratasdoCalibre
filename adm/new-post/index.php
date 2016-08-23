<?php
	
	function __autoload($File)
	{
		require_once '../../php/'.$File.'.class.php';
	}
	
	if(!session_start())
		session_start();
	
	if(isset($_SESSION['codAdm']) && $_SESSION['codAdm'] != "")
	{
		$codAdm   = $_SESSION['codAdm'];
		$userName = $_SESSION['nomeAdm'];
	}
	else
	{
		header("Location: ../auth/");
		//$userName = "Usuário não autenticado";
	}
	
	$post = new Post();
	
	if(isset($_POST['titulopost']) && $_POST['titulopost'] != "" &&
	   isset($_POST['descpost'])   && $_POST['descpost']   != "" &&
	   isset($_POST['textopost'])  && $_POST['textopost']  != "" &&
	   isset($_POST['areapost'])   && $_POST['areapost']   != "")
	{	
		$post->setTitulo($_POST['titulopost']);
		$post->setDesc($_POST['descpost']);
		$post->setTexto($_POST['textopost']);
		$post->setImg($_POST['imagepost']);
		$post->setArea($_POST['areapost']);
		$post->setDataHora(date('Y-m-d H:i:s'));
		
		$return = $post->Create();
		
		if(!$return[0])
		{
			switch($return[1])
			{
				case "duplicado":
					header("Location: ./err.php");
					break;
				case "erroQuery":
					header("Location: ./err.php");
					break;
			}
		}
		else
		{
			$create = $return[1];
			
			foreach($create as $line):
				$idpost = $line->idpost;
			endforeach;
				
			header("Location: sucess.php?post=".$idpost);
		}
	}
	
	if(isset($_GET['logout']) && $_GET['logout'] == "true")
	{
		session_destroy();
		header("Location: ./");
	}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Novo Post - Piratas do Calibre</title>
        <link rel="stylesheet" href="../../css/normalize.css" />
        <link rel="stylesheet" href="../../css/stylenew.css" />
        <link rel="stylesheet" href="../../css/include.css" />
        <style>body{background:none;}</style>
    </head>
    <body>
    	<div class="top">
        	<div class="name">
            	Área Administrativa
                <img src="../../img/pdc.png" width="40px" height="auto" alt="pdc" title="Piratas do Calibre" />
            </div>
            <nav>
            	<section class="menu">
                	<ul>
                    	<li><a title="Início" href="../">Início <span class="icon-anchor"></span></a></li>
                        <li><a class="active" href="./" title="Novo post">Novo Post <span class="icon-doc-text"></span></a></li>
                        <li><a href="../../" title="Site" target="_blank">Site <span class="icon-home"></span></a></li>
                        <li><a href="javascript:void(0);" title="<?php echo $userName ?>"><?php echo $userName; ?><span class="icon-user"></span></a></li>
                        <li><a href="./?logout=true" title="Encerra a sessão atual">Sair<span class="icon-cancel"></span></a></li>
                    </ul>
                </section>
            </nav>
        </div>
        <section class="adm">
        	<header>
            	<h1>Novo artigo/notícia</h1>
                <hr />
            </header>
        	<form action="./" method="post">
            	<span>Utilize até 50 caracteres. Seja bem sucinto.</span>
            	<input type="text" name="titulopost" maxlength="50" placeholder="Título do Post" required />
                <span>Utilize até 200 caracteres. Em resumo, do que se trata o artigo ou notícia. Seja breve.</span>
                <textarea id="dsc" name="descpost" required maxlength="200" placeholder="Descrição do artigo ou notícia"></textarea>
                <span>Utilize tags HTML | &lt;br /&gt; para pular linha, por exemplo.</span><br />
                <span>Utilize até 5000 caracteres. Aqui sim, pode escrever a vontade!</span>
                <textarea id="txt" name="textopost" required maxlength="5000" placeholder="Conteúdo do artigo ou notícia"></textarea>
                <span>Escolha uma área para publicação.</span>
                <select name="areapost" required>
                    <?php
						
						$return = $post->AreaPost();
						
						if(!$return)
							echo "<option value=''>Nada encontrado</option>";
						else
						{
							echo "<option value=''>Selecione a área</option>";
							foreach($return as $line):
								echo "<option value='".$line->idareapost."'>".utf8_encode($line->areapost)."</option>";
							endforeach;
						}
                    ?>
                </select>
                <span>A imagem deverá conter até 2mb.[Imagem opcional]</span>
                <input type="file" name="imagepost" />
                <button class="transition">Cadastrar <span class="icon-plus"></span></button>
            </form>
        </section>
    </body>
</html>