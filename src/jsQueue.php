<?php

namespace MarkHilton\FormFields;

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
class jsQueue
{
	public static $inline  = [];
	public static $scripts = [];


	// push inline javascript into queue
	public static function push($script)
	{
		self::queue('inline', $script);
	}

	// push linked javascript file into queue
	public static function link($script)
	{
		self::queue('scripts', $script);
	}

	// queue helper
	public static function queue($array, $script)
	{
		if (is_array($script))
		{
			foreach ($script as $file)
			{
				if (trim($file)) self::${$array}[] = $file;
			}
		}

		else 
		{
			self::${$array}[] = $script;	
		}

		array_filter(self::${$array});
	}


	// queue render
	public static function render()
	{
		$output = '';

		foreach (self::$scripts as $script)
		{
			$output .= sprintf('<script src="%s%s"></script>', (substr($script, 0, 2) == '//' or substr($script, 0, 4) == 'http') ? '' : \Config::get('formfields.javascript_assets_path'), $script);
		}

		$output .= sprintf('
        <script>
        jQuery(document).ready(function() {
        	%s
        });
        </script>', join("\n", array_filter(self::$inline)));


		return $output;
	}	
}