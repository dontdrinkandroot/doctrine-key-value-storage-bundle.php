<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredBoolValue;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredFloatValue;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredIntValue;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredJsonValue;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredStringValue;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredTextValue;
use Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity\StoredValue;
use Override;
use RuntimeException;

class DoctrineKeyValueStorage implements KeyValueStorageInterface
{
    private readonly EntityManagerInterface $entityManager;

    public function __construct(ManagerRegistry $registry)
    {
        $entityManager = $registry->getManagerForClass(StoredIntValue::class);
        assert($entityManager instanceof EntityManagerInterface);
        $this->entityManager = $entityManager;
    }

    #[Override]
    public function storeInt(string $key, int $value): void
    {
        $this->store($key, $value, StoredIntValue::class);
    }

    #[Override]
    public function getInt(string $key): ?int
    {
        return $this->get($key, StoredIntValue::class);
    }

    #[Override]
    public function fetchInt(string $key): int
    {
        return $this->fetch($key, StoredIntValue::class);
    }

    #[Override]
    public function hasInt(string $key): bool
    {
        return $this->has($key, StoredIntValue::class);
    }

    #[Override]
    public function removeInt(string $key): bool
    {
        return $this->remove($key, StoredIntValue::class);
    }

    #[Override]
    public function listAllInt(): array
    {
        return $this->listAll(StoredIntValue::class);
    }

    #[Override]
    public function listAllIntKeys(): array
    {
        return $this->listAllKeys(StoredIntValue::class);
    }

    #[Override]
    public function storeFloat(string $key, float $value): void
    {
        $this->store($key, $value, StoredFloatValue::class);
    }

    #[Override]
    public function getFloat(string $key): ?float
    {
        return $this->get($key, StoredFloatValue::class);
    }

    #[Override]
    public function fetchFloat(string $key): float
    {
        return $this->fetch($key, StoredFloatValue::class);
    }

    #[Override]
    public function hasFloat(string $key): bool
    {
        return $this->has($key, StoredFloatValue::class);
    }

    #[Override]
    public function removeFloat(string $key): bool
    {
        return $this->remove($key, StoredFloatValue::class);
    }

    #[Override]
    public function listAllFloat(): array
    {
        return $this->listAll(StoredFloatValue::class);
    }

    #[Override]
    public function listAllFloatKeys(): array
    {
        return $this->listAllKeys(StoredFloatValue::class);
    }

    #[Override]
    public function storeString(string $key, string $value): void
    {
        $this->store($key, $value, StoredStringValue::class);
    }

    #[Override]
    public function getString(string $key): ?string
    {
        return $this->get($key, StoredStringValue::class);
    }

    #[Override]
    public function fetchString(string $key): string
    {
        return $this->fetch($key, StoredStringValue::class);
    }

    #[Override]
    public function hasString(string $key): bool
    {
        return $this->has($key, StoredStringValue::class);
    }

    #[Override]
    public function removeString(string $key): bool
    {
        return $this->remove($key, StoredStringValue::class);
    }

    #[Override]
    public function listAllString(): array
    {
        return $this->listAll(StoredStringValue::class);
    }

    #[Override]
    public function listAllStringKeys(): array
    {
        return $this->listAllKeys(StoredStringValue::class);
    }

    #[Override]
    public function storeText(string $key, string $value): void
    {
        $this->store($key, $value, StoredTextValue::class);
    }

    #[Override]
    public function getText(string $key): ?string
    {
        return $this->get($key, StoredTextValue::class);
    }

    #[Override]
    public function fetchText(string $key): string
    {
        return $this->fetch($key, StoredTextValue::class);
    }

    #[Override]
    public function hasText(string $key): bool
    {
        return $this->has($key, StoredTextValue::class);
    }

    #[Override]
    public function removeText(string $key): bool
    {
        return $this->remove($key, StoredTextValue::class);
    }

    #[Override]
    public function listAllText(): array
    {
        return $this->listAll(StoredTextValue::class);
    }

    #[Override]
    public function listAllTextKeys(): array
    {
        return $this->listAllKeys(StoredTextValue::class);
    }

    #[Override]
    public function storeBool(string $key, bool $value): void
    {
        $this->store($key, $value, StoredBoolValue::class);
    }

    #[Override]
    public function getBool(string $key): ?bool
    {
        return $this->get($key, StoredBoolValue::class);
    }

    #[Override]
    public function fetchBool(string $key): bool
    {
        return $this->fetch($key, StoredBoolValue::class);
    }

