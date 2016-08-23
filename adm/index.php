<?php
	
	function __autoload($File)
	{
		require_once '../php/'.$File.'.class.php';
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
		header("Location: auth/");
		//$userName = "Usuário não autenticado";
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
        <title>Área Administrativa - Piratas do Calibre</title>
        <link rel="stylesheet" href="../css/normalize.css" />
        <link rel="stylesheet" href="../css/stylenew.css" />
        <link rel="stylesheet" href="../css/include.css" />
        <style>body{background:none;}</style>
    </head>
    <body>
    	<div class="top">
        	<div class="name">
            	Área Administrativa
                <img src="../img/pdc.png" width="40px" height="auto" alt="pdc" title="Piratas do Calibre" />
            </div>
            <nav>
            	<section class="menu">
                	<ul>
                    	<li><a class="active" title="Início" href="./">Início <span class="icon-anchor"></span></a></li>
                        <li><a href="new-post/" title="Novo post">Novo Post <span class="icon-doc-text"></span></a></li>
                        <li><a href="../" title="Site" target="_blank">Site <span class="icon-home"></span></a></li>
                        <li><a href="javascript:void(0);" title="<?php echo $userName ?>"><?php echo $userName; ?><span class="icon-user"></span></a></li>
                        <li><a href="./?logout=true" title="Encerra a sessão atual">Sair<span class="icon-cancel"></span></a></li>
                    </ul>
                </section>
            </nav>
        </div>
        <section class="adm">
        	<header>
        		<h1>Área Administrativa</h1>
                <hr />
            </header>
            <br /><br /><br />
            <h1 style="text-align: center;">Em desenvolvimento. Aguarde por novidades...</h1>
        </section>
    </body>
</html>