<?php

declare(strict_types = 1);

class Produto
{
    /**
     * @var PDO
     */
    private $connect;

    public function __construct()
    {
        try {
            $this->connect = new PDO('mysql:host=localhost;dbname=exemplo', 'root', '');
        } catch (Throwable $th) {
            echo $th->getMessage();
            die();
        }
    }

    public function list(): array
    {
        $sql = 'select * from produtos';

        $produtos = [];

        foreach ($this->connect->query($sql) as $key => $value) {
            array_push($produtos, $value);
        }

        return $produtos;
    }

    public function insert(string $descricao) : int 
    {
        $sql = 'insert into produtos(descricao) values(?)';

        $prepare = $this->connect->prepare($sql);

        $prepare -> bindParam(1, $descricao);
        $prepare -> execute();

        return $prepare -> rowCount();
    }

    public function update(string $descricao, int $id) : int 
    {
        $sql = 'update produtos set descricao = ? where id = ?';

        $prepare = $this->connect->prepare($sql);

        $prepare->bindParam(1, $descricao);
        $prepare->bindParam(2, $id);

        $prepare->execute();

        return $prepare->rowCount();
    }
    
    public function delete(int $id) : int 
    {
        $sql = 'delete from produtos where id = ?';

        $prepare = $this->connect->prepare($sql);

        $prepare->bindParam(1, $id);
        $prepare->execute();

        return $prepare->rowCount();
    }
}