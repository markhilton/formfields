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
#		$this->app->package('markhilton/formfields', null, __DIR__);
        // $this->app->alias('MarkHilton\FormFields\jsQueue',    'jsQueue');
        // $this->app->alias('MarkHilton\FormFields\FormFields', 'FormFields');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
	    $this->app->alias('jsQueue', 	 'MarkHilton\FormFields\jsQueue');
	    $this->app->alias('FormBuilder', 'MarkHilton\FormFields\FormBuilder');

        // $this->app->alias('MarkHilton\FormFields\jsQueue',    'jsQueue');
        // $this->app->alias('MarkHilton\FormFields\FormFields', 'FormFields');
    }
}