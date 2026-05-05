<?php

use App\Enums\TalkType;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;

test('a user can create a talk', function (): void {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post(route('talks.store'), [
            'title' => $title = fake()->sentence(),
            'length' => 30,
            'type' => TalkType::KEYNOTE->value,
            'abstract' => 'This is the abstract of my first talk.',
            'organizer_notes' => 'These are some notes for the organizers.',
        ]);

    $response->assertRedirect(route('talks.index'));
    assertDatabaseHas('talks', [
        'title' => $title,
    ]);
});
