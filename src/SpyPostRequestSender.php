<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

class SpyPostRequestSender implements PostRequestSender {

	/**
	 * @var array<int, PostRequest>
	 */
	private array $calls = [];

	public function post( string $url, array $fields ): void {
		$this->calls[] = new PostRequest( $url, $fields );
	}

	/**
	 * @return array<int, PostRequest>
	 */
	public function getCalls(): array {
		return $this->calls;
	}

}
