<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

use Psr\Http\Message\ResponseInterface;

class SpyPostRequestSender implements PostRequestSender {

	/**
	 * @var array<int, PostRequest>
	 */
	private array $calls = [];

	public function __construct(
		private PostRequestSender $requestSender = new StubPostRequestSender()
	) {
	}

	public function post( string $url, array $fields ): ResponseInterface {
		$this->calls[] = new PostRequest( $url, $fields );

		return $this->requestSender->post( $url, $fields );
	}

	/**
	 * @return array<int, PostRequest>
	 */
	public function getCalls(): array {
		return $this->calls;
	}

}
