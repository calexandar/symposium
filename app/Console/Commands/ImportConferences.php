<?php

namespace App\Console\Commands;

use App\Models\Conference;
use App\Services\CallingAllPapers;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('conferences:import')]
#[Description('Import conferences from Calling All Papers')]
class ImportConferences extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(CallingAllPapers $cfps): void
    {
        foreach ($cfps->conferences()['cfps'] as $conference) {
            $this->importOrUpdateConference($conference);
        }
    }

    public function importOrUpdateConferences(array $conference)
    {
        Conference::updateOrCreate([
            'external_id' => $conference['_rel']['cfp_uri'],
        ], [
            'title' => $conference['name'],
            'url' => $conference['url'],
            'cfp_starts_at' => $conference['start_date'],
            'cfp_ends_at' => $conference['end_date'],
        ]);
    }
}
