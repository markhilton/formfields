<?php

namespace MarkHilton\FormFields;

/**
 * Form fields builder
 *
 * USAGE: 
 *   1. Define $form property in ORM model
 *   2. Build HTML form fields with \FormBuilder::build(ORM_MODEL::$form);
 *   3. Render form field in the template wiht {{ $form.field_name }}
 *
 */
class FormBuilder
{
	// build an array of fields containing rendered field HTML
	public static function build($fields, $data = array())
    {
    	$form = [];

    	foreach ($fields as $field_name => $args) 
    	{
    		$args['key']   = isset($args['name']) ? $args['name'] : $field_name;
    		$args['value'] = isset($data[ $args['key'] ]) ? $data[ $args['key'] ] : null;

    		$params = self::validate($args);

    		$form[ $field_name ] = self::render($params);
    	}


    	return $form;
    }

    // validate arguments passed to the template
	public static function validate($args)
	{
		$params['type'] 	 	= isset($args['type'])        ? $args['type']          : 'input';
		$params['label'] 	 	= isset($args['label'])       ? $args['label']         : null;
		$params['value'] 	 	= isset($args['value'])       ? $args['value']         : (isset($args['default']) ? $args['default'] : null);
		$params['default'] 	 	= isset($args['default'])     ? $args['default']       : null;
		$params['maxlength'] 	= isset($args['maxlength'])   ? $args['maxlength']     : null;
		$params['condition'] 	= isset($args['condition'])   ? $args['condition']     : null;
		$params['array']     	= isset($args['array'])       ? '['.$args['array'].']' : '';
		$params['inline']    	= isset($args['inline'])      ? $args['inline']        : null;
		$params['rows']      	= isset($args['rows'])        ? $args['rows']          : 5;
		$params['placeholder']  = isset($args['placeholder']) ? $args['placeholder']   : '';
		$params['choice']    	= isset($args['choice'])      ? $args['choice']        : [];
		$params['name']      	= isset($args['name'])        ? $args['name']          : $args['key'];
		$params['position']  	= isset($args['position'])    ? $args['position']      : 'side';		// label position
		$params['left']      	= isset($args['left'])        ? $args['left']          : null;			// classes
		$params['right']      	= isset($args['right'])       ? $args['right']         : null;			// classes
		$params['mask']      	= isset($args['mask'])         ? $args['mask']         : null;			// classes
		$params['class']     	= isset($args['class'])       ? $args['class']         : '';			// classes

		// extra attributes
		$params['disabled']  	= (isset($args['disabled']) and $args['disabled'] != false)   ? "true" : "false";
		$params['readonly']  	= (isset($args['readonly']) and $args['readonly'] != false)   ? "true" : "false";

		$params['tooltip']   	= (isset($args['tooltip'])  and trim($args['tooltip']) != '') ? trim($args['tooltip']) : null;


		return $params;
	}

    // build HTML from field blade template
	public static function render($arg)
	{
		$attr = [];

		// map attributes applied to input field
		$allowed = [ 'maxlength', 'disabled', 'readonly' ];

		foreach ($arg as $key => $val)
		{
			if (!in_array($key, $allowed) or $val == "false") continue;

			if ($val) $attr[ $key ] = '"'.(string) $val.'"';
		}

		$arg['attr'] = urldecode(http_build_query($attr, '', ' ' ));


		if ($arg['condition']) 
		{
			\jsQueue::push(\View::make('FormFields::condition', [ 
				'name'      => $arg['name'],
				'condition' => key($arg['condition']), 
				'value'     => current($arg['condition']), 
			]));
		}


		// multipe selection
		if (in_array($arg['type'], [ 'checkbox' ]))
		{
			$arg['array'] = $arg['array'] ? '[' . $arg['array'] . ']' : '[]';
		}


		$arg['failed'] = (array) \Session::get('failed');


		/*
		 * render field HTML
		 *
		 */
		if (view()->exists('vendor.markhilton.formfields.'.$arg['type'])) {
			$view = \View::make('FormFields::scripts')->nest('field', 'vendor.markhilton.formfields.'.$arg['type'], $arg);
		} else {
			$view = \View::make('FormFields::scripts')->nest('field', 'FormFields::'.$arg['type'], $arg);	
		}

    	// read everything queued by Blade @section and paste it into Smarty
		\jsQueue::push( trim(str_replace(['<script>', '</script>'], ['',''], $view)) );


	    return $view['field'];
	}


	/** **/
}
