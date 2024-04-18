<?php

namespace Alura\Banco\Modelo;

abstract class Pessoa 
{
    protected string $nome;
    private CPF $cpf;
    public function __construct($nome, CPF $cpf) {

        $this->validaNome($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function recuperaNome() : string {
        return $this->nome;
    }

    public function recuperaCpf() : string {
        return $this->cpf->recuperaNumero();
    }

    protected  function validaNome(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 5) {
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }
}