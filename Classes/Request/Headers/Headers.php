<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10/28/18
 * Time: 9:04 PM
 */

namespace Classes\Request\Headers;

abstract class Headers
{
	protected $_headers;

	public function __construct($server)
	{
		foreach ($server as $key=>$value)
		{
			if (strpos($key, 'HTTP_') === 0)
			{
				$headerName = str_replace('HTTP_', '', $key);
				$this->_headers[strtolower($headerName)] = $value;
			}
		}
	}

	abstract public function getHeaders($param = '');
}