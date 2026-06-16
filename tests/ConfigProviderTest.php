<?php

declare(strict_types=1);

namespace Componenta\Uuid\Tests;

use Componenta\Config\ConfigKey;
use Componenta\Uuid\ConfigProvider;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\UuidFactoryInterface;

final class ConfigProviderTest extends TestCase
{
    public function testRegistersRamseyUuidFactoryContract(): void
    {
        $config = (new ConfigProvider())();
        $factory = $config[ConfigKey::DEPENDENCIES][ConfigKey::FACTORIES][UuidFactoryInterface::class];

        self::assertInstanceOf(UuidFactoryInterface::class, $factory());
    }
}
