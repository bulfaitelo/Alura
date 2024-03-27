<?php 

use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Conta\ContaPoupanca;
use Alura\Banco\Modelo\Conta\Conta;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Endereco;


require_once 'autoload.php';



$conta = new Conta(
    new Titular (
        new CPF('123.456.789-80'), 
        'THiago Rodrigues',
        new Endereco('RJ', 'porto do rosa', 'Av porto do rosa', '40'),   
    )
);

$conta->deposita(500);
$conta->saca(100);
echo $conta->recuperaSaldo();