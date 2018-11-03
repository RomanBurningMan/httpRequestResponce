<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10/31/18
 * Time: 10:51 PM
 */

namespace Classes\Response;


class Code implements ComponentInterface
{
	private $_code;

	public function getComponent($params = '')
	{
		return $this->_code;
	}

	public function setComponent($params)
	{
		$params = intval($params);

		$this->_code = $params;
	}
}