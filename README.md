# Post Request Sender

[![Build Status](https://img.shields.io/github/workflow/status/JeroenDeDauw/PostRequestSender/CI)](https://github.com/JeroenDeDauw/PostRequestSender/actions?query=workflow%3ACI)
[![codecov](https://codecov.io/gh/JeroenDeDauw/PostRequestSender/branch/master/graph/badge.svg?token=GnOG3FF16Z)](https://codecov.io/gh/JeroenDeDauw/PostRequestSender)
[![Type Coverage](https://shepherd.dev/github/JeroenDeDauw/PostRequestSender/coverage.svg)](https://shepherd.dev/github/JeroenDeDauw/PostRequestSender)
[![Psalm level](https://shepherd.dev/github/JeroenDeDauw/PostRequestSender/level.svg)](psalm.xml)
[![Latest Stable Version](https://poser.pugx.org/jeroen/post-request-sender/version.png)](https://packagist.org/packages/jeroen/post-request-sender)
[![Download count](https://poser.pugx.org/jeroen/post-request-sender/d/total.png)](https://packagist.org/packages/jeroen/post-request-sender)

Micro library with `PostRequestSender` interface and some [test doubles][doubles].

For the common cases where you do not need the complexity of the heavyweight libraries. 

```php
interface PostRequestSender {

	/**
	 * @param string $url
	 * @param array<string, mixed> $fields
	 */
	public function post( string $url, array $fields ): PostResponse;

}
```

## Usage

```php
$response = $requestSender->post( 'https://example.com', [ 'foo' => 'bar', 'baz' => 42 ] );
echo $response->body;
echo $response->statusCode;
```

## Included implementations

Adapters

* `GuzzlePostRequestSender` Adapter for Guzzle

Decorators

* `LoggingPostRequestSender` Takes a `Psr\Log\LoggerInterface`
* `SpyPostRequestSender` Test double that records calls

Test doubles

* `SpyPostRequestSender` Test double that records calls
* `StubPostRequestSender` Test double that returns a response provided in the constructor

## Release notes

### 2.0.0 (2022-02-03)

* Ditched `ResponseInterface` in favor of a new simple value object `PostResponse`

### 1.0.1 (2022-02-02)

* Fixed behavior of `TestResponse::getBody`

### 1.0.0 (2022-01-30)

Initial release with

* `PostRequestSender` interface
* `SpyPostRequestSender` test double (and `PostRequest` value object)
* `StubPostRequestSender` test double
* `GuzzlePostRequestSender` implementation
* `LoggingPostRequestSender` decorator
* `TestResponse` helper implementation or PSR7 `ResponseInterface`

[doubles]: https://en.wikipedia.org/wiki/Test_double
