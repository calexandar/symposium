<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CallingAllPapers
{
    protected $baseUrl = 'https://api.callingallpapers.com/v1/cfp';

    public function conferences(): array
    {
        return Http::get($this->baseUrl)->json();
    }
}
