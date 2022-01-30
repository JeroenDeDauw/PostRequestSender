<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

use GuzzleHttp\Psr7\PumpStream;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class TestResponse implements ResponseInterface {

	private bool $gotBody = false;

	public function __construct(
		private readonly string $body = '',
		private readonly int $statusCode = 200
	) {
	}

	public function getProtocolVersion(): string {
		return '';
	}

	public function withProtocolVersion( $version ): self {
		return $this;
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

	public function withHeader( $name, $value ): self {
		return $this;
	}

	public function withAddedHeader( $name, $value ): self {
		return $this;
	}

	public function withoutHeader( $name ): self {
		return $this;
	}

	public function getBody(): StreamInterface {
		return new PumpStream( function() {
			if ( $this->gotBody ) {
				return null;
			}

			$this->gotBody = true;
			return $this->body;
		} );
	}

	public function withBody( StreamInterface $body ): self {
		return $this;
	}

	public function getStatusCode(): int {
		return $this->statusCode;
	}

	public function withStatus( $code, $reasonPhrase = '' ): self {
		return $this;
	}

	public function getReasonPhrase(): string {
		return '';
	}
}
