# FormFields #

FormFields is a collection of editable Laravel Blade templates to render bootstrap responsive form HTML content 
for individual fields based on ORM model configuration. 

It also contains a class to queue linked and inline supporting java scripts. 

## Main features ##

- read form fields configurtion directly from ORM models
- render individual HTML content for form fields
- support for required javascripts included in form fields template
- support for Laravel Blade template engine

## Usage ##
/**
 * Queue for linked and inline javascripts
 *
 * USAGE: 
 *   - inline scripts: JSqueue::push('[javascript code]');
 *   - linked scripts: JSqueue::link('[javascript file]');
 * 
 * TEMPLATE: 
 * add {{ JSqueue::render() }} call
 * in template header or footer in order to render queued javascripts
 *
 */


 /**
 * Form fields builder
 *
 * USAGE: 
 *   1. Define $form property in ORM model
 *   2. Build HTML form fields with \FormBuilder::build(ORM_MODEL::$form);
 *   3. Render form field in the template wiht {{ $form.field_name }}
 *
 */
