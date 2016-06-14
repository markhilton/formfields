<?php

namespace MarkHilton\FormFields;

use Illuminate\Support\ServiceProvider;

class FormFieldsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->alias('MarkHilton\FormFields\FormFields', 'FormFields');
    }
}