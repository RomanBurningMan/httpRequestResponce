<?php
/**
 * Created by PhpStorm.
 * User: r.kushnir
 * Date: 11/1/18
 * Time: 10:28 PM
 */

use PHPUnit\Framework\TestCase;

$loader = require __DIR__.'/../../../vendor/autoload.php';
$loader->addPsr4('Classes\\', __DIR__.'/../../../Classes/');

class RequestUnitTest extends TestCase
{
	/**
	 * @dataProvider getRequestMethodDataProvider
	 */
	public function testGetRequestMethod($server, $expected)
	{
		$instance = new Classes\Request\Request($server);

		$this->assertEquals($expected, $instance->getRequestMethod());
	}

	public function getRequestMethodDataProvider()
	{
		return [
			'test_case_0' => [
				'server' => [
					'REQUEST_METHOD' => 'GET',
					'LC_ALL' => 'C.UTF-8',
					'LANG' => 'C.UTF-8'
				],
				'expected' => 'GET'
			],
			'test_case_1' => [
				'server' => [
					'LC_ALL' => 'C.UTF-8',
					'LANG' => 'C.UTF-8'
				],
				'expected' => false
			]
		];
	}

	/**
	 * @dataProvider getHeadersDataProvider
	 */
	public function testGetHeaders($server, $needed_header, $expected)
	{
		$instance = new Classes\Request\Request($server);

		$this->assertEquals($expected, $instance->getHeaders($needed_header));
	}

	public function getHeadersDataProvider()
	{
		return [
			'test_case_0' => [
				'server' => [
					'REQUEST_METHOD' => 'GET',
					'LC_ALL' => 'C.UTF-8',
					'HTTP_ACCEPT_LANGUAGE' => 'uk-UA,uk;q=0.9,ru;q=0.8,en-US;q=0.7,en;q=0.6',
					'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, br'
				],
				'needed_header' => '',
				'expected' => [
					'accept_language' => 'uk-UA,uk;q=0.9,ru;q=0.8,en-US;q=0.7,en;q=0.6',
					'accept_encoding' => 'gzip, deflate, br'
				]
			],
			'test_case_1' => [
				'server' => [
					'REQUEST_METHOD' => 'GET',
					'LC_ALL' => 'C.UTF-8',
					'HTTP_ACCEPT_LANGUAGE' => 'uk-UA,uk;q=0.9,ru;q=0.8,en-US;q=0.7,en;q=0.6',
					'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, br'
				],
				'needed_header' => 'accept_encoding',
				'expected' => [
					'accept_encoding' => 'gzip, deflate, br'
				]
			],
			'test_case_2' => [
				'server' => [
					'REQUEST_METHOD' => 'GET',
					'LC_ALL' => 'C.UTF-8',
					'HTTP_ACCEPT_LANGUAGE' => 'uk-UA,uk;q=0.9,ru;q=0.8,en-US;q=0.7,en;q=0.6'
				],
				'needed_header' => 'accept_encoding',
				'expected' => false
			]
		];
	}

	/**
	 * @dataProvider getCookiesDataProvider
	 */
	public function testGetCookies($server, $needed_cookies, $expected)
	{
		$instance = new Classes\Request\Request($server);

		$this->assertEquals($expected, $instance->getCookies($needed_cookies));
	}

	public function getCookiesDataProvider()
	{
		return [
			'test_case_0' => [
				'server' => [
					'REQUEST_METHOD' => 'GET',
					'LC_ALL' => 'C.UTF-8',
					'HTTP_COOKIE' => 'value=1321321231; new=32132132',
					'HTTP_ACCEPT_LANGUAGE' => 'uk-UA,uk;q=0.9,ru;q=0.8,en-US;q=0.7,en;q=0.6',
					'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, br'
				],
				'needed_cookies' => '',
				'expected' => [
					'value' => '1321321231',
					'new' => '32132132'
				]
			],
			'test_case_1' => [
				'server' => [
					'REQUEST_METHOD' => 'GET',
					'LC_ALL' => 'C.UTF-8',
					'HTTP_COOKIE' => 'value=1321321231; new=32132132',
					'HTTP_ACCEPT_LANGUAGE' => 'uk-UA,uk;q=0.9,ru;q=0.8,en-US;q=0.7,en;q=0.6',
					'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, br'
				],
				'needed_cookies' => 'value',
				'expected' => '1321321231'
			],
			'test_case_2' => [
				'server' => [
					'REQUEST_METHOD' => 'GET',
					'LC_ALL' => 'C.UTF-8',
					'HTTP_COOKIE' => 'new=32132132',
					'HTTP_ACCEPT_LANGUAGE' => 'uk-UA,uk;q=0.9,ru;q=0.8,en-US;q=0.7,en;q=0.6',
					'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, br'
				],
				'needed_cookies' => 'value',
				'expected' => false
			]
		];
	}

	/**
	 * @dataProvider getParamsDataProvider
	 */
	public function testGetParams($server, $type, $expected)
	{
		$instance = new Classes\Request\Request($server);

		$this->assertEquals($expected, $instance->getParams($type));
	}

	public function getParamsDataProvider()
	{
		return [
			'test_case_0' => [
				'server' => [
					'REQUEST_METHOD' => 'GET',
					'LC_ALL' => 'C.UTF-8',
					'argv' => ['v1=1&v2=2']
				],
				'type' => 'GET',
				'expected' => [
					'v1' => '1',
					'v2' => '2'
				]
			],
			'test_case_1' => [
				'server' => [
					'REQUEST_METHOD' => 'GET',
					'LC_ALL' => 'C.UTF-8',
					'argv' => ['v1=1&v2=2']
				],
				'type' => '',
				'expected' => false
			],
			'test_case_2' => [
				'server' => [
					'REQUEST_METHOD' => 'GET',
					'LC_ALL' => 'C.UTF-8',
					'argv' => ['v1=1&v2=2']
				],
				'type' => 'PUT',
				'expected' => false
			],
		];
	}
}