<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10/31/18
 * Time: 10:31 AM
 */

namespace Classes\Request\Params;


class MethodGet implements ParamsInterface
{
	private $_server;
	private $_params;

	public function __construct($server)
	{
		$this->_server = $server;
	}

	public function getParams()
	{
		$params = $this->_server['argv'];

		if (empty($params)) return false;

		$params = explode('&', $params[0]);

		foreach ($params as $value)
		{
			$param = explode('=', $value);

			$this->_params[$param[0]] = $param[1];
		}

		return $this->_params;
	}
}