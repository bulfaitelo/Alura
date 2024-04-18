<?php
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Service\Autenticador;

require_once 'autoload.php';

$autenditador = new Autenticador();

$umDiretor = new Diretor(
    'João da ilva',
    new CPF('111.111.111-30'),
    10000
);

$autenditador->tentaLogin($umDiretor, '1234');