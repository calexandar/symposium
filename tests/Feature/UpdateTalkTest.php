<?php

use App\Enums\TalkType;
use App\Models\Talk;
use App\Models\User;

test('a user can update a talk', function () {
    $talk = Talk::factory()->create();

    $response = $this
        ->actingAs($talk->author)
        ->patch(route('talks.update', $talk), [
            'title' => 'Updated Talk Title',
            'length' => 45,
            'type' => TalkType::KEYNOTE->value,
            'abstract' => 'Updated abstract.',
            'organizer_notes' => 'Updated organizer notes.',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('talks.show', $talk));

    $this->assertEquals($talk->fresh()->title, 'Updated Talk Title');
});

test('a user cannot update a talk that belongs to another user', function () {
    $talk = Talk::factory()->create();
    $originalTItle = $talk->title;

    $otherUser = User::factory()->create();

    $response = $this
        ->actingAs($otherUser)
        ->patch(route('talks.update', $talk), [
            'title' => 'Updated Talk Title',
            'length' => 45,
            'type' => TalkType::KEYNOTE->value,
            'abstract' => 'Updated abstract.',
            'organizer_notes' => 'Updated organizer notes.',
        ]);

    $response
        ->assertForbidden();

    $this->assertEquals($talk->fresh()->title, $originalTItle);
});
