# Quillstack Config

[![Tests](https://github.com/quillstack/config/actions/workflows/tests.yml/badge.svg)](https://github.com/quillstack/config/actions/workflows/tests.yml)
[![Latest Version](https://img.shields.io/packagist/v/quillstack/config.svg)](https://packagist.org/packages/quillstack/config)
[![Downloads](https://img.shields.io/packagist/dt/quillstack/config.svg)](https://packagist.org/packages/quillstack/config)
[![PHP Version](https://img.shields.io/packagist/php-v/quillstack/config)](https://packagist.org/packages/quillstack/config)
[![StyleCI](https://github.styleci.io/repos/306445448/shield?branch=main)](https://github.styleci.io/repos/306445448?branch=main)
[![CodeFactor](https://www.codefactor.io/repository/github/quillstack/config/badge)](https://www.codefactor.io/repository/github/quillstack/config)
[![Quality Gate](https://sonarcloud.io/api/project_badges/measure?project=quillstack_config&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=quillstack_config)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=quillstack_config&metric=coverage)](https://sonarcloud.io/summary/new_code?id=quillstack_config)
[![Maintainability](https://sonarcloud.io/api/project_badges/measure?project=quillstack_config&metric=sqale_rating)](https://sonarcloud.io/summary/new_code?id=quillstack_config)
[![Reliability](https://sonarcloud.io/api/project_badges/measure?project=quillstack_config&metric=reliability_rating)](https://sonarcloud.io/summary/new_code?id=quillstack_config)
[![Security](https://sonarcloud.io/api/project_badges/measure?project=quillstack_config&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=quillstack_config)
[![Maintainability](https://api.codeclimate.com/v1/badges/27e6ebd0260bf0e844fa/maintainability)](https://codeclimate.com/github/quillstack/config/maintainability)
[![License](https://img.shields.io/packagist/l/quillstack/config)](https://github.com/quillstack/config/blob/main/LICENSE)

The package to organise a configuration in your application. Full documentation:
https://quillstack.org/config

Configuration is written as classes rather than arrays in files, so a value has a place it is
declared, a type, and something to jump to. Reading one is a single string: `aws.token.current`
names the class first and the key inside it after.

### Requirements

- PHP 8.1 or newer

### Installation

```shell
composer require quillstack/config
```

### Usage

#### A configuration class

Extend `Config` and say what it holds:

```php
use Quillstack\Config\Config;

final class AwsConfig extends Config
{
    protected array $config = [
        'region' => 'eu-central-1',
        'token' => [
            'current' => 'abc',
            'previous' => 'xyz',
        ],
    ];
}
```

#### Saying which classes there are

```php
use Quillstack\Config\ConfigProviderInterface;

final class ConfigProvider implements ConfigProviderInterface
{
    public function load(): array
    {
        return [
            'aws' => AwsConfig::class,
            'mail' => MailConfig::class,
        ];
    }
}
```

#### Reading

```php
$configuration->get('aws.region');            // 'eu-central-1'
$configuration->get('aws.token.current');     // 'abc'
$configuration->get('aws.token.missing');     // null
$configuration->get('aws.retries', 3);        // 3 — nothing there, so the default
$configuration->get('nothing.at.all', 'x');   // 'x' — no such class either
```

The first part names the class the provider listed; the rest walks into it, however deep it
goes. Nothing found is the default rather than a failure, because configuration is read in
places which have something better to do than catch.

### Technical documentation

| Class | What it is |
| --- | --- |
| `Config` | what a configuration class extends; holds `protected array $config` |
| `Configuration` | reads a value out of whichever class the key names |
| `ConfigInterface` | `get(string $key, mixed $default = null): mixed` |
| `ConfigProviderInterface` | `load(): array` — the classes, keyed by the name they are addressed as |

`Config::DELIMITER` is the dot. `Config::get()` is `final`: a configuration class says what it
holds, not how it is read.

The classes are built through the container, so a configuration which needs something — an
environment reader, a secret store — asks for it in the usual way.

### Unit tests

```shell
composer test
composer test:coverage
composer stan
```

### Docker

```shell
docker-compose up -d
docker exec -w /var/www/html -it quillstack_config sh
```

### License

MIT. See [LICENSE](LICENSE).
