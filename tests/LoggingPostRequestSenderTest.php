<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender\Tests;

use Jeroen\PostRequestSender\LoggingPostRequestSender;
use Jeroen\PostRequestSender\StubPostRequestSender;
use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use WMDE\PsrLogTestDoubles\LoggerSpy;

/**
 * @covers \Jeroen\PostRequestSender\LoggingPostRequestSender
 * @covers \Jeroen\PostRequestSender\StubPostRequestSender
 * @covers \Jeroen\PostRequestSender\PostRequest
 */
class LoggingPostRequestSenderTest extends TestCase {

	public function testLogsRequests(): void {
		$loggerSpy = new LoggerSpy();

		$sender = new LoggingPostRequestSender(
			new StubPostRequestSender(),
			$loggerSpy
		);

		$sender->post( 'https://first.url', [ 'foo' => 'bar' ] );
		$sender->post( 'https://second.url', [ 'baz' => 'bah', 'pew' => 1337 ] );

		$this->assertSame(
			[ 'Post request to https://first.url', 'Post request to https://second.url' ],
			$loggerSpy->getLogCalls()->getMessages()
		);

		$this->assertSame(
			[ 'baz' => 'bah', 'pew' => 1337 ],
			$loggerSpy->getLogCalls()->getLastCall()?->getContext()
		);

		$this->assertSame(
			LogLevel::INFO,
			$loggerSpy->getLogCalls()->getLastCall()?->getLevel()
		);
	}

	public function testOmitsExcludedFields(): void {
		$loggerSpy = new LoggerSpy();

		$sender = new LoggingPostRequestSender(
			new StubPostRequestSender(),
			$loggerSpy,
			fieldsToOmit: [ 'secret' ]
		);

		$sender->post( 'https://example.url', [ 'foo' => 'bar', 'secret' => 1337, 'baz' => 'bah' ] );

		$this->assertSame(
			[ 'foo' => 'bar', 'baz' => 'bah' ],
			$loggerSpy->getLogCalls()->getLastCall()?->getContext()
		);
	}

}
