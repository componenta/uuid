# Componenta Uuid

Compatibility DI provider for Ramsey UUID.

This package exists for projects that still need Ramsey's `UuidFactoryInterface` registered through Componenta configuration. New domain code should prefer `componenta/identity` and depend on `Componenta\Identity\UuidInterface` or `Componenta\Identity\UuidFactoryInterface`.

## Installation

```bash
composer require componenta/uuid
```

## Requirements

- PHP 8.4+
- `ramsey/uuid`
- Componenta config/DI integration when used through a container

## Related Packages

| Package | Why it matters here |
|---|---|
| `ramsey/uuid` | This package registers Ramsey `UuidFactoryInterface`. |
| `componenta/config` | `ConfigProvider` returns dependency metadata. |
| `componenta/di` | Consumes the registered Ramsey UUID factory. |
| `componenta/identity` | Preferred package for new Componenta UUID value objects and generators. |

## What It Provides

`Componenta\Uuid\ConfigProvider` registers Ramsey's `UuidFactoryInterface` factory:

```php
use Componenta\Uuid\ConfigProvider;
use Ramsey\Uuid\UuidFactoryInterface;

$config = (new ConfigProvider())();
$factory = $config['dependencies']['factories'][UuidFactoryInterface::class];

$uuidFactory = $factory();
```

## Boundary

The package does not define a Componenta UUID value object. It is a compatibility provider only. Prefer `componenta/identity` for framework-level identity contracts and domain UUID abstractions.
