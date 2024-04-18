<?php

require_once  'autoload.php';

use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Modelo\Funcionario\EditorVideo;
use Alura\Banco\Modelo\Funcionario\Funcionario;
use Alura\Banco\Modelo\Funcionario\Gerente;
use Alura\Banco\Modelo\Funcionario\Desevolvedor;
use Alura\Banco\Service\ControladorDeBonificacoes;


$umFuncionario = new Desevolvedor(
    'Thiago Rodrigues',
    new CPF('123.123.123-12'),
     1000
);

$umFuncionario->sobeDeNivel();

$umFuncionaria = new Gerente(
    'Sirlei Ferreira',
    new CPF('333.333.333-33'),
     3000
);

$umDiretor = new Diretor(
    'PAtrão',
    new CPF('444.444.444-12'),
    5000
);


$umEditor = new EditorVideo(
    'Paulo bolinha',
    new CPF('555.555.555-30'),
    1500
);

$controlador = new ControladorDeBonificacoes();

$controlador->adicionaBonificacaoDe($umFuncionario);
$controlador->adicionaBonificacaoDe($umFuncionaria);
$controlador->adicionaBonificacaoDe($umDiretor);
$controlador->adicionaBonificacaoDe($umEditor);


echo $controlador->recuperaTotal();