<?php

namespace App\Livewire;

use Livewire\Component;

class JogoDaVelha extends Component
{
    public array $tabuleiro = ['', '', '', '', '', '', '', '', ''];
    public string $jogadorAtual = 'X';
    public string $vencedor = '';
    public bool $empate = false;

    public function jogar(int $posicao): void
    {
        if ($this->tabuleiro[$posicao] !== '' || $this->vencedor !== '' || $this->empate) {
            return;
        }

        $this->tabuleiro[$posicao] = $this->jogadorAtual;

        if ($this->verificarVencedor()) {
            $this->vencedor = $this->jogadorAtual;
            return;
        }

        if (!in_array('', $this->tabuleiro)) {
            $this->empate = true;
            return;
        }

        $this->jogadorAtual = $this->jogadorAtual === 'X' ? 'O' : 'X';
    }

    public function reiniciar(): void
    {
        $this->tabuleiro = ['', '', '', '', '', '', '', '', ''];
        $this->jogadorAtual = 'X';
        $this->vencedor = '';
        $this->empate = false;
    }

    private function verificarVencedor(): bool
    {
        $combinacoes = [
            [0, 1, 2], [3, 4, 5], [6, 7, 8], // linhas
            [0, 3, 6], [1, 4, 7], [2, 5, 8], // colunas
            [0, 4, 8], [2, 4, 6],             // diagonais
        ];

        foreach ($combinacoes as [$a, $b, $c]) {
            if (
                $this->tabuleiro[$a] !== '' &&
                $this->tabuleiro[$a] === $this->tabuleiro[$b] &&
                $this->tabuleiro[$b] === $this->tabuleiro[$c]
            ) {
                return true;
            }
        }

        return false;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.jogo-da-velha');
    }
}