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

    private $leiloeiro;
    protected function setUp(): void {        
        $this->leiloeiro = new Avaliador();
    }
    
    /**
     * @dataProvider LeilaoEmOrdemCrescente
     * @dataProvider LeilaoEmOrdemDecrescente
     * @dataProvider LeilaoEmOrdemAleatoria
     */
    public  function testeAvaliadorDeveEncontarMaiorVAlor(Leilao $leilao) {
        // Arrange - Given
        
        // Act - When
        $this->leiloeiro->avalia($leilao);
        $maiorValor = $this->leiloeiro->getMaiorValor();

        // Assert - Then      
        self::assertEquals(2500, $maiorValor);
        

    }

    /**
     * @dataProvider LeilaoEmOrdemCrescente
     * @dataProvider LeilaoEmOrdemDecrescente
     * @dataProvider LeilaoEmOrdemAleatoria
     */
    public  function testeAvaliadorDeveEncontarMenorVAlorEmOrdemDecrecente(Leilao $leilao) {

        
        // Act - When
        $this->leiloeiro->avalia($leilao);
        $menorValor = $this->leiloeiro->getMenorValor();

        // Assert - Then      
        self::assertEquals(1700, $menorValor);       

    }



   /**
     * @dataProvider LeilaoEmOrdemCrescente
     * @dataProvider LeilaoEmOrdemDecrescente
     * @dataProvider LeilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveBuscarTreisMaioresValores(Leilao $leilao) {                

        $this->leiloeiro->avalia($leilao);
        $maioresLances = $this->leiloeiro->getMaioresLances();

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
           'ordem-crescente' => [$leilao]
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
            'ordem-decrescente' => [$leilao]
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
            'ordem-aleatoria' => [$leilao]
        ];
    }


}
