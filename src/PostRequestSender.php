<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

use Psr\Http\Message\ResponseInterface;
use Throwable;

interface PostRequestSender {

	/**
	 * @param string $url
	 * @param array<string, mixed> $fields
	 *
	 * @throws Throwable
	 */
	public function post( string $url, array $fields ): ResponseInterface;

}
