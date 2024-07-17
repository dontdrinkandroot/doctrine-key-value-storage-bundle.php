<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle\Service;

use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredBoolValue;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredFloatValue;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredIntValue;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredJsonValue;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredStringValue;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredTextValue;

interface KeyValueStorageInterface
{
    // Int

    public function storeInt(string $key, int $value): void;

    public function getInt(string $key): ?int;

    public function fetchInt(string $key): int;

    public function hasInt(string $key): bool;

    public function removeInt(string $key): bool;

    /** @return list<StoredIntValue> */
    public function listAllInt(): array;

    /** @return string[] */
    public function listAllIntKeys(): array;

    // Float

    public function storeFloat(string $key, float $value): void;

    public function getFloat(string $key): ?float;

    public function fetchFloat(string $key): float;

    public function hasFloat(string $key): bool;

    public function removeFloat(string $key): bool;

    /** @return list<StoredFloatValue> */
    public function listAllFloat(): array;

    /** @return string[] */
    public function listAllFloatKeys(): array;

    // String

    public function storeString(string $key, string $value): void;

    public function getString(string $key): ?string;

    public function fetchString(string $key): string;

    public function hasString(string $key): bool;

    public function removeString(string $key): bool;

    /** @return list<StoredStringValue> */
    public function listAllString(): array;

    /** @return string[] */
    public function listAllStringKeys(): array;

    // Text

    public function storeText(string $key, string $value): void;

    public function getText(string $key): ?string;

    public function fetchText(string $key): string;

    public function hasText(string $key): bool;

    public function removeText(string $key): bool;

    /** @return list<StoredTextValue> */
    public function listAllText(): array;

    /** @return string[] */
    public function listAllTextKeys(): array;

    // Bool

    public function storeBool(string $key, bool $value): void;

    public function getBool(string $key): ?bool;

    public function fetchBool(string $key): bool;

    public function hasBool(string $key): bool;

    public function removeBool(string $key): bool;

    /** @return list<StoredBoolValue> */
    public function listAllBool(): array;

    /** @return string[] */
    public function listAllBoolKeys(): array;

    // Json

    /**
     * @template K of array-key
     * @template V
     *
     * @param array<K,V> $value
     * @return void
     */
    public function storeJson(string $key, array $value): void;

    /**
     * @template K of array-key
     * @template V
     *
     * @return array<K,V>|null
     */
    public function getJson(string $key): ?array;

    /**
     * @template K of array-key
     * @template V
     *
     * @return array<K,V>
     */
    public function fetchJson(string $key): array;

    public function hasJson(string $key): bool;

    public function removeJson(string $key): bool;

    /** @return list<StoredJsonValue> */
    public function listAllJson(): array;

    /** @return string[] */
    public function listAllJsonKeys(): array;
}
