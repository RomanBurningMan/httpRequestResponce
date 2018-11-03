<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 11/1/18
 * Time: 9:27 PM
 */

namespace Classes\Response;


class Cookies implements ComponentInterface
{
	private $_cookies;

	public function getComponent($params = '')
	{
		if (empty($params))
		{
			return $this->_cookies;
		}
		
		if (empty($this->_cookies)) return '';

		$unserializedCookies = [];

		$explodeCookies = explode('&', $this->_cookies);

		foreach ($explodeCookies as $value)
		{
			$explodeCookie = explode('=', $value);

			$unserializedCookies[$explodeCookie[0]] = $explodeCookie[1];
		}

		if (isset($unserializedCookies[$params]))
		{
			return $unserializedCookies[$params];
		}

		return false;
	}

	public function setComponent($params)
	{
		if (!is_array($params) || empty($params)) return false;

		foreach ($params as $key=>$value)
		{
			if (empty($this->_cookies))
			{
				$this->_cookies .= "$key=$value";
			}
			else
			{
				$this->_cookies .= "&$key=$value";
			}
		}
	}
}