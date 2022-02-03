<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

class StubPostRequestSender implements PostRequestSender {

	public function __construct(
		private PostResponse $response = new PostResponse()
	) {
	}

	public function post( string $url, array $fields ): PostResponse {
		return $this->response;
	}

}
