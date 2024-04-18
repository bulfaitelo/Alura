<?php
use Alura\Banco\Modelo\Endereco;

require_once  'autoload.php';

$umEndereco = new Endereco(
    'PEtropolias',
    'Bairro de rola',
    'Rua da rua ',
    '123'
);

$outroEndereco = new Endereco(
    'Rio',
    'bla bla bla',
    'blo blo blo',
    '69'
);

echo "<pre>";
echo $umEndereco->rua;
echo $umEndereco . PHP_EOL;
echo $outroEndereco . PHP_EOL;