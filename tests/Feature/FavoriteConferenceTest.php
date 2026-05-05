<?php

use App\Models\Conference;
use App\Models\User;

test('it favorite a conference', function (): void {
    $conference = Conference::factory()->create();
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post(route('conferences.favorite', $conference));

    $this->assertTrue($user->favoriteConferences()->where('conference_id', $conference->id)->exists());
});

test('it unfavorite a conference', function (): void {
    $conference = Conference::factory()->create();
    $user = User::factory()->create();

    $user->favoriteConferences()->attach($conference);

    $response = $this
        ->actingAs($user)
        ->delete(route('conferences.unfavorite', $conference));

    $this->assertCount(0, $user->favoriteConferences()->where('conference_id', $conference->id)->get());   
    $this->assertFalse($user->favoriteConferences()->where('conference_id', $conference->id)->exists());
});
