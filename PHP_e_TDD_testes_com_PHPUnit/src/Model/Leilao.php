<?php

namespace Alura\Leilao\Model;

class Leilao
{
    /** @var Lance[] */
    private $lances;
    /** @var string */
    private $descricao;
    /** @var bool */
    private $finalizado;

    public function __construct(string $descricao)
    {
        $this->descricao = $descricao;
        $this->lances = [];
        $this->finalizado = false;
    }

    public function recebeLance(Lance $lance)
    {
        if (!empty($this->lances) && $this->ehDoUltimoUsuario($lance)) {
            throw new \DomainException("Um usuario não pode propor 2 lances consecutivos");
            
        }
        
        $totalLancesUsuario = $this->quantidadeLancesUsuario($lance->getUsuario());
        if ($totalLancesUsuario >=5) {
            throw new \DomainException('Usuário não pode propor mais de que 5 lances por leião');
        }

        $this->lances[] = $lance;
    }

    /**
     * @return Lance[]
     */
    public function getLances(): array
    {
        return $this->lances;
    }

    public function finaliza() {
        $this->finalizado = true;
    }


    public function estaFinalizado() : bool {
        return $this->finalizado;
    }

    private function ehDoUltimoUsuario($lance) {
        $ultimoLance = $this->lances[count($this->lances) - 1];
        return $lance->getUsuario() == $ultimoLance->getUsuario();
    }

    private function quantidadeLancesUsuario(Usuario $usuario) {
        return array_reduce(
            $this->lances, 
            function (int $totalAcumulado, Lance $lanceAtual ) use ($usuario) {
                if ($lanceAtual->getUsuario() == $usuario) {
                    return $totalAcumulado + 1;
                }
                return $totalAcumulado;
            },
            0
        );
    }
}
