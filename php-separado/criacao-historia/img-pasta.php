<?php
    $pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');

    $img = $_POST['imagem'];

    class Upload{

		private $name; //name do input que o usuário colocará a imagem
		private $pasta; //nome da pasta que receberá a imagem
		private $nome_substituto; //nome que irá sobrescrever o nome da imagem atual
        public function uploadImagem($name_imagem,$pasta_destino,$nome_principal){
            $this->name = $_FILES[$name_imagem];
	        $this->pasta = $pasta_destino;
	        $nome = $this->name;
            $this->nome_substituto = $nome_principal;
            $upload_arquivo = $this->pasta.$this->nome_substituto;
            move_uploaded_file($this->name, $upload_arquivo);

        }
    }

        $objImagem = new Upload;
        //chama o método que faz o upload da imagem
    $objImagem->uploadImagem("$img","img-story/","terror");
?>