<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10/28/18
 * Time: 9:49 PM
 */

namespace Classes\Request\Headers;


class AllHeaders extends Headers
{
	public function getHeaders($param = '')
	{
		return $this->_headers;
	}
}