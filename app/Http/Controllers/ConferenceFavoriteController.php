<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConferenceFavoriteController extends Controller
{
       public function store(Conference $conference)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->favoriteConferences()->where('conference_id', $conference->id)->exists()) {
            $user->favoriteConferences()->detach($conference);
        } else {
            $user->favoriteConferences()->attach($conference);
        }

    }

    public function destroy(Conference $conference)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->favoriteConferences()->where('conference_id', $conference->id)->exists()) {
            $user->favoriteConferences()->detach($conference);
        } else {
            $user->favoriteConferences()->attach($conference);
        }

    }
}
