<?php 

namespace Alura\Banco\Modelo\Funcionario;
use Alura\Banco\Modelo\{Pessoa, CPF};

abstract class Funcionario extends Pessoa
{
    private string $cargo;
    private float $salario;

    public function __construct($nome, CPF $cpf, $cargo, $salario) {
        
        parent::__construct($nome, $cpf);        
        $this->cargo = $cargo;
        $this->salario = $salario;
    }

    public function recebeAumento(float $valorAumento) : void {
        if ($valorAumento < 0) {
            echo "aumento deve ser positivo";
            return;
        }
        $this->salario += $valorAumento;

    }

    public function recuperaCargo() : string {
        return $this->cargo;
    }

    public function alteraNome(string $nome) : void {
        $this->validaNome($nome);
        $this->nome = $nome;
    }

    public function recuperaSalario() : float {
        return $this->salario;
    }

   public function calculaBonificacao() : float {
        return $this->salario * 0.1;
   } 

}
