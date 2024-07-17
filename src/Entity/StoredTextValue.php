<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Override;

/**
 * @extends StoredValue<string>
 */
#[ORM\Entity]
#[ORM\Table(name: 'value_text')]
class StoredTextValue extends StoredValue
{
    #[ORM\Column(name: '`value`', type: Types::TEXT, nullable: false)]
    public string $value;

    #[Override]
    public function getValue(): string
    {
        return $this->value;
    }

    #[Override]
    public function setValue($value): void
    {
        $this->value = $value;
    }
}
