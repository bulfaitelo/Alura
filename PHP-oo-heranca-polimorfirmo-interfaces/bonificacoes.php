<?php

require_once  'autoload.php';

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Modelo\Funcionario\Funcionario;
use Alura\Banco\Modelo\Funcionario\Gerente;
use Alura\Banco\Modelo\Funcionario\Desevolvedor;
use Alura\Banco\Service\ControladorDeBonificacoes;


$umFuncionario = new Desevolvedor(
    'Thiago Rodrigues',
    new CPF('123.123.123-12'),
    'Desevolvedor',
     1000
);

$umFuncionario->sobeDeNivel();

$umFuncionaria = new Gerente(
    'Sirlei Ferreira',
    new CPF('333.333.333-33'),
    'Gerente',
     3000
);

$umDiretor = new Diretor(
    'PAtrão',
    new CPF('444.444.444-12'),
    'diretor',
    5000
);

$controlador = new ControladorDeBonificacoes();

$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($umFuncionaria);
$controlador->adicionaBonificacaoDe($umDiretor);


echo $controlador->recuperaTotal();