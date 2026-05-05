<?php

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;

test('it gets speakers from the api', function (): void {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'lM4kT@example.com',
    ]);
   $response = $this->get('/api/speakers');

    $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->has(1)
                ->first(fn ($json) =>
                    $json->where('0.name', 'John Doe')
                        ->where('0.email', 'lM4kT@example.com')
                )
        );
});
