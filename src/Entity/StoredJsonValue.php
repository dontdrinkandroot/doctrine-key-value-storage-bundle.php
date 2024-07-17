<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Override;

/**
 * @extends StoredValue<array>
 */
#[ORM\Entity]
#[ORM\Table(name: 'value_json')]
class StoredJsonValue extends StoredValue
{
    #[ORM\Column(name: '`value`', type: Types::JSON, nullable: false)]
    public array $value;

    #[Override]
    public function getValue(): array
    {
        return $this->value;
    }

    #[Override]
    public function setValue($value): void
    {
        $this->value = $value;
    }
}
