# Post Request Sender

[![Build Status](https://img.shields.io/github/workflow/status/JeroenDeDauw/PostRequestSender/CI)](https://github.com/JeroenDeDauw/PostRequestSender/actions?query=workflow%3ACI)
[![Type Coverage](https://shepherd.dev/github/JeroenDeDauw/PostRequestSender/coverage.svg)](https://shepherd.dev/github/JeroenDeDauw/PostRequestSender)
[![codecov](https://codecov.io/gh/JeroenDeDauw/PostRequestSender/branch/master/graph/badge.svg?token=GnOG3FF16Z)](https://codecov.io/gh/JeroenDeDauw/PostRequestSender)
[![Latest Stable Version](https://poser.pugx.org/jeroen/post-request-sender/version.png)](https://packagist.org/packages/jeroen/post-request-sender)
[![Download count](https://poser.pugx.org/jeroen/post-request-sender/d/total.png)](https://packagist.org/packages/jeroen/post-request-sender)

Micro library with `PostRequestSender` interface and a `SpyPostRequestSender` [test double][doubles].

For the common cases where you do not need the complexity of the heavyweight libraries. 

```php
interface PostRequestSender {

	/**
	 * @param string $url
	 * @param array<string, mixed> $fields
	 */
	public function post( string $url, array $fields ): void;

}
```

```php
$requestSender->post( 'https://example.com', [ 'foo' => 'bar', 'baz' => 42 ] );
```

## Release notes

### 1.0.0 (2022-01-)

* Initial release with `PostRequestSender` and `SpyPostRequestSender`

[doubles]: https://en.wikipedia.org/wiki/Test_double
