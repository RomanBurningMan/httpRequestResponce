<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 11/1/18
 * Time: 9:47 PM
 */

namespace Classes\Response;


class Content implements ComponentInterface
{
	private $_content;

	public function getComponent($params = '')
	{
		return $this->_content;
	}

	public function setComponent($params)
	{
		$this->_content = $params;
	}
}