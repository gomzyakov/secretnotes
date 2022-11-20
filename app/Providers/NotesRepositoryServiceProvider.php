<?php

namespace App\Providers;

use App\Repository\NotesRepository;
use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;

class NotesRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Salt for hashing slug.
     */
    public const HASHIDS_SALT = ''; // TODO Move to secret envs

    /**
     * Minima; lenght of slug.
     */
    public const HASHIDS_MIN_LENGTH = 5;

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(NotesRepository::class, function () {
            $hashids = new Hashids(
                self::HASHIDS_SALT,
                self::HASHIDS_MIN_LENGTH
            );

            return new NotesRepository($hashids);
        });
    }
}
