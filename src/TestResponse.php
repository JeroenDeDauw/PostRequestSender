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

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
	public function getProtocolVersion(): string {
		return '';
	}

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
	public function withProtocolVersion( $version ): self {
		return $this;
	}

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
	public function getHeaders(): array {
		return [];
	}

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
	public function hasHeader( $name ): bool {
		return false;
	}

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
	public function getHeader( $name ): array {
		return [];
	}

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
	public function getHeaderLine( $name ): string {
		return '';
	}

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
	public function withHeader( $name, $value ): self {
		return $this;
	}

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
	public function withAddedHeader( $name, $value ): self {
		return $this;
	}

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
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

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
	public function withBody( StreamInterface $body ): self {
		return $this;
	}

	public function getStatusCode(): int {
		return $this->statusCode;
	}

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
	public function withStatus( $code, $reasonPhrase = '' ): self {
		return $this;
	}

	/**
	 * Unsupported
	 * @codeCoverageIgnore
	 */
	public function getReasonPhrase(): string {
		return '';
	}
}
