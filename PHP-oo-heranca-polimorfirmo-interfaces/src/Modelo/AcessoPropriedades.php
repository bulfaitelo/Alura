<?php 

namespace Alura\Banco\Modelo;

trait AcessoPropriedades
{
    function __get($nomeAtributo) {
        $metodo = 'recupera' . ucfirst($nomeAtributo);
        return $this->$metodo();
    }

}
 