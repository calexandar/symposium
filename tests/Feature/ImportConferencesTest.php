<?php

use App\Console\Commands\ImportConferences;
use App\Models\Conference;

test('it imports conferences', function () {
    $command = new ImportConferences;

    $data = [
            'name' => 'Test Conference',
            'url' => 'https://example.com',
            'start_date' => '2024-01-01',
            'end_date' => '2024-01-02',
            '_rel' => [
                'cfp_uri' => 'test-conference',
            ],
    ];

    $response = $command->importOrUpdateConferences($data);

    $firstConference = \App\Models\Conference::first();
    expect($firstConference->external_id)->toBe('test-conference');
});

test('it updates conferences', function () {
    $command = new ImportConferences;

    Conference::create([
        'external_id' => 'test-conference',
        'title' => 'Old Title',
    ]);

    $data = [
            'name' => 'Test Conference',
            'url' => 'https://example.com',
            'start_date' => '2024-01-01',
            'end_date' => '2024-01-02',
            '_rel' => [
                'cfp_uri' => 'test-conference',
            ],
    ];

    $response = $command->importOrUpdateConferences($data);

    $firstConference = \App\Models\Conference::first();
    expect($firstConference->external_id)->toBe('test-conference');
    expect($firstConference->title)->toBe('Test Conference');
});
