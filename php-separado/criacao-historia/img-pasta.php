<?php
    $pdo = new PDO('mysql:host=localhost;dbname=pi', 'root', '');

    class Upload{

		private $name; //name do input que o usuário colocará a imagem
		private $pasta; //nome da pasta que receberá a imagem
		private $nome_substituto; //nome que irá sobrescrever o nome da imagem atual
        public function uploadImagem($name_imagem,$pasta_destino,$nome_principal){

            //Capturando os dados, e armazenando em variáveis locais, e variáveis de classe
            $this->name = $_FILES[$name_imagem];
	        $this->pasta = $pasta_destino;
	        $nome = $this->name['name'];

            $this->nome_substituto = $nome_principal;

            $upload_arquivo = $this->pasta.$this->nome_substituto;
            move_uploaded_file($this->name['tmp_name'], $upload_arquivo);

        }
    }

        $objImagem = new Upload;
        //chama o método que faz o upload da imagem
        $objImagem->uploadImagem("imagem","img-story/","terror");
        session_start();
        header("Location:exibir.php");
?>