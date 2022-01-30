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
	public function post( string $url, array $fields ): Psr\Http\Message\ResponseInterface;

}
```

## Usage

```php
$requestSender->post( 'https://example.com', [ 'foo' => 'bar', 'baz' => 42 ] );
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

### 1.0.0 (2022-01-30)

Initial release with

* `PostRequestSender` interface
* `SpyPostRequestSender` test double (and `PostRequest` value object)
* `StubPostRequestSender` test double
* `GuzzlePostRequestSender` implementation
* `LoggingPostRequestSender` decorator
* `TestResponse` helper implementation or PSR7 `ResponseInterface`

[doubles]: https://en.wikipedia.org/wiki/Test_double
