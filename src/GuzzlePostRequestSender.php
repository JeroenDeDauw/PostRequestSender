<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class GuzzlePostRequestSender implements PostRequestSender {

	public function __construct(
		private Client $httpClient
	) {
	}

	public function post( string $url, array $fields ): ResponseInterface {
		return $this->httpClient->post(
			$url,
			[ 'form_params' => $fields ]
		);
	}

}
