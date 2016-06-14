# FormFields #

FormFields is a collection of editable Laravel Blade templates to render bootstrap responsive form HTML content 
for individual fields based on ORM model configuration. 

It also contains a class to queue linked and inline supporting java scripts. 



## Main features ##

- read form fields configurtion directly from ORM models
- render individual HTML content for form fields
- support for required javascripts included in form fields template
- support for Laravel Blade template engine



## Setup ##

Add to your config/app.php

'providers' => [
	...
    MarkHilton\FormFields\FormFieldsServiceProvider::class,
],

'aliases' => [
	...
    'jsQueue'     => MarkHilton\FormFields\jsQueue::class,
    'FormBuilder' => MarkHilton\FormFields\FormBuilder::class,
],

inside app root folder copy config file:

cp vendors/markhilton/formfields/config/formfields.php to configs/formfields.php



### Model ###

class Your_Model_Name extends Model
{
    public static $errors = [];

    // ... //

    // HTML form builder definitions
    public static $form = [
        'name' => [ 
            'type'         => 'input',
            'label'        => 'Label name',
            'position'     => 'top',
        ],

        'status'           => [ 
            'type'         => 'select',
            'label'        => 'Status',
            'position'     => 'side',
            'choice'       => [
              'active'   => 'Active',
              'pending'  => 'Pending',
              'suspended'=> 'Suspended',
            ],
            'default'      => 'active',
        ],

    // ... //



### Controller ###

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Your_Model_Name;
use Illuminate\Http\Request;

class SiteController extends Controller {

    public function create(Request $request)
    {
        $form = \FormBuilder::build(Your_Model_Name::$form, $request->old() ? $request->old() : []),

        return view('layout', $form);

    // ... //



### View ###

<div class="row">
    {{ $status }}

    {{ $name }}
</div>



### HTML output ###

<div class="row">
    <div>
        <select id="field-status" class="width100p" name="status" data-placeholder="">
            <option selected="selected" value="active">Active</option>
            <option value="pending">Pending</option>
            <option value="suspended">Suspended</option>
        </select>
    </div>

    <div class="form-group">
        <label class=" control-label">Name</label>
        <div>
            <input type="text" name="name" value="" class="form-control" />
        </div>
    </div>
</div>



## Usage ##

Queue for linked and inline javascripts inside view template

CONTROLLER: 
  - JSqueue::push('[javascript code]'); - push javascripts code to the queue
  - JSqueue::link('[javascript file]'); - add linked javascripts files

TEMPLATE: 

add {{ JSqueue::render() }} call
in template header or footer in order to render queued javascripts


USAGE: 
  1. Define $form property in ORM model
  2. Assign HTML form fields output from \FormBuilder::build(ORM_MODEL::$form);
  3. Render form field in the template with {{ $field_name }}

