<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle\Tests\Integration;

use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Service\KeyValueStorageInterface;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Override;
use RuntimeException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DoctrineValueStorageTest extends WebTestCase
{
    #[Override]
    protected function setUp(): void
    {
        $databaseToolCollection = self::getContainer()->get(DatabaseToolCollection::class);
        $databaseToolCollection->get('default')->loadFixtures([]);
    }

    public function testIntStorage(): void
    {
        $keyValueStorage = self::getKeyValueStorage();

        $key = 'test';
        $value = 56;

        self::assertFalse($keyValueStorage->hasInt($key));
        self::assertNull($keyValueStorage->getInt($key));

        $keyValueStorage->storeInt($key, $value);
        self::assertTrue($keyValueStorage->hasInt($key));
        self::assertEquals($value, $keyValueStorage->fetchInt($key));

        $keyValueStorage->removeInt($key);
        self::assertFalse($keyValueStorage->hasInt($key));
        $this->expectException(RuntimeException::class);
        $keyValueStorage->fetchInt($key);
    }

    public function testFloatStorage(): void
    {
        $keyValueStorage = self::getKeyValueStorage();

        $key = 'test';
        $value = 3.14;

        self::assertFalse($keyValueStorage->hasFloat($key));
        self::assertNull($keyValueStorage->getFloat($key));

        $keyValueStorage->storeFloat($key, $value);
        self::assertTrue($keyValueStorage->hasFloat($key));
        self::assertEquals($value, $keyValueStorage->fetchFloat($key));

        $keyValueStorage->removeFloat($key);
        self::assertFalse($keyValueStorage->hasFloat($key));
        $this->expectException(RuntimeException::class);
        $keyValueStorage->fetchFloat($key);
    }

    public function testStringStorage(): void
    {
        $keyValueStorage = $this->getKeyValueStorage();

        $key = 'test';
        $value = 'string';

        self::assertFalse($keyValueStorage->hasString($key));
        self::assertNull($keyValueStorage->getString($key));

        $keyValueStorage->storeString($key, $value);
        self::assertTrue($keyValueStorage->hasString($key));
        self::assertEquals($value, $keyValueStorage->fetchString($key));

        $keyValueStorage->removeString($key);
        self::assertFalse($keyValueStorage->hasString($key));
        $this->expectException(RuntimeException::class);
        $keyValueStorage->fetchString($key);
    }

    public function testTextStorage(): void
    {
        $keyValueStorage = self::getKeyValueStorage();

        $key = 'test';
        $value = 'This is a text';

        self::assertFalse($keyValueStorage->hasText($key));
        self::assertNull($keyValueStorage->getText($key));

        $keyValueStorage->storeText($key, $value);
        self::assertTrue($keyValueStorage->hasText($key));
        self::assertEquals($value, $keyValueStorage->fetchText($key));

        $keyValueStorage->removeText($key);
        self::assertFalse($keyValueStorage->hasText($key));
        $this->expectException(RuntimeException::class);
        $keyValueStorage->fetchText($key);
    }

    public function testBoolStorage(): void
    {
        $keyValueStorage = self::getKeyValueStorage();

        $key = 'test';
        $value = true;

        self::assertFalse($keyValueStorage->hasBool($key));
        self::assertNull($keyValueStorage->getBool($key));

        $keyValueStorage->storeBool($key, $value);
        self::assertTrue($keyValueStorage->hasBool($key));
        self::assertEquals($value, $keyValueStorage->fetchBool($key));

        $keyValueStorage->removeBool($key);
        self::assertFalse($keyValueStorage->hasBool($key));
        $this->expectException(RuntimeException::class);
        $keyValueStorage->fetchBool($key);
    }

    public function testJsonStorage(): void
    {
        $keyValueStorage = self::getKeyValueStorage();

        $key = 'test';
        $value = ['key' => 'value', 'nested' => ['nestedKey' => 'nestedValue']];

        self::assertFalse($keyValueStorage->hasJson($key));
        self::assertNull($keyValueStorage->getJson($key));

        $keyValueStorage->storeJson($key, $value);
        self::assertTrue($keyValueStorage->hasJson($key));
        self::assertEquals($value, $keyValueStorage->fetchJson($key));

        $keyValueStorage->removeJson($key);
        self::assertFalse($keyValueStorage->hasJson($key));
        $this->expectException(RuntimeException::class);
        $keyValueStorage->fetchJson($key);
    }

    public function testListInt(): void
    {
        $keyValueStorage = self::getKeyValueStorage();

        $keyValueStorage->storeInt('alpha', 1);
        $keyValueStorage->storeInt('beta', 2);

        $values = $keyValueStorage->listAllInt();
        self::assertCount(2, $values);

        $keys = $keyValueStorage->listAllIntKeys();
        self::assertCount(2, $keys);
        self::assertEquals(['alpha', 'beta'], $keys);
    }

    protected static function getKeyValueStorage(): KeyValueStorageInterface
    {
        $keyValueStorage = self::getContainer()->get(KeyValueStorageInterface::class);
        self::assertInstanceOf(KeyValueStorageInterface::class, $keyValueStorage);

        return $keyValueStorage;
    }
}
