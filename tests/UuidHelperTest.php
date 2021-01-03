<?php

declare(strict_types=1);

namespace Vjik\Uuid\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Vjik\Uuid\UuidHelper;

final class UuidHelperTest extends TestCase
{
    public function testGenerateTimestampFirstCombUuid4(): void
    {
        $ids = [];
        for ($i = 0; $i < 100; $i++) {
            $ids[] = UuidHelper::generateTimestampFirstCombUuid4();
        }

        $sortedIds = $ids;
        sort($sortedIds);

        $this->assertSame($ids, $sortedIds);

        foreach ($ids as $id) {
            $this->assertMatchesRegularExpression('/^[0-9a-f]{8}(-[0-9a-f]{4}){3}-[0-9a-f]{12}$/', $id);
        }
    }

    public function testConvertStringToBytes(): void
    {
        $uuid = Uuid::uuid6();

        $this->assertSame($uuid->getBytes(), UuidHelper::convertStringToBytes($uuid->toString()));
    }

    public function testConvertStringToBytesInvalidValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        UuidHelper::convertStringToBytes('invalid-value');
    }

    public function testConvertBytesToString(): void
    {
        $uuid = Uuid::uuid6();

        $this->assertSame($uuid->toString(), UuidHelper::convertBytesToString($uuid->getBytes()));
    }

    public function testConvertBytesToStringInvalidValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        UuidHelper::convertBytesToString('invalid-value');
    }
}
