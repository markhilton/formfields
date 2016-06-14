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
        $this->loadViewsFrom(__DIR__  .'/views',  'FormFields');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
	    $this->app->alias('jsQueue', 	 'MarkHilton\FormFields\jsQueue');
	    $this->app->alias('FormBuilder', 'MarkHilton\FormFields\FormBuilder');
    }
}