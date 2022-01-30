<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

interface PostRequestSender {

	/**
	 * @param string $url
	 * @param array<string, mixed> $fields
	 */
	public function post( string $url, array $fields ): void;

}
