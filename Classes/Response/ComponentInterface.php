<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10/31/18
 * Time: 10:52 PM
 */

namespace Classes\Response;


interface ComponentInterface
{
	public function getComponent($params = '');

	public function setComponent($params);
}