<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10/28/18
 * Time: 9:32 PM
 */

namespace Classes\Request\Headers;


class OneHeader extends Headers
{
	public function getHeaders($param = '')
	{
		$param = strtolower($param);

		if (!empty($this->_headers[$param]))
		{
			return [$param => $this->_headers[$param]];
		}

		return false;
	}
}