<?php

declare(strict_types=1);

namespace Vjik\Uuid;

use Exception;
use InvalidArgumentException;
use Ramsey\Uuid\Codec\TimestampFirstCombCodec;
use Ramsey\Uuid\Generator\CombGenerator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;

final class UuidHelper
{
    /**
     * @see https://uuid.ramsey.dev/en/latest/customize/timestamp-first-comb-codec.html
     *
     * @return string
     */
    public static function generateTimestampFirstCombUuid4(): string
    {
        $factory = new UuidFactory();
        $codec = new TimestampFirstCombCodec($factory->getUuidBuilder());

        $factory->setCodec($codec);

        $factory->setRandomGenerator(new CombGenerator(
            $factory->getRandomGenerator(),
            $factory->getNumberConverter()
        ));

        return $factory->uuid4()->toString();
    }

    /**
     * @param string $value
     *
     * @throws InvalidArgumentException
     *
     * @return string
     */
    public static function convertStringToBytes(string $value): string
    {
        try {
            $uuid = Uuid::fromString($value);
        } catch (Exception $e) {
            throw new InvalidArgumentException();
        }

        return $uuid->getBytes();
    }

    /**
     * @param string $value
     *
     * @throws InvalidArgumentException
     *
     * @return string
     */
    public static function convertBytesToString(string $value): string
    {
        try {
            $uuid = Uuid::fromBytes($value);
        } catch (Exception $e) {
            throw new InvalidArgumentException();
        }

        return $uuid->toString();
    }
}
