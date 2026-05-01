<?php

use App\Models\Talk;
use App\Models\User;

test('it lists all talks on the listing page', function () {
    $user = User::factory()
        ->has(Talk::factory()->count(5))
        ->create();

    $otherUsersTalk = Talk::factory()->create();
    $response = $this
        ->actingAs($user)
        ->get(route('talks.index'))
        ->assertSee($user->talks()->first()->title)
        ->assertDontSee($otherUsersTalk->title);

    $response->assertStatus(200);
});

test('it shows basic talk information on the listing page', function () {
    $user = User::factory()
        ->has(Talk::factory()->count(5))
        ->create();

    $response = $this
        ->actingAs($user)
        ->get(route('talks.show', $user->talks()->first()))
        ->assertSee($user->talks()->first()->title)
        ->assertSee($user->talks()->first()->length)
        ->assertSee($user->talks()->first()->type);

    $response->assertStatus(200);
});

test('users cant see the talk sho page for others', function () {
    $user = User::factory()
        ->has(Talk::factory()->count(5))
        ->create();

    $otherUsersTalk = Talk::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('talks.show', $otherUsersTalk))
        ->assertStatus(403);
});
