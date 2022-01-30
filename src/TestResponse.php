<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class TestResponse implements ResponseInterface {

	public function __construct(
		private readonly string $body = '',
		private readonly int $statusCode = 200
	) {
	}

	public function getProtocolVersion(): string {
		return '';
	}

	public function withProtocolVersion( $version ) {
	}

	public function getHeaders(): array {
		return [];
	}

	public function hasHeader( $name ): bool {
		return false;
	}

	public function getHeader( $name ): array {
		return [];
	}

	public function getHeaderLine( $name ): string {
		return '';
	}

	public function withHeader( $name, $value ) {
	}

	public function withAddedHeader( $name, $value ) {
	}

	public function withoutHeader( $name ) {
	}

	public function getBody(): string {
		return $this->body;
	}

	public function withBody( StreamInterface $body ) {
	}

	public function getStatusCode(): int {
		return $this->statusCode;
	}

	public function withStatus( $code, $reasonPhrase = '' ) {
	}

	public function getReasonPhrase(): string {
		return '';
	}
}
