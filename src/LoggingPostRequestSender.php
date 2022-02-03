<?php

declare( strict_types = 1 );

namespace Jeroen\PostRequestSender;

use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class LoggingPostRequestSender implements PostRequestSender {

	/**
	 * @param string[] $fieldsToOmit
	 */
	public function __construct(
		private PostRequestSender $requestSender,
		private LoggerInterface $logger,
		private readonly string $logLevel = LogLevel::INFO,
		private readonly array $fieldsToOmit = []
	) {
	}

	public function post( string $url, array $fields ): PostResponse {
		$this->logger->log(
			$this->logLevel,
			'Post request to ' . $url,
			array_diff_key( $fields, array_flip( $this->fieldsToOmit ) )
		);

		$response = $this->requestSender->post( $url, $fields );

		$this->logger->log(
			$this->logLevel,
			'Response from request to ' . $url,
			[
				'statusCode' => $response->statusCode,
				'body' => $response->body
			]
		);

		return $response;
	}

}
