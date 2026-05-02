<?php

namespace App\Models;

use Database\Factories\ConferenceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conference extends Model
{
    /** @use HasFactory<ConferenceFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function favoritedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
