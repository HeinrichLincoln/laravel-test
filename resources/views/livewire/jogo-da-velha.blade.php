<div>
    @if($vencedor)
        <p>{{ $vencedor }} venceu!</p>
    @elseif($empate)
        <p>Empate!</p>
    @else
        <p>Vez do jogador: {{ $jogadorAtual }}</p>
    @endif

    <div style="display: grid; grid-template-columns: repeat(3, 60px);">
        @foreach($tabuleiro as $index => $celula)
            <button
                wire:click="jogar({{ $index }})"
                wire:loading.attr="disabled"
                style="width:60px;height:60px;font-size:24px;"
            >
                {{ $celula }}
            </button>
        @endforeach
    </div>

    <button wire:click="reiniciar" wire:loading.attr="disabled">Reiniciar</button>
</div>