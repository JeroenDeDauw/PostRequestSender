<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

class PostRequest {

	public function __construct(
		public readonly string $url,
		public readonly array $fields
	) {
	}

}
