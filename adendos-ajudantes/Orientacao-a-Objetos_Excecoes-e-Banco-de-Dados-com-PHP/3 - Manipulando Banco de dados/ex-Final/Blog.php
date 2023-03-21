<?php

declare(strict_types = 1);

class Blog
{
    
    private $connect;

    public function __construct()
    {
        try {
            $this->connect = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        } catch (Exception $th) {
            echo $th->getMessage();
            die();
        }
    }

    public function list(): array
    {
        $sql = 'select * from posts';

        $posts = [];

        foreach ($this->connect->query($sql) as $key => $value) {
            array_push($posts, $value);
        }

        return $posts;
    }

    public function insert(string $descricao) : int 
    {
        $sql = 'insert into posts(descricao) values(?)';

        $prepare = $this->connect->prepare($sql);

        $prepare -> bindParam(1, $descricao);
        $prepare -> execute();

        return $prepare -> rowCount();
    }

    public function update(string $descricao, int $id) : int 
    {
        $sql = 'update posts set descricao = ? where id = ?';

        $prepare = $this->connect->prepare($sql);

        $prepare->bindParam(1, $descricao);
        $prepare->bindParam(2, $id);

        $prepare->execute();

        return $prepare->rowCount();
    }
    
    public function delete(int $id) : int 
    {
        $sql = 'delete from posts where id = ?';

        $prepare = $this->connect->prepare($sql);

        $prepare->bindParam(1, $id);
        $prepare->execute();

        return $prepare->rowCount();
    }
}