<?php

use App\Console\Commands\ImportConferences;
use App\Models\Conference;

test('it imports conferences', function (): void {
    $command = new ImportConferences;

    $data = [
        'name' => 'Test Conference',
        'uri' => 'https://example.com',
        'dateCfpStart' => '2024-01-01',
        'dateCfpEnd' => '2024-01-02',
        '_rel' => [
            'cfp_uri' => 'test-conference',
        ],
    ];

    $response = $command->importOrUpdateConferences($data);

    $firstConference = Conference::first();
    expect($firstConference->external_id)->toBe('test-conference');
});

test('it updates conferences', function (): void {
    $command = new ImportConferences;

    Conference::create([
        'external_id' => 'test-conference',
        'title' => 'Old Title',
    ]);

    $data = [
        'name' => 'Test Conference',
        'uri' => 'https://example.com',
        'dateCfpStart' => '2024-01-01',
        'dateCfpEnd' => '2024-01-02',
        '_rel' => [
            'cfp_uri' => 'test-conference',
        ],
    ];

    $response = $command->importOrUpdateConferences($data);

    $firstConference = Conference::first();
    expect($firstConference->external_id)->toBe('test-conference');
    expect($firstConference->title)->toBe('Test Conference');
});
