# Componenta Uuid

DI-провайдер совместимости для Ramsey UUID.

Пакет нужен проектам, которым все еще требуется регистрация Ramsey `UuidFactoryInterface` через Componenta configuration. Новый domain code должен предпочитать `componenta/identity` и зависеть от `Componenta\Identity\UuidInterface` или `Componenta\Identity\UuidFactoryInterface`.

## Установка

```bash
composer require componenta/uuid
```

## Требования

- PHP 8.4+
- `ramsey/uuid`
- Componenta config/DI integration при использовании через container

## Связанные пакеты

| Пакет | Зачем нужен здесь |
|---|---|
| `ramsey/uuid` | Пакет регистрирует именно Ramsey `UuidFactoryInterface`. |
| `componenta/config` | `ConfigProvider` возвращает секцию зависимостей для приложения. |
| `componenta/di` | Потребляет фабрику из конфигурации и создаёт Ramsey UUID factory. |
| `componenta/identity` | Предпочтительный пакет для новых доменных UUID-объектов значения и генераторов Componenta. |

## Что Предоставляет

`Componenta\Uuid\ConfigProvider` регистрирует фабрику для Ramsey `UuidFactoryInterface`:

```php
use Componenta\Uuid\ConfigProvider;
use Ramsey\Uuid\UuidFactoryInterface;

$config = (new ConfigProvider())();
$factory = $config['dependencies']['factories'][UuidFactoryInterface::class];

$uuidFactory = $factory();
```

## Граница

Пакет не определяет UUID-объект значения Componenta. Это только провайдер совместимости. Для идентификаторов уровня фреймворка и доменных UUID-абстракций используйте `componenta/identity`.
