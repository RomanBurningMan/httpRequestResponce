<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10/31/18
 * Time: 9:36 AM
 */

namespace Classes\Request\Cookies;


class OneCookie extends Cookies
{
	public function getCookies($param = '')
	{
		if (!empty($this->_cookies[$param]))
		{
			return $this->_cookies[$param];
		}

		return false;
	}
}