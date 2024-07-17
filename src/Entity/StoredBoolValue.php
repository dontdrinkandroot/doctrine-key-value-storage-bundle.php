<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Override;

/**
 * @extends StoredValue<bool>
 */
#[ORM\Entity]
#[ORM\Table(name: 'value_bool')]
class StoredBoolValue extends StoredValue
{
    #[ORM\Column(name: '`value`', type: Types::BOOLEAN, nullable: false)]
    public bool $value;

    #[Override]
    public function getValue(): bool
    {
        return $this->value;
    }

    #[Override]
    public function setValue($value): void
    {
        $this->value = $value;
    }
}
