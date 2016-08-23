<?php
	
	require_once 'Crud.class.php';
	
	class User extends Crud
	{
		protected $table = "usuario";
		
		private $idUsuario;
		private $loginUsuario;
		private $emailUsuario;
		private $senhaUsuario;
		
		public function setId($id)
		{
			$this->idUsuario = $id;
		}
		
		public function setEmail($email)
		{
			$this->emailUsuario = $email;
		}
		
		public function setLogin($login)
		{
			$this->loginUsuario = $login;
		}
		
		public function setSenha($senha)
		{
			$this->senhaUsuario = $senha;
		}
		
		public function Create(){}
		public function Read()  {}
		public function Update(){}
		public function Delete(){}
		
		public function Auth()
		{
			$query = "SELECT idadm, loginadm FROM adm WHERE loginadm = :login AND passadm = :pass";
			$stmt = DB::Prepare($query);
			
			$stmt->bindParam(":login", $this->loginUsuario, PDO::PARAM_STR);
			$stmt->bindParam(":pass", sha1($this->senhaUsuario), PDO::PARAM_STR);
			
			$stmt->execute();
			
			if($stmt->rowCount() == 1)
			{
				return array(0 => true, 1 => array($stmt->fetch()));
			}
			else
			//if($stmt->rowCount() != 1)
			{
				return array(0 => false);
			}
		}
		
		public function GetUsers()
		{
			$query = "SELECT email, nickname from $this->table ORDER BY email ASC";
			$stmt  = DB::Prepare($query);
			
			$stmt->execute();
			
			if(($stmt->rowCount()) == 0)
			{
				return false;
			}
			else
			{
				return $stmt->fetchAll();
			}
			
		}
		
		public function Register()
		{
			if($this->emailUsuario != "" && $this->loginUsuario != "" && $this->senhaUsuario != "")
			{
				// Verifica o email
				$queryEmail = "SELECT email from $this->table WHERE email = :email";
				
				$stmt  = DB::Prepare($queryEmail);
				$stmt->bindParam(':email', $this->emailUsuario, PDO::PARAM_STR);
				
				$stmt->execute();
				
				$verifica = $stmt->rowCount();
				
				if($verifica != 0)
				{
					// DE -> Email Duplicado
					return array(0 => false, 1 => "DE");
				}
				else
				{
					// Verifica o nick
					$queryNick = "SELECT nickname from $this->table WHERE nickname = :login";
					
					$stmt  = DB::Prepare($queryNick);
					$stmt->bindParam(':login', $this->loginUsuario, PDO::PARAM_STR);
					
					$stmt->execute();
					
					$verifica = "";
					$verifica = $stmt->rowCount();
					
					if($verifica != 0)
					{
						// DN -> Nick Duplicado
						return array(0 => false, 1 => "DN");
					}
					else
					{
						$query = "INSERT INTO $this->table (email, nickname, senha) VALUES (:email, :login, :senha)";
						
						$stmt  = DB::Prepare($query);
						
						$stmt->bindParam(':email', $this->emailUsuario, PDO::PARAM_STR);
						$stmt->bindParam(':login', $this->loginUsuario, PDO::PARAM_STR);
						$stmt->bindParam(':senha', sha1($this->senhaUsuario), PDO::PARAM_STR);
						
						//$saida = $this->SendMail();
						
						//$saida = $saida[0] ? array(0 => true, 1 => $stmt->execute()) : array(0 => false, 1 => "ENE");
						
						return array(0 => true, 1 => $stmt->execute());
					}
				}
			}
			else
			{
				return array(0 => false, 1 => "Nop");
			}
		}
		
		private function getMessage()
		{
			$write = '<!doctype html>
					  <html>
						 <head>
						 	 <meta charset=\"utf-8\">
						 </head>';
			
			$write .= '<header>
						<h1>Bem-vindo à tripulação, marujo!</h1>
					</header>
					<div class="s">
					<p>Ahoy, marujo! Preparado para ser um pirata?</p>
					<p>Caso queira fazer o download em outro PC ou MAC, <a href="tcp3.byethost7.com/download/">clique aqui</a></p>
					</div>
					</body>
					</html>';
			
			
			return $write;
			
		}
		
		private function SendMail()
		{
			$to      = $this->emailUsuario;
			$from    = "pdcalibre@tcp3.byethost7.com";
			$subject = "Novo marujo - Piratas do Calibre";
			
			$headers   = array();
			$headers[] = "MIME-Version: 1.0";
			$headers[] = "Content-type: text/plain; charset=utf-8";
			$headers[] = "From: Equipe Piratas do Calibre <".$from.">";
			$headers[] = "Reply-To: Contato <pdcalibre@gmail.com>";
			$headers[] = "Subject: {".$subject."}";
			$headers[] = "X-Mailer: PHP/".phpversion();
			
			$message = wordwrap($this->getMessage(), 70);
			
			$send = mail($to, $subject, $email, implode("\r\n", $headers));
			
			if(!$send)
			{
				return array(0 => false, 1 => "e");
			}
			else
			{
				return array(0 => true, 1 => "sucess");
			}
			
		}
	}
?>