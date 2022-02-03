<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender\Tests;

use Jeroen\PostRequestSender\PostResponse;
use Jeroen\PostRequestSender\StubPostRequestSender;
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
			$response->body
		);

		$this->assertSame(
			200,
			$response->statusCode
		);
	}

	public function testAlternativeResponse(): void {
		$stubSender = new StubPostRequestSender(
			new PostResponse( 418, 'TestBody' )
		);

		$response = $stubSender->post( 'https://example.com', [ 'foo' => 'bar' ] );

		$this->assertSame(
			'TestBody',
			$response->body
		);

		$this->assertSame(
			418,
			$response->statusCode
		);
	}

}
