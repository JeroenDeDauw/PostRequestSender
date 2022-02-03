<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

class PostResponse {

	public function __construct(
		public readonly int $statusCode = 200,
		public readonly string $body = ''
	) {
	}

}
