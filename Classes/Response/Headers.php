<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10/31/18
 * Time: 10:57 PM
 */

namespace Classes\Response;


class Headers implements ComponentInterface
{
	private $_headers;

	public function getComponent($params = '')
	{
		if (empty($params))
		{
			return $this->_headers;
		}

		if (empty($this->_headers)) return '';

		if (isset($this->_headers[$params]))
		{
			return $this->_headers[$params];
		}

		return false;
	}

	public function setComponent($params)
	{
		if (!is_array($params) || empty($params)) return false;

		foreach ($params as $key=>$value)
		{
			$this->_headers[$key] = $value;
		}
	}
}