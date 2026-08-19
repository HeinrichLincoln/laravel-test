<?php

use App\Models\User;

test('a página de login carrega', function () {
    $response = $this->get('/login');
    $response->assertStatus(200);
});

test('usuário consegue fazer login', function () {
    $user = User::factory()->create();
    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);
    $response->assertRedirect('/home');
    $this->assertAuthenticatedAs($user);
});

test('login falha com senha errada', function () {
    $user = User::factory()->create();
    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'senha-errada',
    ]);
    $response->assertSessionHasErrors();
    $this->assertGuest();
});