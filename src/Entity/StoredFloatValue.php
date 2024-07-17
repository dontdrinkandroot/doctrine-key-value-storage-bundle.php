<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Override;

/**
 * @extends StoredValue<float>
 */
#[ORM\Entity]
#[ORM\Table(name: 'value_float')]
class StoredFloatValue extends StoredValue
{
    #[ORM\Column(name: '`value`', type: Types::FLOAT, nullable: false)]
    public float $value;

    #[Override]
    public function getValue(): float
    {
        return $this->value;
    }

    #[Override]
    public function setValue($value): void
    {
        $this->value = $value;
    }
}
