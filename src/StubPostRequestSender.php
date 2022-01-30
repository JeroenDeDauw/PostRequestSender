<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

use Psr\Http\Message\ResponseInterface;

class StubPostRequestSender implements PostRequestSender {

	public function __construct(
		private ResponseInterface $response = new TestResponse()
	) {
	}

	public function post( string $url, array $fields ): ResponseInterface {
		return $this->response;
	}

}
