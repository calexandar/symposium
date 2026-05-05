<?php

use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\ConferenceFavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TalkController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Socialite;

Route::get('/', fn() => view('welcome'));

Route::get('dashboard', function () {
    $conferences = \App\Models\Conference::all();
    return view('dashboard', compact('conferences'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function (): void {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('talks', [TalkController::class, 'index'])->name('talks.index');
    Route::get('talks/create', [TalkController::class, 'create'])->name('talks.create');
    Route::post('talks', [TalkController::class, 'store'])->name('talks.store');
    Route::get('talks/{talk}', [TalkController::class, 'show'])->name('talks.show')->can('view', 'talk');
    Route::get('talks/{talk}/edit', [TalkController::class, 'edit'])->name('talks.edit');
    Route::patch('talks/{talk}', [TalkController::class, 'update'])->name('talks.update');
    Route::delete('talks/{talk}', [TalkController::class, 'destroy'])->name('talks.destroy');

    Route::post('conferences/{conference}/favorite', [ConferenceFavoriteController::class, 'store'])->name('conferences.favorite');
    Route::delete('conferences/{conference}/favorite', [ConferenceFavoriteController::class, 'destroy'])->name('conferences.unfavorite');

});


require __DIR__ . '/auth.php';

Route::get('auth/redirect', fn() => Socialite::driver('github')->redirect());

Route::get('auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/dashboard');
});
