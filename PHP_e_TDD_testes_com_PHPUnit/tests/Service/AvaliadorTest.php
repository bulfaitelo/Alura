<?php


namespace Alura\Leilao\Tests\Service;
use PHPUnit\Framework\TestCase;
use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

use function PHPUnit\Framework\assertJson;
use function PHPUnit\Framework\assertTrue;

class AvaliadorTest extends TestCase
{

    
    /**
     * @dataProvider LeilaoEmOrdemCrescente
     * @dataProvider LeilaoEmOrdemDecrescente
     * @dataProvider LeilaoEmOrdemAleatoria
     */
    public  function testeAvaliadorDeveEncontarMaiorVAlor(Leilao $leilao) {
        // Arrange - Given
        
        $leiloeiro = new Avaliador();

        // Act - When
        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        // Assert - Then      
        self::assertEquals(2500, $maiorValor);
        

    }

    /**
     * @dataProvider LeilaoEmOrdemCrescente
     * @dataProvider LeilaoEmOrdemDecrescente
     * @dataProvider LeilaoEmOrdemAleatoria
     */
    public  function testeAvaliadorDeveEncontarMenorVAlorEmOrdemDecrecente(Leilao $leilao) {


        $leiloeiro = new Avaliador();

        // Act - When
        $leiloeiro->avalia($leilao);

        $menorValor = $leiloeiro->getMenorValor();

        // Assert - Then      
        self::assertEquals(1700, $menorValor);       

    }



   /**
     * @dataProvider LeilaoEmOrdemCrescente
     * @dataProvider LeilaoEmOrdemDecrescente
     * @dataProvider LeilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveBuscarTreisMaioresValores(Leilao $leilao) {        

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);
        $maioresLances = $leiloeiro->getMaioresLances();

        static::assertCount(3, $maioresLances);
        static::assertEquals(2500, $maioresLances[0]->getValor());
        static::assertEquals(2000, $maioresLances[1]->getValor());
        static::assertEquals(1700, $maioresLances[2]->getValor());

    }


    public static function LeilaoEmOrdemCrescente() {
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($ana, 1700));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        return [
            [$leilao]
        ];
    }

    public static function LeilaoEmOrdemDecrescente() {
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($ana, 1700));

        return [
            [$leilao]
        ];
    }

    
    public static function LeilaoEmOrdemAleatoria() {
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($ana, 1700));

        return [
            [$leilao]
        ];
    }


}
