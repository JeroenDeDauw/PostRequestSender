<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender\Tests;

use Jeroen\PostRequestSender\PostRequest;
use Jeroen\PostRequestSender\SpyPostRequestSender;
use PHPUnit\Framework\TestCase;

class SpyPostRequestSenderTest extends TestCase {

	public function testGetCalls(): void {
		$spy = new SpyPostRequestSender();

		$spy->post( 'http://first.url', [ 'foo' => 'bar' ] );
		$spy->post( 'http://second.url', [ 'baz' => 'bah', 'pew' => 1337 ] );

		$this->assertSame(
			[
				new PostRequest( 'http://first.url', [ 'foo' => 'bar' ] ),
				new PostRequest( 'http://second.url', [ 'baz' => 'bah', 'pew' => 1337 ] ),
			],
			$spy->getCalls()
		);
	}

}
