<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender\Tests;

use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers \GuzzleHttp\Psr7\Response
 */
class GuzzleResponseTest extends TestCase {

	public function testGuzzleIsFriggingWeird(): void {
		$response = new Response( body: 'hello' );

		$this->assertSame( 'hello', $response->getBody()->getContents() );
		$this->assertSame( '', $response->getBody()->getContents() );
	}

}
