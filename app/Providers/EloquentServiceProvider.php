<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Relations\Relation;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'article' => \App\Models\Article\Article::class,
            'institution' => \App\Models\Institution\Institution::class,
            'specialty' => \App\Models\Specialty\Specialty::class,
            'profession' => \App\Models\Profession\Profession::class,
            'subject' => \App\Models\Subject\Subject::class,

            'media' => \App\Models\Media\Media::class,
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
