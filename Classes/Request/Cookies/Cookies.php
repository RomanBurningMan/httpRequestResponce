<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10/31/18
 * Time: 8:56 AM
 */

namespace Classes\Request\Cookies;


abstract class Cookies
{
	protected $_cookies;

	public function __construct($server)
	{
		if (empty($server['HTTP_COOKIE'])) return false;

		$cookies = explode(';', $server['HTTP_COOKIE']);
		$formatCookies = [];

		foreach ($cookies as $value)
		{
			$cookie = trim($value);
			$cookie = explode('=', $cookie);

			$formatCookies[$cookie[0]] = $cookie[1];
		}

		$this->_cookies = $formatCookies;
	}

	abstract public function getCookies($param = '');
}