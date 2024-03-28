<?php 


namespace Alura\Banco\Modelo\Funcionario;

class Desevolvedor extends Funcionario
{
    public function sobeDeNivel() {
        $this->recebeAumento($this->recuperaSalario() * 0.75);
    }
}
