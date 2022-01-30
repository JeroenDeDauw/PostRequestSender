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

		$sender->post( 'https://first.url', [ 'baz' => 'bah', 'pew' => 1337 ] );
		$sender->post( 'https://second.url', [ 'foo' => 'bar' ] );

		$this->assertContains(
			'Post request to https://first.url',
			$loggerSpy->getLogCalls()->getMessages()
		);

		$this->assertContains(
			'Post request to https://second.url',
			$loggerSpy->getLogCalls()->getMessages()
		);

		$this->assertSame(
			[ 'baz' => 'bah', 'pew' => 1337 ],
			$loggerSpy->getFirstLogCall()?->getContext()
		);

		$this->assertSame(
			LogLevel::INFO,
			$loggerSpy->getFirstLogCall()?->getLevel()
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
			$loggerSpy->getFirstLogCall()?->getContext()
		);
	}

	public function testLogsResponse(): void {
		$loggerSpy = new LoggerSpy();

		$sender = new LoggingPostRequestSender(
			new StubPostRequestSender(),
			$loggerSpy
		);

		$sender->post( 'https://example.url', [] );

		$this->assertSame(
			'Response from request to https://example.url',
			$loggerSpy->getLogCalls()->getLastCall()?->getMessage()
		);

		$this->assertSame(
			LogLevel::INFO,
			$loggerSpy->getLogCalls()->getLastCall()?->getLevel()
		);

		$this->assertSame(
			[ 'statusCode' => 200, 'body' => '' ],
			$loggerSpy->getLogCalls()->getLastCall()?->getContext()
		);
	}

}
