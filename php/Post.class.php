<?php
	
	require_once 'Crud.class.php';
	
	class Post extends Crud
	{
		protected $Table = "post";
		
		private $idPost;
		private $tituloPost;
		private $imgPost;
		private $textoPost;
		private $datahoraPost;
		private $areaPost;
		private $descPost;
		private $param;
		
		public function setId($id)
		{
			$this->idPost = $id;
		}
		
		public function setTitulo($titulo)
		{
			$this->tituloPost = $titulo;
		}
		
		public function setImg($img)
		{
			$this->imgPost = $img;
		}
		
		public function setTexto($text)
		{
			$this->textoPost = $text;
		}
		
		public function setDataHora($dthr)
		{
			$this->datahoraPost = $dthr;
		}
		
		public function setArea($area)
		{
			$this->areaPost = $area;
		}
		
		public function setDesc($desc)
		{
			$this->descPost = $desc;
		}
		
		public function setParam($param)
		{
			$this->param = "%".$param."%";
		}
		
		//Equivalente ao insert
		public function Create()
		{
			//Faz os testes para averiguar se existe um post igual
			
			//Decodifica a string / Remove os acentos / Retira os espaços e troca por - [traços]
			$nomePost = utf8_decode($this->tituloPost);
			$nomePost = $this->RemoveAcentos($nomePost);
			$nomePost = str_replace(" ","-",$nomePost);
			
			$queryVPost = "SELECT idpost FROM $this->Table WHERE titulopost = :titulo OR descpost = :desc";
			$stmt = DB::Prepare($queryVPost);
			
			$stmt->bindParam(":titulo", $this->tituloPost, PDO::PARAM_STR);
			$stmt->bindParam(':desc',   $this->descPost, PDO::PARAM_STR);
			
			$stmt->execute();
			
			if(($stmt->rowCount()) != 0)
			{
				return array(0 => false, 1 => "duplicado");
			}
			else
			{
				$query = "INSERT INTO $this->Table(titulopost, imgpost, textopost, datahorapost, areapost, descpost) VALUES (:titulo, :img, :texto, :data, :area, :desc)";
				$stmt = DB::Prepare($query);
				
				$stmt->bindParam(':titulo', $this->tituloPost, PDO::PARAM_STR);
				$stmt->bindParam(':img',    $this->setImg, PDO::PARAM_STR);
				$stmt->bindParam(':texto',  $this->textoPost, PDO::PARAM_STR);
				$stmt->bindParam(':data',   $this->datahoraPost);
				$stmt->bindParam(':area',   $this->areaPost, PDO::PARAM_INT);
				$stmt->bindParam(':desc',   $this->descPost, PDO::PARAM_STR);
				
				$stmt->execute();
				
				if(!$stmt)
				{
					return array(0 => false, 1 => "erroQuery");
				}
				
				$select = "SELECT idpost FROM $this->Table WHERE titulopost = :titulo";
				$stmt = DB::Prepare($select);
				
				$stmt->bindParam(':titulo', $this->tituloPost, PDO::PARAM_STR);
				
				$stmt->execute();
				
				return array(0 => true, 1 => array($stmt->fetch()));
			}
		}
		
		public function Read()
		{
			$query = "SELECT idpost, titulopost, imgpost, descpost FROM $this->Table ORDER BY datahorapost DESC";
			$stmt  = DB::Prepare($query);
			
			$stmt->execute();
			
			return $stmt->fetchAll();
		}
		
		public function Update(){ return null; }
		public function Delete(){ return null; }
		
		public function SearchPost()
		{
			$query = "SELECT idpost, titulopost, imgpost, textopost, DATE_FORMAT( datahorapost, '%d/%m/%Y' ) AS datapost, areapost, descpost FROM $this->Table WHERE titulopost LIKE :param ORDER BY datapost ASC";
			$stmt  = DB::Prepare($query);
			$stmt->bindParam(':param', $this->param, PDO::PARAM_STR);
			
			$stmt->execute();
			
			if(($stmt->rowCount()) == 0)
			{
				return array(0 => false);
			}
			else
			{
				return array(0 => true , 1 => array($stmt->fetchAll()));
			}
		}
		
		public function UpdateProjeto($Codigo)
		{
			return 0;
		}
		
		public function RequestPost()
		{
			$query = "SELECT idpost, titulopost, imgpost, textopost, datahorapost, areapost, descpost FROM $this->Table WHERE idpost = :param";
			$stmt  = DB::Prepare($query);
			
			$stmt->bindParam(':param', $this->idPost, PDO::PARAM_INT);
			
			$stmt->execute();
			
			if(($stmt->rowCount()) == 0)
			{
				return array(0 => false);
			}
			else
			{
				return array(0 => true , 1 => array($stmt->fetch()));
			}
		}
		
		public function AreaPost()
		{
			$query = "SELECT idareapost, areapost FROM areapost ORDER BY areapost ASC";
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
		
		private function RemoveAcentos($String, $Slug = false)
		{
			$String = strtolower($String);
			
			$Ascii['a'] = range(
								 224,
								 230
								);
								
			$Ascii['e'] = range(
								 232,
								 235
								);
								
			$Ascii['i'] = range(
								 236,
								 239
								);
								
			$Ascii['o'] = array_merge(
									   range(
									   		  242,
									   		  246
											 ),
									   array(
									   		  240,
											  248,
											 )
									  );
									  
			$Ascii['u'] = range(
								 249,
								 252
								);
			
			$Ascii['b'] = array(223);
			$Ascii['c'] = array(231);
			$Ascii['d'] = array(208);
			$Ascii['n'] = array(241);
			$Ascii['y'] = array(
								 253,
								 255
								);
			
			foreach ($Ascii as $Key => $Item)
			{
				$Acentos = '';
				
				foreach($Item as $Codigo)
					$Acentos .= chr($Codigo);
				
				$Troca[$Key] = '/['.$Acentos.']/i';
			}
			
			$String = preg_replace(array_values($Troca),
			                       array_keys($Troca),
								   $String);
			
			/**
			 * Slug(?)
			 */
			
			if ($Slug)
			{
				$String = preg_replace('/[^a-z0-9]/i', $Slug, $String);
				
				$String = preg_replace('/'.$Slug.'{2,}/i',
									   $Slug,
									   $String);
				
				$String = trim($String, $Slug);
			}
			
			return $String;
		}
		
		public function GetValue()
		{
			$folder = utf8_decode($this->tituloPost);
			$folder = $this->RemoveAcentos($folder);
			$folder = str_replace(" ","-", $folder);
			
			return $folder;
		}
		
		public function WriteFile()
		{
			$profileTwitter = "pdcalibre";
			$imgPost = $this->imgPost ? $this->imgPost : "LogoFinal.png";
			
			$dH = explode(" ", $this->datahoraPost, 2);
			
			$date = explode("-", $dH[0], 3);
			list($ano, $mes, $dia) = $date;
			$data = $dia."/".$mes."/".$ano;
			
			$hour = explode(":", $dH[1], 3);
			list($hr, $min, $seg) = $hour;
			$hora = $hr.":".$min;
			
			$t = $this->SelectArea($this->areaPost);
			foreach($t as $a):
				$tag = str_replace(" ", "-", strtolower($t->areapost));
				$titleTag = $t->areapost;
			endforeach;
			
			$server  = $_SERVER['SERVER_NAME'];
			$address = $_SERVER['REQUEST_URI'];
			$url = "http://".$server.$address;
			
			$write = '<!doctype html>
					<html>
						<head>
							<meta charset=\"utf-8\">
							<link rel="shortcut icon" href="../../img/" />
							<title>'.$this->tituloPost.'</title>
							<link rel="stylesheet" href="../../css/normalize.css" />
							<link rel="stylesheet" href="../../css/stylenew.css" />
							<link rel="stylesheet" href="../../css/include.css" />
							<style>body{background:url(../../img/'.$imgPost.') no-repeat;background-attachment:fixed;background-size:cover;}</style>
							<script src="../../js/jquery.min.js"></script>
						</head>';
						
			$write .= '<body>
						<div class="top">
							<div class="name">
								Piratas do Calibre
							</div>
							<nav>
								<section class="menu">
									<ul>
										<li><a title="Início" href="../../">Início <span class="icon-anchor"></span></a></li>
										<li><a href="../../about/" title="Sobre a empresa">Sobre <span class="icon-info"></span></a></li>
										<li><a href="../../register/" title="Cadastre-se">Cadastro <span class="icon-user-plus"></span></a></li>
										<li><a href="../../download/" title="Faça download do jogo">Baixe o jogo <span class="icon-download"></span></a></li>
										<li><a href="https://www.facebook.com/piratasdocalibre/" title="Visite nossa página no facebook" target="_blank"><span class="icon-facebook-1"></span></a></li>
                        				<li><a href="https://twitter.com/pdcalibre" title="Siga-nos no twitter" target="_blank"><span class="icon-twitter"></span></a></li>
									</ul>
								</section>
							</nav>
						</div>';
						
			$write .= '<section class="container">
						<header>
							<h1>'.$this->tituloPost.'</h1>
							<h3>'.$this->descPost.'</h3>
							<hr />
							<p>Tag<span class="icon-tag"></span> <a href="?'.$tag.'" title="Veja todos os posts com esta tag">'.$titleTag.'</a> | Postado em <span class="icon-calendar"></span> '.$data.' às <span class="icon-clock"></span> '.$hora.'</p>
						</header>
						<article>
							<p>'.$this->textoPost.'</p>
						</article>
						<hr />';
						
            $write .= '<div class="social">
						<h2>Compartilhe este post</h2>
						<a href="javascript:void(0);" class="fb" onclick="window.open(\'http://www.facebook.com/sharer.php?u='.$url.'\',\'compartilhar\', \'toolbar=0, status=0, width=650, height=450\');"><span class="icon-facebook-1"></span></a>
						<a href="javascript:void(0);" class="twt" onclick="window.open(\'https://twitter.com/intent/tweet?original_referer='.$url.'&source=tweetbutton&text='.$this->tituloPost.'&url='.$url.'&via='.$profileTwitter.'\',\'compartilhar\', \'toolbar=0, status=0, width=650, height=450\');"><span class="icon-twitter"></span></a>
					</div>
				</section>';
				
        	$write .= '<footer>
						<a class="up transition" title="Voltar ao topo" href="javascript:void(0);" id="up"><span class="icon-up-open"></span></a>
						<div class="social-bar">
							<h3>Siga-nos em nossas redes sociais</h3>
							<div class="icons">
								<a href="https://www.facebook.com/piratasdocalibre/" class="fb transition" target="_blank"><span class="icon-facebook-1"></span></a>
								<a href="https://twitter.com/pdcalibre" class="twt transition" target="_blank"><span class="icon-twitter"></span></a>
							</div>
						</div>
						<br />
						<p>Contato <span class="icon-right-dir"></span><a href="mailto:pdcalibre@gmail.com">pdcalibre@gmail.com</a></p>
						<br />
						<p>&copy; Piratas do Calibre &ndash; TCP III 2015-2</p>
					</footer>';
					
			$write .= '<script type="text/javascript">
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
			</html>';
			
			return $write;
		}
		
		public function SelectArea($area)
		{
			$query = "SELECT areapost from areapost WHERE idareapost = :areapost";
			$stmt  = DB::Prepare($query);
			
			$stmt->bindParam(':areapost', $area, PDO::PARAM_INT);
			
			$stmt->execute();
			
			if(($stmt->rowCount()) != 1)
			{
				return false;
			}
			else
			{
				return $stmt->fetch();
			}
		}
		
	}
?>