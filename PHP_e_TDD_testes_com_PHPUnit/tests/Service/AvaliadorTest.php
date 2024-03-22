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
    public  function testeAvaliadorDeveEncontarMaiorVAlorEmOrdemCrecente() {
        // Arrange - Given
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        $leiloeiro = new Avaliador();

        // Act - When
        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        // Assert - Then      
        self::assertEquals(2500, $maiorValor);
        

    }


    public  function testeAvaliadorDeveEncontarMaiorVAlorEmOrdemDecrecente() {
        // Arrange - Given
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));

        $leiloeiro = new Avaliador();

        // Act - When
        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->getMaiorValor();

        // Assert - Then      
        self::assertEquals(2500, $maiorValor);       

    }

    public  function testeAvaliadorDeveEncontarMenorVAlorEmOrdemDecrecente() {
        // Arrange - Given
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($maria, 2500));
        $leilao->recebeLance(new Lance($joao, 2000));

        $leiloeiro = new Avaliador();

        // Act - When
        $leiloeiro->avalia($leilao);

        $menorValor = $leiloeiro->getMenorValor();

        // Assert - Then      
        self::assertEquals(2000, $menorValor);       

    }


    public  function testeAvaliadorDeveEncontarMenorVAlorEmOrdemCrecente() {
        // Arrange - Given
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 2500));

        $leiloeiro = new Avaliador();

        // Act - When
        $leiloeiro->avalia($leilao);

        $menorValor = $leiloeiro->getMenorValor();

        // Assert - Then      
        self::assertEquals(2000, $menorValor);       

    }

    public function testAvaliadorDeveBuscarTreisMaioresValores() {
        $leilao = new Leilao('Fiat 147 0KM');
        $joao = new Usuario("João");
        $maria = new Usuario("Maria");
        $ana = new Usuario("Ana");
        $jorge = new Usuario('Jorge');

        $leilao->recebeLance(new Lance($ana, 1500));
        $leilao->recebeLance(new Lance($joao, 1000));
        $leilao->recebeLance(new Lance($maria, 2000));
        $leilao->recebeLance(new Lance($jorge, 1700));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);
        $maioresLances = $leiloeiro->getMaioresLances();

        static::assertCount(3, $maioresLances);
        static::assertEquals(2000, $maioresLances[0]->getValor());
        static::assertEquals(1700, $maioresLances[1]->getValor());
        static::assertEquals(1500, $maioresLances[2]->getValor());

    }
}
