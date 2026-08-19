<?php

use App\Livewire\JogoDaVelha;
use Livewire\Livewire;
use App\Models\User;

test('página do jogo da velha carrega', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/jogo-da-velha');

    $response->assertStatus(200);
});

test('jogador consegue fazer uma jogada', function () {
    Livewire::test(JogoDaVelha::class)
        ->call('jogar', 0)
        ->assertSee('X');
});

test('jogadores alternam entre X e O', function () {
    Livewire::test(JogoDaVelha::class)
        ->call('jogar', 0)
        ->call('jogar', 1)
        ->assertSee('O');
});

test('jogo detecta vencedor', function () {
    Livewire::test(JogoDaVelha::class)
        ->call('jogar', 0) // X
        ->call('jogar', 3) // O
        ->call('jogar', 1) // X
        ->call('jogar', 4) // O
        ->call('jogar', 2) // X vence linha 0,1,2
        ->assertSee('X venceu!');
});

test('jogo detecta empate', function () {
    Livewire::test(JogoDaVelha::class)
        ->call('jogar', 0) // X
        ->call('jogar', 1) // O
        ->call('jogar', 2) // X
        ->call('jogar', 4) // O
        ->call('jogar', 3) // X
        ->call('jogar', 5) // O
        ->call('jogar', 7) // X
        ->call('jogar', 6) // O
        ->call('jogar', 8) // X — empate
        ->assertSee('Empate!');
});

test('jogo pode ser reiniciado', function () {
    Livewire::test(JogoDaVelha::class)
        ->call('jogar', 0)
        ->call('reiniciar')
        ->assertSet('tabuleiro', ['', '', '', '', '', '', '', '', '']);
});