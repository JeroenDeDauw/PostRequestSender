<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

use Psr\Http\Message\ResponseInterface;

class LoggingPostRequestSender implements PostRequestSender {

	public function post( string $url, array $fields ): ResponseInterface {
	}

}
