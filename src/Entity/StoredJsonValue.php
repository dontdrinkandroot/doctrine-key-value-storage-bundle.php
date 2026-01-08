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
    /** @var array<mixed> */
    #[ORM\Column(name: '`value`', type: Types::JSON, nullable: false)]
    public array $value;

    /** @return array<mixed> */
    #[Override]
    public function getValue(): array
    {
        return $this->value;
    }

    /** @param array<mixed> $value */
    #[Override]
    public function setValue($value): void
    {
        $this->value = $value;
    }
}
