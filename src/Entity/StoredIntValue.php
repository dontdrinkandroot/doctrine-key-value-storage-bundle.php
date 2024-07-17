<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Override;

/**
 * @extends StoredValue<int>
 */
#[ORM\Entity]
#[ORM\Table(name: 'value_int')]
class StoredIntValue extends StoredValue
{
    #[ORM\Column(name: '`value`', type: Types::BIGINT, nullable: false)]
    public int $value;

    #[Override]
    public function getValue(): int
    {
        return $this->value;
    }

    #[Override]
    public function setValue($value): void
    {
        $this->value = $value;
    }
}
