<?php

use Illuminate\Testing\Fluent\AssertableJson;

test('it gets speakers from the api', function () {
   $response = $this->get('/api/speakers');

    $response
        ->assertJson(fn (AssertableJson $json) =>
            $json->has(3)
                ->first(fn ($json) =>
                    $json->where('name', 'John Doe')
                        ->where('email', 'lM4kT@example.com')
                )
        );
});
