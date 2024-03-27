<?php

class Titular extends Pessoa
{

    private $endereco;

    public function __construct(CPF $cpf, string $nome, Endereco $endereco)
    {
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }





    public function getEndereco() : Endereco {
        return $this->endereco;
    }
}
