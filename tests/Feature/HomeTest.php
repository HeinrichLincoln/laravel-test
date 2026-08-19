<?php

use App\Models\User;

test('home redireciona para login se não autenticado', function () {
    $response = $this->get('/home');

    $response->assertRedirect('/login');
});

test('home carrega para usuário autenticado', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/home');

    $response->assertStatus(200);
});

test('home exibe lista de jogos', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/home');

    $response->assertSee('Jogo da Velha');
    $response->assertSee('Jogo da Memória');
});