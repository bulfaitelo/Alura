<?php


class Endereco 
{
    private string $cidade;
    private string $bairro;
    private string $rua;
    private string $numero;


    public function __construct($cidade, $bairro, $rua, $numero) {
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
    }

    public function getCidade() : string {
        return $this->cidade;
    }
    public function getBairro() : string {
        return $this->bairro;
    }
    public function getRua() : string {
        return $this->rua;
    }
    
    public function getNumero() : string {
        return $this->numero;
    }

}
