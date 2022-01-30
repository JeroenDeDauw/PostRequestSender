<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender\Tests;

use Jeroen\PostRequestSender\StubPostRequestSender;
use Jeroen\PostRequestSender\TestResponse;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Jeroen\PostRequestSender\StubPostRequestSender
 * @covers \Jeroen\PostRequestSender\PostRequest
 * @covers \Jeroen\PostRequestSender\TestResponse
 */
class StubPostRequestSenderTest extends TestCase {

	public function testDefaultResponse(): void {
		$stubSender = new StubPostRequestSender();

		$response = $stubSender->post( 'https://example.com', [ 'foo' => 'bar' ] );

		$this->assertSame(
			'',
			$response->getBody()->getContents()
		);

		$this->assertSame(
			200,
			$response->getStatusCode()
		);
	}

	public function testAlternativeResponse(): void {
		$stubSender = new StubPostRequestSender(
			new TestResponse( 'TestBody', 418 )
		);

		$response = $stubSender->post( 'https://example.com', [ 'foo' => 'bar' ] );

		$this->assertSame(
			'TestBody',
			$response->getBody()->getContents()
		);

		$this->assertSame(
			418,
			$response->getStatusCode()
		);
	}

}
