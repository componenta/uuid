<?php

declare(strict_types=1);

namespace Componenta\Uuid;

use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidFactoryInterface;

class ConfigProvider extends \Componenta\Config\ConfigProvider
{
    protected function getFactories(): array
    {
        return [UuidFactoryInterface::class => static fn(): UuidFactoryInterface => new UuidFactory()];
    }
}