    #[Override]
    public function hasBool(string $key): bool
    {
        return $this->has($key, StoredBoolValue::class);
    }

    #[Override]
    public function removeBool(string $key): bool
    {
        return $this->remove($key, StoredBoolValue::class);
    }

    #[Override]
    public function listAllBool(): array
    {
        return $this->listAll(StoredBoolValue::class);
    }

    #[Override]
    public function listAllBoolKeys(): array
    {
        return $this->listAllKeys(StoredBoolValue::class);
    }

    #[Override]
    public function storeJson(string $key, array $value): void
    {
        $this->store($key, $value, StoredJsonValue::class);
    }

    #[Override]
    public function getJson(string $key): ?array
    {
        return $this->get($key, StoredJsonValue::class);
    }

    #[Override]
    public function fetchJson(string $key): array
    {
        return $this->fetch($key, StoredJsonValue::class);
    }

    #[Override]
    public function hasJson(string $key): bool
    {
        return $this->has($key, StoredJsonValue::class);
    }

    #[Override]
    public function removeJson(string $key): bool
    {
        return $this->remove($key, StoredJsonValue::class);
    }

    #[Override]
    public function listAllJson(): array
    {
        return $this->listAll(StoredJsonValue::class);
    }

    #[Override]
    public function listAllJsonKeys(): array
    {
        return $this->listAllKeys(StoredJsonValue::class);
    }

    /**
     * @template T
     *
     * @param T $value
     * @param class-string<StoredValue<T>> $class
     * @return void
     */
    private function store(string $key, mixed $value, string $class): void
    {
        $storedValue = $this->getStoredValue($key, $class);
        if (null !== $storedValue) {
            $storedValue->setValue($value);
        } else {
            $storedValue = new $class($key, $value);
            $this->entityManager->persist($storedValue);
        }
        $this->entityManager->flush();
    }

    /**
     * @template T
     *
     * @param class-string<StoredValue<T>> $class
     * @return T|null
     */
    private function get(string $key, string $class): mixed
    {
        return $this->getStoredValue($key, $class)?->getValue();
    }

    /**
     * @template T
     *
     * @param class-string<StoredValue<T>> $class
     * @return bool
     */
    private function has(string $key, string $class): bool
    {
        return null !== $this->getStoredValue($key, $class);
    }

    /**
     * @template T
     *
     * @param class-string<StoredValue<T>> $class
     * @return bool
     */
    private function remove(string $key, string $class): bool
    {
        $storedValue = $this->getStoredValue($key, $class);
        if (null === $storedValue) {
            return false;
        }

        $this->entityManager->remove($storedValue);
        $this->entityManager->flush();

        return true;
    }

    /**
     * @template T
     *
     * @param class-string<StoredValue<T>> $class
     * @return T
     */
    private function fetch(string $key, string $class): mixed
    {
        $value = $this->get($key, $class);
        if (null === $value) {
            throw new RuntimeException('Value not set or null');
        }

        return $value;
    }

    /**
     * @template T
     *
     * @param class-string<StoredValue<T>> $class
     * @return StoredValue<T>|null
     */
    private function getStoredValue(string $key, string $class): StoredValue|null
    {
        try {
            /** @var StoredValue<T>|null $storedValue */
            $storedValue = $this->entityManager->createQueryBuilder()
                ->select('storedValue')
                ->from($class, 'storedValue')
                ->where('storedValue.key = :key')
                ->setParameter('key', $key)
                ->getQuery()
                ->getOneOrNullResult();

            return $storedValue;
        } catch (NonUniqueResultException) {
            /* Cannot happen, unique primary key. */
            throw new RuntimeException();
        }
    }

    /**
     * @template T
     *
     * @param class-string<T> $class
     * @return list<T>
     */
    private function listAll(string $class): array
    {
        /** @var list<T> $storedValues */
        $storedValues = $this->entityManager->createQueryBuilder()
            ->select('storedValue')
            ->from($class, 'storedValue')
            ->orderBy('storedValue.key', 'ASC')
            ->getQuery()
            ->getArrayResult();

        return $storedValues;
    }

    /**
     * @template T
     *
     * @param class-string<T> $class
     * @return string[]
     */
    private function listAllKeys(string $class): array
    {
        /** @var list<string> $keys */
        $keys = $this->entityManager->createQueryBuilder()
            ->select('storedValue.key')
            ->from($class, 'storedValue')
            ->orderBy('storedValue.key', 'ASC')
            ->getQuery()
            ->getScalarResult();

        return array_column($keys, 'key');
    }
}
