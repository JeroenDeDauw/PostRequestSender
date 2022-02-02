<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender\Tests;

use Jeroen\PostRequestSender\TestResponse;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Jeroen\PostRequestSender\TestResponse
 */
class TestResponseTest extends TestCase {

	public function testGetBodyCanBeCalledMultipleTimes(): void {
		$response = new TestResponse( 'foo' );

		$this->assertSame( 'foo', $response->getBody()->getContents() );
		$this->assertSame( 'foo', $response->getBody()->getContents() );
	}

}
