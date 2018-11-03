<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 11/3/18
 * Time: 11:10 AM
 */

use PHPUnit\Framework\TestCase;

$loader = require __DIR__.'/../../../vendor/autoload.php';
$loader->addPsr4('Classes\\', __DIR__.'/../../../Classes/');

class ResponseUnitTest extends TestCase
{
	protected $fixture;

	protected function setUp()
	{
		parent::setUp();

		$this->fixture = new \Classes\Response\Response();
	}

	protected function tearDown()
	{
		parent::tearDown();

		$this->fixture = NULL;
	}

	/**
	 * @dataProvider getCodeDataProvider
	 */
	public function testGetCode($set_data, $expected)
	{
		$this->fixture->setCode($set_data);
		$this->assertEquals($expected, $this->fixture->getCode());
	}

	public function getCodeDataProvider()
	{
		return [
			'data_1' => [
				'set_data' => '1234567',
				'expected' => '1234567'
			],
			'data_2' => [
				'set_data' => '',
				'expected' => false
			]
		];
	}

	/**
	 * @dataProvider getCookiesDataProvider
	 */
	public function testGetCookies($set_data, $params, $expected)
	{
		$this->fixture->setCookies($set_data);
		$this->assertEquals($expected, $this->fixture->getCookies($params));
	}

	public function getCookiesDataProvider()
	{
		return [
			'data_1' => [
				'set_data' => [
					'v1' => 'qwertyui',
					'v2' => 'asdfghjk'
				],
				'params' => '',
				'expected' => 'v1=qwertyui&v2=asdfghjk'
			],
			'data_2' => [
				'set_data' => [
					'v1' => 'qwertyui',
					'v2' => 'asdfghjk'
				],
				'params' => 'v1',
				'expected' => 'qwertyui'
			],
			'data_3' => [
				'set_data' => [
					'v1' => 'qwertyui',
					'v2' => 'asdfghjk'
				],
				'params' => 'v3',
				'expected' => false
			],
			'data_4' => [
				'set_data' => '',
				'params' => 'v3',
				'expected' => false
			],
		];
	}

	/**
	 * @dataProvider getHeadersDataProvider
	 */
	public function testGetHeaders($set_data, $params, $expected)
	{
		$this->fixture->setHeaders($set_data);
		$this->assertEquals($expected, $this->fixture->getHeaders($params));
	}

	public function getHeadersDataProvider()
	{
		return [
			'data_1' => [
				'set_data' => [
					'Content-Type' => 'text/html; charset=utf-8',
					'Vary' => 'Accept-Encoding'
				],
				'params' => 'Vary',
				'expected' => 'Accept-Encoding'
			],
			'data_2' => [
				'set_data' => [
					'Content-Type' => 'text/html; charset=utf-8',
					'Vary' => 'Accept-Encoding'
				],
				'params' => 'Content-Length',
				'expected' => false
			],
			'data_3' => [
				'set_data' => NULL,
				'params' => 'Content-Length',
				'expected' => false
			],
		];
	}

	/**
	 * @dataProvider getContentDataProvider
	 */
	public function testGetContent($set_data, $expected)
	{
		$this->fixture->setContent($set_data);
		$this->assertEquals($expected, $this->fixture->getContent());
	}

	public function getContentDataProvider()
	{
		return [
			'data_1' => [
				'set_data' => 'qwerty',
				'expected' => 'qwerty'
			]
		];
	}
}