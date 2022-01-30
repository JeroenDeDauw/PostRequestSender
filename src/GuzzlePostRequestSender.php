<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

use GuzzleHttp\Client;

class GuzzlePostRequestSender implements PostRequestSender {

	public function __construct(
		private Client $httpClient
	) {
	}

	public function post( string $url, array $fields ): void {
		$this->httpClient->post(
			$url,
			[ 'form_params' => $fields ]
		);
	}

}
