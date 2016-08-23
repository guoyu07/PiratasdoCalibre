<?php
	
	function __autoload($File)
	{
		require_once '../../php/'.$File.'.class.php';
	}
	
	if(!session_start())
		session_start();
	
	$user = new User();
	$message = "";
	
	if(isset($_SESSION['codAdm']) && $_SESSION['codAdm'] != "")
	{
		header("Location: ../");
	}
	
	if(isset($_POST['login']) && $_POST['login'] != "" &&
	   isset($_POST['pass'])   && $_POST['pass']   != "")
	{
		$user->setLogin($_POST['login']);
		$user->setSenha($_POST['pass']);
		
		$return = $user->Auth();
		
		if(!$return[0])
		{
			$message = "Login ou senha incorretos!";
		}
		else
		{			
			foreach($return[1] as $line):
			
				$_SESSION['codAdm'] = $line->idadm;
				$_SESSION['nomeAdm'] = $line->loginadm;
				
			endforeach;
			
			header("Location: ../");
		}
	}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Autentique-se - Piratas do Calibre</title>
        <link rel="stylesheet" href="../../css/normalize.css" />
        <link rel="stylesheet" href="../../css/stylenew.css" />
        <link rel="stylesheet" href="../../css/include.css" />
        <style>body{background:none;}.top>.name{width:100%;text-align:center;}</style>
    </head>
    <body>
    	<div class="top">
        	<div class="name">
            	Área Administrativa - Autenticação
                <img src="../../img/pdc.png" width="40px" height="auto" alt="pdc" title="Piratas do Calibre" />
            </div>
        </div>
        <div class="error">
        	<?php echo $message."<span class=\"icon-attention\"></span>"; ?>
        </div>
        <section class="auth">
        	<form action="./" method="post">
            	<h2>Autenticação</h2>
            	<input type="text" name="login" placeholder="Login" required autofocus />
                <input type="password" name="pass" placeholder="Senha" required />
                <button class="transition">Entrar <span class="icon-right-dir"></span></button>
            </form>
        </section>
    </body>
</html>