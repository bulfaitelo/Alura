# Alura

## PHP_e_TDD_testes_com_PHPUnit



A tarefa mais demorada ao escrever testes de unidade normalmente é preparar o cenário, utilizando os dados necessários para o teste, e depois desfazer as ações que possam afetar outros testes.

Para executar código antes ou depois de testes, o PHPUnit nos fornece as fixtures. São métodos que vão ser executados em momentos específicos.

    public static function setUpBeforeClass(): void - Método executado uma vez só, antes de todos os testes da classe
    public function setUp(): void - Método executado antes de cada teste da classe
    public function tearDown(): void - Método executado após cada teste da classe
    public static function tearDownAfterClass(): void - Método executado uma vez só, após todos os testes da classe

Para ter mais detalhes e ver alguns exemplos práticos, você pode conferir a documentação desta feature do PHPUnit.
https://phpunit.readthedocs.io/en/8.5/fixtures.html


###  Para saber mais: TDD

Conhecemos nesta aula o padrão conhecido como TDD (Test Driven Development), ou desenvolvimento guiado a testes.

Esta abordagem pode nos trazer algumas vantagens e vale um estudo mais aprofundado.

Um material sucinto e interessante sobre o assunto pode ser encontrado nesta página da Caelum.

Na casa do código há o livro de TDD com PHP, que aborda o tema com mais detalhes, utilizando especificamente PHP e PHPUnit.


## PHP-oo-heranca-polimorfirmo-interfaces

Como não aprender orientação a objetos: Herança:
https://www.alura.com.br/artigos/como-nao-aprender-orientacao-a-objetos-heranca


Além de conhecer a função de autoload do PHP, acabamos por implementar a PSR-4. Ela dá algumas recomendações para escrevermos autoloaders e você pode conferir em detalhes sobre a PSR-4 no PHP-FIG.
https://www.php-fig.org/psr/psr-4/

Este artigo da Caelum fala justamente sobre isso: 
[Como não aprender orientação a objetos: o excesso de ifs.](https://www.alura.com.br/artigos/como-nao-aprender-orientacao-a-objetos-o-excesso-de-ifs)

