<?php
	
	function __autoload($File)
	{
		require_once 'php/'.$File.'.class.php';
	}
	
	$user = new User();
?>
<html>
	<head>
    	<title>Registros</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
    	<table>
        	<thead>
        	<tr>
            	<th>E-mail</th>
                <th>Usuário</th>
            </tr>
            </thead>
            <tbody>
            <?php
				
				$saida = $user->GetUsers();
				
				if($saida)
				{
					foreach($saida as $lines):
			?>
            		<tr>
                    	<td><?php echo $lines->email; ?></td>
                        <td><?php echo $lines->nickname; ?></td>
                	</tr>
            <?php
					endforeach;
				}
				else
				{
			?>
            		<tr>
                    	<td colspan="2">Nenhum registro encontrado.</td>
                	</tr>
            <?php
				}
				
            ?>
            </tbody>
        </table>
    </body>
</html>