<?php

use App\Models\User;

test('usuário consegue fazer logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $response->assertRedirect('/login');
});

test('usuário não autenticado não consegue fazer logout', function () {
    $response = $this->post('/logout');

    $response->assertRedirect('/login');
});