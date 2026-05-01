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
