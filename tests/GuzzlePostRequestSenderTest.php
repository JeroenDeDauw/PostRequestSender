<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Jeroen\PostRequestSender\GuzzlePostRequestSender;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Jeroen\PostRequestSender\GuzzlePostRequestSender
 */
class GuzzlePostRequestSenderTest extends TestCase {

	public function testIntegrationHappyPath(): void {
		$container = [];
		$history = Middleware::history( $container );

		$handlerStack = HandlerStack::create( new MockHandler( [ new Response() ] ) );
		$handlerStack->push( $history );

		$requestSender = new GuzzlePostRequestSender(
			new Client( [ 'handler' => $handlerStack ] )
		);

		$requestSender->post( 'https://example.com/hi', [ 'foo' => 'bar', 'baz' => 42 ] );

		/**
		 * @var Request $request
		 * @psalm-suppress MixedArrayAccess
		 */
		$request = $container[0]['request'];

		$this->assertSame(
			'foo=bar&baz=42',
			$request->getBody()->getContents()
		);

		$this->assertSame(
			'example.com',
			$request->getUri()->getHost()
		);
	}

}
