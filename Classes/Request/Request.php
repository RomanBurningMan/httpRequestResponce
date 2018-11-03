<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10/28/18
 * Time: 8:13 PM
 */

namespace Classes\Request;

class Request
{
	private $_server;

	public function __construct($server)
	{
		$this->_server = $server;
	}

	public function getRequestMethod()
	{
		return $this->_server['REQUEST_METHOD'];
	}

	public function getHeaders($name = '')
	{
		if (!empty($name))
		{
			$headersObj = new Headers\OneHeader($this->_server);
		}
		else
		{
			$headersObj = new Headers\AllHeaders($this->_server);
		}

		return $headersObj->getHeaders($name);
	}

	public function getCookies($name = '')
	{
		if (!empty($name))
		{
			$cookiesObj = new Cookies\OneCookie($this->_server);
		}
		else
		{
			$cookiesObj = new Cookies\AllCookies($this->_server);
		}

		return $cookiesObj->getCookies($name);
	}

	public function getParams($type = 'GET')
	{
		if (empty($type)) return false;

		$type = ucfirst(strtolower($type));
		$className = "Classes\Request\Params\Method$type";

		if (class_exists($className))
		{
			return (new $className($this->_server))->getParams();
		}
		
		return false;
	}
}