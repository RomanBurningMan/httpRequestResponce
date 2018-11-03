<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 10/31/18
 * Time: 10:46 PM
 */

namespace Classes\Response;

class Response
{
	const ALLOWED_METHODS = ['get', 'set'];

	private $_objects;

	public function __call($name, array $params)
	{
		$methodType = '';
		$class = '';

		foreach (self::ALLOWED_METHODS as $value)
		{
			preg_match('/(^'.$value.')(.*)/', $name, $matches);

			if (isset($matches[2]))
			{
				$methodType = strtolower($matches[1]);
				$class = $matches[2];
			}
		}

		// возврат - если что-то не выбралось
		if (empty($methodType) || empty($class)) return false;

		$fullClassName = "Classes\\Response\\$class";

		// запись необходимого объекта и выполнение необходимого метода
		if (class_exists($fullClassName))
		{
			$interfaces = class_implements($fullClassName);

			if (!isset($interfaces['Classes\Response\ComponentInterface'])) return false;
			echo "<pre>";
			print_r($interfaces);
			echo "</pre>";
			

			// Создание класса или возврат из массива
			if (isset($this->_objects[$class]))
			{
				$currentObject = $this->_objects[$class];
			}
			else
			{
				$currentObject = $this->_objects[$class] = (new $fullClassName());
			}

			// GET
			if ($methodType === self::ALLOWED_METHODS[0])
			{
				return $currentObject->getComponent($params[0]);
			}
			// SET
			else if($methodType === self::ALLOWED_METHODS[1])
			{
				$currentObject->setComponent($params[0]);

				return true;
			}
		}

		return false;
	}
}