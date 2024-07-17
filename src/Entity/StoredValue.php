<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @template T
 */
#[ORM\MappedSuperclass]
abstract class StoredValue
{
    /**
     * @param T $value
     */
    public final function __construct(
        #[ORM\Id]
        #[ORM\Column(name: '`key`', type: Types::STRING, unique: true, nullable: false)]
        public string $key,
        mixed $value
    ) {
        $this->setValue($value);
    }

    /**
     * @return T
     */
    abstract public function getValue(): mixed;

    /**
     * @param T $value
     */
    abstract public function setValue(mixed $value): void;
}
