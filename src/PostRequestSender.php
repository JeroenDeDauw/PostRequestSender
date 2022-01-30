<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

use Psr\Http\Message\ResponseInterface;

interface PostRequestSender {

	/**
	 * @param string $url
	 * @param array<string, mixed> $fields
	 */
	public function post( string $url, array $fields ): ResponseInterface;

}
