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
    		$args['key'] = $field_name;

    		$params = self::validate($args);

    		$form[ $field_name ] = self::render($params);
    	}


    	return $form;
    }

    // validate arguments passed to the template
	public static function validate($args)
	{
		$params['type'] 	 	= isset($args['type'])        ? $args['type']        : 'input';
		$params['label'] 	 	= isset($args['label'])       ? $args['label']       : null;
		$params['value'] 	 	= isset($args['value'])       ? $args['value']       : null;
		$params['default'] 	 	= isset($args['default'])     ? $args['default']     : null;
		$params['maxlength'] 	= isset($args['maxlength'])   ? $args['maxlength']   : null;
		$params['condition'] 	= isset($args['condition'])   ? $args['condition']   : null;
		$params['array']     	= isset($args['array'])       ? $args['array']       : null;
		$params['inline']    	= isset($args['inline'])      ? $args['inline']      : null;
		$params['rows']      	= isset($args['rows'])        ? $args['rows']        : 5;
		$params['placeholder']  = isset($args['placeholder']) ? $args['placeholder'] : '';
		$params['choice']    	= isset($args['choice'])      ? $args['choice']      : [];
		$params['name']      	= isset($args['name'])        ? $args['name']        : $args['key'];
		$params['position']  	= isset($args['position'])    ? $args['position']    : 'side';			// label position
		$params['icon']      	= isset($args['icon'])        ? $args['icon']        : 'calendar';		// classes
		$params['class']     	= isset($args['class'])       ? $args['class']       : '';				// classes
		$params['disabled']  	= (isset($args['disabled']) and $args['disabled'] === true)   ? true                   : false;

		$params['tooltip']   	= (isset($args['tooltip'])  and trim($args['tooltip']) != '') ? trim($args['tooltip']) : null;

		return $params;
	}

    // build HTML from field blade template
	public static function render($arg)
	{
		$attr = [];

		// map attributes applied to input field
		$allowed = [ 'maxlength', 'disabled' ];

		foreach ($arg as $key => $val)
		{
			if (!in_array($key, $allowed)) continue;
			if ($val) $attr[ $key ] = '"'.(string) $val.'"';
		}

		$arg['attr'] = urldecode(http_build_query($attr, '', ' ' ));


		if ($arg['condition']) 
		{
			\JSqueue::push(view('formfields.condition', [ 
				'name'      => $arg['name'],
				'condition' => key($arg['condition']), 
				'value'     => current($arg['condition']), 
			]));
		}

		$arg['failed'] = (array) \Session::get('failed');
		$arg['name']   = $arg['name'].($arg['array'] ? '['.$arg['array'].']' : '');



		/*
		 * render field HTML
		 *
		 */
		$view = \View::make('formfields::scripts')->nest('field', 'formfields.' . $arg['type'], $arg);

    	// read everything queued by Blade @section and paste it into Smarty
		\JSqueue::push( trim(str_replace(['<script>', '</script>'], ['',''], $view)) );


	    return $view['field'];
	}


	/** **/
}










/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param boole $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source http://gravatar.com/site/implement/images/php/
 */
if (! function_exists('get_gravatar')) {
	function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) 
	{
	    $url  = 'http://www.gravatar.com/avatar/';
	    $url .= md5( strtolower( trim( $email ) ) );
	    $url .= "?s=$s&d=$d&r=$r";

	    if ( $img ) 
	    {
	        $url = '<img src="' . $url . '"';

	        foreach ( $atts as $key => $val ) {
	            $url .= ' ' . $key . '="' . $val . '"';
	        }

	        $url .= ' />';
	    }

	    return $url;
	}
}
