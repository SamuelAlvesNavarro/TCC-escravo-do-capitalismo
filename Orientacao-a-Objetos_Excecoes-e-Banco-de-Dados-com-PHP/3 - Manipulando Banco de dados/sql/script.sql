CREATE DATABASE exemplo;

use exemplo;

CREATE TABLE produtos (
    id int(11) not null auto_increment,
    descricao varchar(50) default null,
    primary key(id)
);