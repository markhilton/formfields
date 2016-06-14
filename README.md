# FormFields

FormFields is a collection of editable Laravel Blade views to render bootstrap responsive HTML content 
for individual form fields. The form configuration is fetched from ORM model. 

It also contains a class to queue linked and inline supporting javascripts. 



## Main features

- read form fields configurtion directly from ORM models
- render individual HTML content for form fields
- support for required javascripts included in form fields template
- support for Laravel Blade template engine



## Setup

Add to your **config/app.php**

```php
'providers' => [
	...
    MarkHilton\FormFields\FormFieldsServiceProvider::class,
],

'aliases' => [
	...
    'jsQueue'     => MarkHilton\FormFields\jsQueue::class,
    'FormBuilder' => MarkHilton\FormFields\FormBuilder::class,
],
```

inside app root folder copy config file:

```bash
cp vendors/markhilton/formfields/config/formfields.php configs/formfields.php
```


### Model

```php
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
```


### Controller

```php
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
```



### View
```html
<div class="row">
    {{ $status }}

    {{ $name }}
</div>
```


### HTML output

```html
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
```


## Usage

Queue for linked and inline javascripts inside view template


### Controller
  - **JSqueue::push('[javascript code]');** to push javascripts code to the queue
  - **JSqueue::link('[javascript file]');** to add linked javascripts files


### View

add **{{ JSqueue::render() }}** call
in template header or footer in order to render queued javascripts


### How to steps
  1. Define $form property in ORM model
  2. Assign HTML form fields output from \FormBuilder::build(ORM_MODEL::$form);
  3. Render form field in the template with {{ $field_name }}

